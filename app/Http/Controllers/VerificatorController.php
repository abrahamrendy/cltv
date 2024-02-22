<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DNS2D;
use Storage;

class VerificatorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getActiveClassesMaterials = DB::table('classes_materials')->where('active_now',1)->first();

        $getClassName = DB::table('classes')->where('id',$getActiveClassesMaterials->classes_id)->first();
        $getMaterialName = DB::table('materials')->where('id',$getActiveClassesMaterials->materials_id)->first();

        return view('verificator', ['header' => "Verificator", 'class' => $getClassName->name, 'material' => $getMaterialName->name]);
    }

    public function scan (Request $request) {
        $active_service = DB::table('classes')->where('active',1)->first();
        $qr_code = strip_tags($request->input('qr_code'));
        $create_date = date('Y-m-d H:i:s' , strtotime('now + 7 hours'));

        $isExist = DB::table('registrant')->where('qr_code',$qr_code)->first();

        if($isExist) {
            $isClassMember = DB::table('registrant_classes')->where('registrant_id',$isExist->id)->where('classes_id', $active_service->id)->first();
        } else {
            \Session::flash('fail', 'QR Code unregistered!');
            return back();
        }

        if ($isClassMember) {
            $getActiveClassesMaterials = DB::table('classes_materials')->where('active_now',1)->first();
            $isAttend = DB::table('attendances')->where('classes_materials_id',$getActiveClassesMaterials->id)->where('participants_id', $isClassMember->registrant_id)->first();
            if (!$isAttend) {
                $id = DB::table('attendances')->insertGetId(
                                                        ['participants_id' => $isClassMember->registrant_id,
                                                         'classes_materials_id' => $getActiveClassesMaterials->id,
                                                         'created_at' => $create_date
                                                        ] );
                if ($id) {
                    \Session::flash('success', $isExist->name.' verified!');
                    return back();
                } else {
                    \Session::flash('fail', $isExist->name.' not verified! Please try again!');
                    return back();
                }
            } else {
                \Session::flash('success', $isExist->name .  ' has been verified at ' . $isAttend->created_at);
                return back();
            }
        } else {
            \Session::flash('fail', 'QR Code unregistered for this class!');
            return back();
        }
    }
}
