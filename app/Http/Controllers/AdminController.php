<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; // app/User.php
use App\Classroom;
use App\Student;
use App\Station;
use App\Route;
use App\Http\Requests\PostRequest;

class AdminController extends Controller
{
    public function __construct()
    {
        # 追加したmiddlewareを追加。
        $this->middleware('administrator');
    }
 
    public function index()
    {
        dd('adminテスト');
    }
    
    public function input_classroom()
    {
        return view("register_classroom");
    }
    
        
    public function register_classroom(Request $request, Classroom $classroom)
    {
        $classroom = new Classroom();
        $classroom->room_name = $request->room_name;
        $classroom->save();
        return redirect('/');
    }
}
