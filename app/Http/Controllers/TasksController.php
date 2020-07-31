<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Tasks;

class TasksController extends Controller
{
    // instance of construct for check for the user authenticate
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('task.index');
    }

    public function store(){
        // verify the data
       $data = request()->validate([
            'title' => ['required','string','max:255','unique:tasks'],
            'description' => 'required'
        ]);
      // dd($data);
        // print the all request
       //dd($data);

       // insert the data in the table

      auth()->user()->task()->create([
        'title' => $data['title'],
        'description'=> $data['description'],
        'user_id'=>auth()->user()->id
    ]);

    // return on index
    return redirect('/home');
    }


    public function index($task){
        $task = Tasks::findOrFail($task);
        return view('task.update',compact('task'));
    }

    public function update(){
        $data= request()->validate([
            'id'=>'required',
            'title'=>'required',
            'description' => 'required',
            'status'=> ['required','integer','between:0,1'],
            'user_id'=> 'required'
        ]);

     //dd($data);
      $record= Tasks::where('id', request('id'))->update($data);
      //  auth()->user()->task()->update(array_merge($data ?? [] ));
        return redirect('/home');
    }

    public function delete($task){
        Tasks::find($task)->delete();
        return redirect('/home');
    }

    public function details($task){
        $task = Tasks::findOrFail($task);
        return view('task.details',compact('task'));
    }
}
