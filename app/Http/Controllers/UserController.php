<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function index(){
        #$users = DB::table('users')->get();
        $users = User::all();

        return view('users',compact('users'));
    }

    public function create_users(){
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        //$user_password = bcrypt($_POST['password']);
        #DB::table('users')->insert(['name'=> $user_name,'email'=>$user_email,'password'=>$user_password]);

        $user = new User;
        $user->name = $user_name;
        $user->email = $user_email;
        $user->password = $user_password;
        $user->save();
        return redirect()->back();
    }

    public function destroy_users($id){
        #DB::table('users')->where('id', $id)->delete();
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }

    public function edit_users($id){
        #$user = DB::table('users')->where('id', $id)->first();
        #$users = DB::table('users')->get();

        $user = User::findOrFail($id);
        $users = User::all();

        return view('users', compact('user', 'users'));
    }

    public function update_users(){
        $id = $_POST['id'];
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        #DB::table('users')->where('id', $id)->update(['name'=> $_POST['name'],'email'=>$_POST['email'],'password' => $_POST['password'] ]);

        $user = User::findOrFail($id);
        $user->name = $user_name;
        $user->email = $user_email;
        $user->password = $user_password;
        $user->save();

        return redirect('users');
    }

}
