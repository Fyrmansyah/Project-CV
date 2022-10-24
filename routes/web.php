<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home', function () {
   // return view('homenya');
//});


Route::get('/anjay', function () {
    return view('login');
});

Route::get('/coba', function () {
    return ('login');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/hero', function () {
    return view('hero');
});
Route::get('/adm', function () {
    return view('Admin.index');
});
Route::get('/admin', function () {
    return view('layout.admin');
});
// Route::get('/msiswa', function () {
//     return view('masterProject');
// });
// Route::get('/mproject', function () {
//     return view('mastersiswa');
// });
// Route::get('/mkontak', function () {
//     return view('masterKontak');
// });
Route::resource('/mdash', DashboardController::class);

// siswa Controller
Route::resource('/msiswa', SiswaController::class);
// Route::resource('/msiswa/index', [SiswaController::class, 'index']);
// Route::resource('/msiswa/create', [SiswaController::class, 'create']);
// Route::resource('/msiswa/{id}/edit', [SiswaController::class, 'edit']);
// Route::resource('/msiswa/{id}', [SiswaController::class, 'show']);

// kontak Controller
Route::resource('/mkontak', KontakController::class);
// Route::resource('/mkontak/create', [KontakController::class, 'create']);
// Route::resource('/mkontak/edit', [KontakController::class, 'edit']);

// project Controller
Route::resource('/mproject', ProjectController::class);
// Route::resource('/mproject/index', [ProjectController::class, 'index']);
// Route::resource('/mproject/create', [ProjectController::class, 'create']);
// Route::resource('/mproject/edit', [ProjectController::class, 'edit']);
// Route::resource('/mproject/show', [ProjectController::class, 'show']);
// // Route::get('/pp', [SiswaController::class, 'tampill']);
Route::get('mproject/create/{id_siswa}',[ProjectController::class,'tambah'])->name('mproject.tambah');
Route::get('mkontak/create/{id_siswa}',[KontakController::class,'tambah'])->name('mkontak.tambah');
Route::post('mkontak/store',[KontakController::class,'store']);

Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);