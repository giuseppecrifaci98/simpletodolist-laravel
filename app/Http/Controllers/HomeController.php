<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Tasks;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // retrieve user id
        $users = auth()->user()->id;
        // retrieve list of task
        $tasklist = Tasks::where('user_id',$users)->get();
        // reteive list o task compelte, imcompelte
        $taskincomplete = Tasks::where('user_id',$users)->where('status',0)->count();
        $taskcomplete = Tasks::where('user_id',$users)->where('status',1)->count();
        return view('home',compact('tasklist','taskincomplete','taskcomplete'));
    }
}
