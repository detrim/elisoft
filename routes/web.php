<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogActivityUsersController;
use App\Http\Controllers\CrudController;

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

route::get('/in', [AuthController::class, 'login']);
route::get('/login', [AuthController::class, 'login'])->name('login')->middleware(['guest']);
route::get('/log', [AuthController::class, 'login'])->name('login');
route::get('/out', [AuthController::class, 'logout']);
Route::get('/reg', function () {
    return view('auth/register');
});
route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');
route::post('/register', [AuthController::class, 'prosesregister'])->name('prosesregister');


Route::group(['middleware' => ['auth','CheckLevel:admin']], function () {
    Route::prefix('admin')->group(function () {
        route::get('/dashboard', [DashboardController::class, 'index_admin']);
        route::get('/user', [LogActivityUsersController::class, 'index']);
        route::get('/crud', [CrudController::class, 'index']);
    });
});
Route::group(['middleware' => ['auth','CheckLevel:user']], function () {
    Route::prefix('user')->group(function () {
        route::get('/dashboard', [DashboardController::class, 'index_user']);
    });
});