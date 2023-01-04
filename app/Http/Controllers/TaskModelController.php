<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskModel;

class TaskModelController extends Controller
{
    //render the home page and query the database
    public function index(){
        $tasks=TaskModel::all();
        return view('home')->with('tasks',$tasks);
    }
    public function store(Request $request){
        $new_task = new TaskModel;
        $new_task->taks_name = $request->task_name;
        $new_task->save();
        return back();
    }
// delete tasks 
    public function destroy($id){
        TaskModel::destroy($id);
        return back();
    }
// rediect to another page in which the task can be updated in  
    public function edit($id){
        $task = TaskModel::find($id);
        return view('editTask', compact('task'));    
    }
    
// update task 
    public function update(Request $request, $id){
        $task = TaskModel::find($id);
        $task->taks_name = $request->task_name;
        $task->save();
        return redirect()->route('home');
    }
}










// create new task
// public function store(Request $request){
//     // $new_task = new TaskModel;
//     // $new_task->taks_name = $request->task_name; 
//     // $new_task->save();
//     // return redirect()->route('home');
//     $data=$request->validate([
//         "task_models"=>"required"
//     ]);
//     TaskModel::create($data);
//     return back();
// }