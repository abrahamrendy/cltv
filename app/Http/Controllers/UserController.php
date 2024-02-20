<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DNS2D;
use Storage;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkuserlogin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $qr_code = session('user');
        // $user = DB::table('registrant')->where('qr_code', session('user'))->get();
        $currUser = session('currUser');

        $materials = DB::select('SELECT classes_materials.id as cm_id, classes_materials.class_date as cm_date, classes.name as c_name, classes.batch as c_batch, classes.date as c_date, materials.name as m_name FROM `classes_materials` INNER JOIN classes on classes_id = classes.id INNER JOIN materials on materials_id = materials.id WHERE classes.active = 1 ORDER BY cm_id');

        $data = DB::select('SELECT t.cm_id FROM (SELECT classes_materials.id as cm_id, classes.name as c_name, classes.batch as c_batch, materials.name as m_name FROM `classes_materials` INNER JOIN classes on classes_id = classes.id INNER JOIN materials on materials_id = materials.id) as t INNER JOIN attendances ON t.cm_id = classes_materials_id INNER JOIN registrant on participants_id = registrant.id where qr_code = ?',[$qr_code]);

        $attendance = array();
        $i = 0;
        foreach ($data as $temp) {
            $attendance[$i] = $temp->cm_id;
            $i++;
        }
        return view('tracker-dashboard', ['attendance'=>$attendance, 'currUser' => $currUser, 'materials' => $materials]);
    }

    public function login(Request $request)
    {
        return redirect('tracker/');

    }

    public function logout () {
        if (Auth::user()) {
            $user = Auth::user();
            session()->flush();
            Auth::login($user);
        }
        return redirect('tracker/')->with('success','Logged out!');
    }

    public function edit(Request $request) {
        // $ibadah = $request->input('ibadah');
        // $id = $request->input('user_id');
        // $flag = false;

        // for ($i=0; $i < count($id); $i++) {
        //     $tempId = $id[$i];
        //     $tempIbadah = $ibadah[$i];
        //     $existedUser = DB::table('registrant')->where('id', $tempId)->first();

        //     if (!empty($existedUser)) {
        //        if ($existedUser->ibadah != $tempIbadah) {
        //             $existedIbadah = DB::table('ibadah')->where('id', $tempIbadah)->first();
        //             $countUser = DB::table('registrant')->where('ibadah',$tempIbadah)->count();
                    
        //             if ($countUser >= ($existedIbadah->qty)) {
        //                 // FULL CAPACITY
        //                 $flag = true;
        //             } else {
        //                 DB::table('registrant')->where('id',$tempId)->update(
        //                                                                     [
        //                                                                      'ibadah' => $tempIbadah
        //                                                                     ]);
        //             }

        //        }
        //     }
        // }
        // if ($flag) {
        //     return redirect('user/')->with('fail','Anda melebihi kuota ibadah yang ditetapkan. Mohon memilih ibadah lain.');
        // } else {
        //     return redirect('user/')->with('success','Berhasil melakukan edit ibadah!');
        // }
    }

}
