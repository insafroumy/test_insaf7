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

Route::get('tasks', function(){
    return view('tasks');
});

Route::post('create', function(){
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name'=> $task_name]);

    return view('tasks');
});
