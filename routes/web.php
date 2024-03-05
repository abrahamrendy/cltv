<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('/submit', [App\Http\Controllers\IndexController::class, 'submit'])->name('submit');



// Route::post('/login_user', [App\Http\Controllers\UserController::class, 'login'])->name('login_user');

Route::prefix('tracker')->group(function () {
    Route::get('/', [App\Http\Controllers\IndexController::class, 'tracker'])->name('tracker');
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('tracker_dashboard')->middleware('checkuserlogin');
    Route::get('/settings', [App\Http\Controllers\UserController::class, 'settings'])->name('tracker_settings')->middleware('checkuserlogin');
    Route::post('/settings/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('tracker_settings_submit')->middleware('checkuserlogin');
    // Download Route
    Route::get('/download/{filename}', function($filename)
    {
        // Check if file exists in app/storage/file folder
        $file_path = public_path() .'/storage/'. $filename;
        if (file_exists($file_path))
        {
            // Send Download
            return Response::download($file_path, $filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        }
        else
        {
            // Error
            // dd($file_path);
            return abort(500, 'Requested file does not exist on our server!');
        }
    })->name('resource_download')->middleware('checkuserlogin');;
    Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login_user')->middleware('checkuserlogin');
    Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout_user');
    Route::post('/submit_edit', [App\Http\Controllers\UserController::class, 'edit'])->name('submit_edit');
});

Auth::routes();

Route::prefix('verificator')->group(function () {
    Route::get('/', [App\Http\Controllers\VerificatorController::class, 'index'])->name('verificator');
    Route::post('/verify', [App\Http\Controllers\VerificatorController::class, 'scan'])->name('verify');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
    Route::post('/submit_ibadah', [App\Http\Controllers\HomeController::class, 'submit_ibadah'])->name('submit_ibadah');
});