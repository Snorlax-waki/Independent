<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::prefix('items')->group(function () {
//  Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
//  Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
//  Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
//;

//ターゲット一覧画面
Route::get('/target/index',[App\Http\Controllers\TargetController::class,'index'])->name('/target/index');
//ターゲット登録画面
Route::get('/target/register',[App\Http\Controllers\TargetController::class,'register']);
Route::post('/targetRegister',[App\Http\Controllers\TargetController::class,'targetRegister']);
//ターゲット詳細画面
Route::get('/target/information/{id}',[App\Http\Controllers\TargetController::class,'information']);
//ターゲット編集画面
Route::get('/target/edit/{id}', [App\Http\Controllers\TargetController::class, 'edit']);
Route::post('/targetEdit', [App\Http\Controllers\TargetController::class, 'targetEdit']);
//ターゲット検索画面
Route::get('target/search',[App\Http\Controllers\TargetController::class,'search']);
//イベント毎の検索画面
Route::get('target/searchEvent1',[App\Http\Controllers\TargetController::class,'searchEvent1']);
Route::get('target/searchEvent2',[App\Http\Controllers\TargetController::class,'searchEvent2']);
Route::get('target/searchEvent3',[App\Http\Controllers\TargetController::class,'searchEvent3']);
Route::get('target/searchEvent4',[App\Http\Controllers\TargetController::class,'searchEvent4']);
Route::get('target/searchEvent5',[App\Http\Controllers\TargetController::class,'searchEvent5']);
Route::get('target/searchEvent6',[App\Http\Controllers\TargetController::class,'searchEvent6']);
//ステータス毎の検索画面
Route::get('target/searchStatus1',[App\Http\Controllers\TargetController::class,'searchStatus1']);
Route::get('target/searchStatus2',[App\Http\Controllers\TargetController::class,'searchStatus2']);
Route::get('target/searchStatus3',[App\Http\Controllers\TargetController::class,'searchStatus3']);
//名前検索
Route::get('target/searchName',[App\Http\Controllers\TargetController::class,'searchName']);
//ターゲット削除
Route::post('/targetDelete/{id}',[App\Http\Controllers\TargetController::class,'targetDelete']);