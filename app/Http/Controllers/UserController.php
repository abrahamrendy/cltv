<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DNS2D;
use Storage;
use Auth;
use Hash;
use Response;

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
        $activeClass = session('activeClass');

        $isExist = DB::table('registrant_classes')->where('registrant_id', $currUser->id)->where('classes_id',$activeClass->id)->first();

        if ($isExist) {
            $materials = DB::select('SELECT classes_materials.id as cm_id, classes_materials.resource as cm_resource, classes_materials.class_date as cm_date, classes.id as c_id, classes.name as c_name, classes.batch as c_batch, classes.date as c_date, materials.name as m_name FROM `classes_materials` INNER JOIN classes on classes_id = classes.id INNER JOIN materials on materials_id = materials.id WHERE classes.active = 1 ORDER BY cm_id');

            $data = DB::select('SELECT t.cm_id FROM (SELECT classes_materials.id as cm_id, classes.name as c_name, classes.batch as c_batch, materials.name as m_name FROM `classes_materials` INNER JOIN classes on classes_id = classes.id INNER JOIN materials on materials_id = materials.id) as t INNER JOIN attendances ON t.cm_id = classes_materials_id INNER JOIN registrant on participants_id = registrant.id where qr_code = ?',[$qr_code]);

            $attendance = array();
            $i = 0;
            foreach ($data as $temp) {
                $attendance[$i] = $temp->cm_id;
                $i++;
            }
            return view('tracker-dashboard', ['header'=> "Dashboard", 'attendance'=>$attendance, 'currUser' => $currUser, 'materials' => $materials]);
        } else {
            return view('tracker-dashboard', ['header'=> "Dashboard", 'activeClass'=>$activeClass, 'currUser' => $currUser]);
        }
    }

    public function joinClass($id){
        $currUser = session('currUser');
        $class = DB::table('classes')->where('id',$id)->first();

        if ($class) {
            $create_date = date('Y-m-d H:i:s' , strtotime('now + 7 hours'));
            $isExist = DB::table('registrant_classes')->where('registrant_id',$currUser->id)->where('classes_id',$id)->first();

            if (!$isExist) {

                $id = DB::table('registrant_classes')->insertGetId(
                                                        ['classes_id' => $id,
                                                         'registrant_id' => $currUser->id,
                                                         'created_at' => $create_date
                                                        ] );
                if ($id) {
                    // \Session::flash('success', $isExist->name.' verified!');
                    return back();
                } else {
                    // \Session::flash('fail', $isExist->name.' not verified! Please try again!');
                    return back();
                }
            } else {
                return back();
            }
        } else {
            abort(404);
        }
    }

    public function basicDoctrine()
    {
        $qr_code = session('user');
        // $user = DB::table('registrant')->where('qr_code', session('user'))->get();
        $currUser = session('currUser');

        $isExist = DB::table('registrant_classes')->where('registrant_id', $currUser->id)->where('classes_id',1)->first();

        if ($isExist) {
            $materials = DB::select('SELECT classes_materials.id as cm_id, classes_materials.resource as cm_resource, classes_materials.class_date as cm_date, classes.name as c_name, classes.batch as c_batch, classes.date as c_date, materials.name as m_name FROM `classes_materials` INNER JOIN classes on classes_id = classes.id INNER JOIN materials on materials_id = materials.id WHERE classes.id = 1 ORDER BY cm_id');

            $data = DB::select('SELECT t.cm_id FROM (SELECT classes_materials.id as cm_id, classes.name as c_name, classes.batch as c_batch, materials.name as m_name FROM `classes_materials` INNER JOIN classes on classes_id = classes.id INNER JOIN materials on materials_id = materials.id) as t INNER JOIN attendances ON t.cm_id = classes_materials_id INNER JOIN registrant on participants_id = registrant.id where qr_code = ?',[$qr_code]);

            $attendance = array();
            $i = 0;
            foreach ($data as $temp) {
                $attendance[$i] = $temp->cm_id;
                $i++;
            }
            return view('tracker-class', ['header'=> "Basic Doctrine", 'attendance'=>$attendance, 'currUser' => $currUser, 'materials' => $materials]);
        } else {
            return view('tracker-class', ['header'=> "Basic Doctrine", 'currUser' => $currUser]);
        }
    }

    public function basicPreaching()
    {
        $qr_code = session('user');
        // $user = DB::table('registrant')->where('qr_code', session('user'))->get();
        $currUser = session('currUser');

        $isExist = DB::table('registrant_classes')->where('registrant_id', $currUser->id)->where('classes_id',2)->first();

        if ($isExist) {
            $materials = DB::select('SELECT classes_materials.id as cm_id, classes_materials.resource as cm_resource, classes_materials.class_date as cm_date, classes.name as c_name, classes.batch as c_batch, classes.date as c_date, materials.name as m_name FROM `classes_materials` INNER JOIN classes on classes_id = classes.id INNER JOIN materials on materials_id = materials.id WHERE classes.id = 2 ORDER BY cm_id');

            $data = DB::select('SELECT t.cm_id FROM (SELECT classes_materials.id as cm_id, classes.name as c_name, classes.batch as c_batch, materials.name as m_name FROM `classes_materials` INNER JOIN classes on classes_id = classes.id INNER JOIN materials on materials_id = materials.id) as t INNER JOIN attendances ON t.cm_id = classes_materials_id INNER JOIN registrant on participants_id = registrant.id where qr_code = ?',[$qr_code]);

            $attendance = array();
            $i = 0;
            foreach ($data as $temp) {
                $attendance[$i] = $temp->cm_id;
                $i++;
            }
            return view('tracker-class', ['header'=> "Basic Preaching", 'attendance'=>$attendance, 'currUser' => $currUser, 'materials' => $materials]);
        } else {
            return view('tracker-class', ['header'=> "Basic Preaching", 'currUser' => $currUser]);
        }
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
        } else {
            session()->flush();
        }
        return redirect('tracker/')->with('success','Logged out!');
    }

    public function settings()
    {
        $qr_code = session('user');
        $currUser = session('currUser');
        return view('tracker-settings', ['header'=> "Settings", 'currUser' => $currUser]);
    }

    public function download()
    {
        $file= public_path('storage')."/"."test.pdf";

        $headers = array(
                  'Content-Type: application/pdf',
                );
        // dd($file);
        return Response::download($file, $headers);
    } 

    public function edit(Request $request) {
        $email = $request->input('email');
        $no_hp = $request->input('no_hp');
        $new_password = $request->input('new_password');
        $confirm_new_password = $request->input('confirm_new_password');
        $currUser = session('currUser');
        $updated_at = date('Y-m-d H:i:s' , strtotime('now + 7 hours'));

        $existedUser = DB::table('registrant')->where('qr_code', $currUser->qr_code)->first();

        if ($new_password == $confirm_new_password) {
            if($new_password != '' || $confirm_new_password != '') {
                // CHANGE PASSWORD
                if (!empty($existedUser)) { 
                    DB::table('registrant')->where('id',$existedUser->id)->update(
                                                                        [
                                                                            'email' => $email,
                                                                            'no_hp' => $no_hp,
                                                                            'password' => Hash::make($confirm_new_password),
                                                                            'updated_at' => $updated_at
                                                                        ]);
                    $updatedUser = DB::table('registrant')->where('qr_code', $currUser->qr_code)->first();
                    $request->session()->put('currUser',$updatedUser);
                }
            } else {
                DB::table('registrant')->where('id',$existedUser->id)->update(
                                                                                [
                                                                                 'email' => $email,
                                                                                 'no_hp' => $no_hp,
                                                                                 'updated_at' => $updated_at
                                                                                ]);
                $updatedUser = DB::table('registrant')->where('qr_code', $currUser->qr_code)->first();
                $request->session()->put('currUser',$updatedUser);
            }
            return redirect('tracker/settings/')->with('success','All changes have been made!');
        } else {
            return redirect('tracker/settings/')->with('fail','Password mismatch.');
        }
    }

}
