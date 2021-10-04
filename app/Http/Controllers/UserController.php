<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User; // app/User.php
use App\Classroom;
use App\Student;
use App\Station;
use App\Route;
use App\Reported;
use App\Salaried;
use App\Promoted;

use Auth;

use App\Http\Requests\PostRequest;

class UserController extends Controller
{
    // ->は静的じゃないメソッド ::は静的なメソッドにアクセス
    // =>は
    // [キー => 値]
    // みたいな連想配列で使う
    
    // ログインしていないと、
    // このコントローラから送られるviewはすべてログイン必須となる
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('welcome');
    }
    
    
    public function report(User $user, Classroom $classroom, Student $student)
    {
        $auths = Auth::user();
        $month = config('month_day.month');
        $day = config('month_day.day');
        $classrooms = $classroom -> get();
        return view('report', compact('month', 'day', "classrooms", "auths"))
        ->with(
            ["users" => $user -> get()],
            // ["classrooms" => $classroom -> get()],
            ["students" => $student -> get()]
        );
        //各々のbladeの変数に各フィールドを対応させる
        //foreachで回す
        // なぜかclassroomsだけwithで渡せない compactで渡した
    }
    
    public function salary(
        User $user,
        Classroom $classroom,
        Station $station,
        Route $route
    ) {
        $auths = Auth::user();
        $month = config('month_day.month');
        $day = config('month_day.day');
        $classrooms = $classroom -> get();
        $routes = $route -> get();
        return view('salary', compact('month', 'day', "classrooms", "auths", "routes"))
        ->with(
            ["users" => $user -> get()],
            // ["classrooms" => $classroom -> get()],
        );
        //各々のbladeの変数に各フィールドを対応させる
        //foreachで回す
    }
    
    public function promotion(User $user, Classroom $classroom)
    {
        $auths = Auth::user();
        $month = config('month_day.month');
        $day = config('month_day.day');
        $classrooms = $classroom -> get();
        $users = $user -> get(); // ここだけcompactでusers渡した。特に意味はない。
        return view('promotion', compact('month', 'day', "classrooms", "users", "auths"));
        // ->with(
        //     // ["users" => $user -> get()],
        //     // ["classrooms" => $classroom -> get()],
        //     // ["students" => $student -> get()]
        // );
        //各々のbladeの変数に各フィールドを対応させる
        //foreachで回す
    }
    
    public function register_route(Request $request, Route $route)
    {
        $input = $request['route'];
        $route->create($input);
        return redirect("/salary");
    }
    

    
    
    // ユーザーの削除処理
    public function delete(User $user)
    {
        $user->delete();
        return redirect('/');
    }
    
    public function reported(Request $request, Reported $reported)
    {
        $input = $request['report'];
        $reported->create($input);
        // dd($request['report']);
        return redirect('/');
    }
    
    public function salaried(Request $request, Salaried $salaried)
    {
        $input = $request['salary'];
        $salaried->create($input);
        return redirect('/');
    }
    
    public function promoted(Request $request, Promoted $promoted)
    {
        $input = $request['promotion'];
        $promoted->create($input);
        return redirect('/');
    }
}
