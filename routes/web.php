<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'Insaf';
    $departments =[
        '1' => 'technical',
        '2' => 'Finantial',
        '3' => 'Sales'
    ] ;

    //return view('about',['name' => $name]);
    //return view('about')->with('name', $name);
    return view('about', compact('name', 'departments'));

});

Route::post('/about', function () {
    $name = $_POST['name'];
    $departments=[
        '1' => 'technical',
        '2' => 'Finantial',
        '3' => 'Sales'
    ] ;
    return view('about', compact('name','departments'));
});

Route::get('app', function(){
    return view('layouts.app');
});

Route::get('tasks', [TaskController::class, 'index']);

Route::post('create', [TaskController::class, 'create']);

Route::post('delete/{id}',[TaskController::class, 'destroy']);

Route::post('edit/{id}',[TaskController::class,'edit'] );

Route::post('update',[TaskController::class,'update']);



Route::get('users', [UserController::class, 'index']);

Route::post('create_users', [UserController::class, 'create_users']);

Route::post('delete_users/{id}',[UserController::class, 'destroy_users']);

Route::post('edit_users/{id}',[UserController::class,'edit_users'] );

Route::post('update_users',[UserController::class,'update_users']);

