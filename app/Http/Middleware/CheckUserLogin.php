<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('user')) {
            return $next($request);
        } else {
            $qr_code = $request->qr_code;
            $password = $request->password;

            $getUser = DB::table('registrant')->whereRaw("UPPER(qr_code) = '" . strtoupper($qr_code) . "'")->first();

            if (!empty($getUser)) {
                if (Hash::check($password, $getUser->password)){
                    $request->session()->put('currUser',$getUser);
                    $request->session()->put('user',$qr_code);
                    return $next($request);
                } else {
                    return redirect('/tracker')->with('fail','Wrong password.');
                }
            } else {
                return redirect('/tracker')->with('fail','User not found.');
            }
        }
        // return $next($request);
        return redirect('/tracker')->with('fail','Access denied! Please log in again.');
    }
}
