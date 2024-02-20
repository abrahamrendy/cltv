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
        return view('verificator');
    }

    public function submit(Request $request) {
        $kaj = $request->input('kaj');
        $nama = $request->input('nama');
        $email = strtolower($request->input('email'));
        $phone = $request->input('phone');
        $dob = date('Y-m-d', strtotime($request->input('dob')));
        $m_class = $request->input('mclass');
        $ibadah_asal = $request->input('ibadah_asal');
        $ibadah = $request->input('ibadah');
        $created_at = date('Y-m-d H:i:s', strtotime('now + 7 hours'));

        $getService = DB::table('ibadah')->where('id', $ibadah)->first();

        $countUser = DB::table('registrant')->where('ibadah',$ibadah)->count();

        $existedUser = DB::table('registrant')->join('ibadah', 'registrant.ibadah', '=', 'ibadah.id')->where('registrant.nama', $nama)->where('registrant.dob', $dob)->select('registrant.id as registrant_id', 'registrant.nama as registrant_name', 'registrant.qr_code as qr_code', 'ibadah.*')->first();

        if (!empty($existedUser)) {
            return view('fail', ['code' => 0, 'user' => $existedUser]);
        }

        if ($countUser >= ($getService->qty)) {
            // USER EXCEEDED CAPACITY
            return view('fail', ['code' => 1, 'data' => $getService]);
        } else {
            $id = DB::table('registrant')->insertGetId(
                                                ['kaj' => $kaj,
                                                 'nama' => $nama,
                                                 'email' => $email,
                                                 'phone' => $phone,
                                                 'dob' => $dob,
                                                 'm-class' => $m_class,
                                                 'ibadah_asal' => $ibadah_asal,
                                                 'ibadah' => $ibadah,
                                                 'created_at' => $created_at,
                                                ] );
            if ($id) {

                if ($kaj != '') {
                    $combine = $kaj;
                } else {
                    $ibadahAsal = DB::table('ibadah_asal')->where('id', $ibadah_asal)->first();
                    $counterUp = $ibadahAsal->counter + 1;
                    $combine = date('Y', strtotime('now + 7 hours')).$ibadah_asal.$counterUp;
                    DB::table('ibadah_asal')->where('id',$ibadah_asal)->update(
                                                                        [
                                                                         'counter' => $counterUp
                                                                        ] );
                }
                
                DB::table('registrant')->where('id',$id)->update(
                                                                        [
                                                                         'qr_code' => $combine
                                                                        ] );
                Storage::disk('public')->put('qrcodes/'.$combine.'.jpg',base64_decode(DNS2D::getBarcodePNG($combine, "QRCODE", 10,10)));
                // SET UP EMAIL
                $this->registEmail($email, $getService, $id, $combine,$nama);
                return view('success', ['data' => $getService, 'id' => $id, 'name' => $nama, 'code' => $combine]);
            } else {
                // GENERIC ERROR MESSAGE
                return view('fail', ['code' => 0, 'data' => $getService]);
            }

        }
    }
}
