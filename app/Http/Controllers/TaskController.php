<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        #$tasks = DB::table('tasks')->get();
        $tasks = Task::all();

        return view('tasks',compact('tasks'));
    }

    public function create(){
        $task_name = $_POST['name'];
        #DB::table('tasks')->insert(['name'=> $task_name]);

        $task = new Task;
        $task->name = $task_name;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id){
        #DB::table('tasks')->where('id', $id)->delete();

        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back();
    }

    public function edit($id){
        #$task = DB::table('tasks')->where('id', $id)->first();
        #$tasks = DB::table('tasks')->get();

        $task = Task::findOrFail($id);
        $tasks = Task::all();

        return view('tasks', compact('task', 'tasks'));
    }

    public function update(){
        $id = $_POST['id'];
        $task_name = $_POST['name'];

        #DB::table('tasks')->where('id', $id)->update(['name'=> $_POST['name']]);

        $task = Task::findOrFail($id);
        $task->name = $task_name;
        $task->save();
        return redirect('tasks');
    }
}
