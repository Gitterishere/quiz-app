<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mcq;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function welcome(){
        $categories = Category::withCount('quizzes')->get();
        return view('welcome',
        [
            "categories"=>$categories
        ]
    );
    }

    public function userSignup(Request $request){
        $validate = $request->validate([
            "name"=>"required|min:3",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:3|confirmed"
        ]);

        $user = User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);

        if($user){
            Session::put('user',$user);
            if(Session::has('quiz-user')){
                $url = Session::get('quiz-user');
                Session::forget('quiz-user');
                return redirect($url);
            }
            return redirect('/');
        }
    }

    public function userSignupQuiz(){

        Session::put('quiz-user',url()->previous());
        return view('user-signup');
    }

    public function userLogin(Request $request){
        $validate = $request->validate([

            "email"=>"required|email",
            "password"=>"required"
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return "Invalid User Credentials";
        }

        if($user){
            Session::put('user',$user);
            if(Session::has('quiz-user')){
                $url = Session::get('quiz-user');
                Session::forget('quiz-user');
                return redirect($url);
            }
            return redirect('/');
        }
    }

    public function userLoginQuiz(){

        Session::put('quiz-user',url()->previous());
        return view('user-login');
    }

    public function userQuizList($id,$category){

        $quizData = Quiz::withCount('Mcq')->where('category_id',$id)->get();
        return view('user-quiz-list',[

            "quizData" => $quizData,
            "category" =>$category
        ]);

    }

    public function startQuiz($id, $name){
        $quizCount = Mcq::where('quiz_id',$id)->count();
        $quizName = $name;

        return view('start-quiz',[
            "quizCount" => $quizCount,
            "quizName"=>$quizName
        ]);
    }

    public function userLogout(){
        Session::forget('user');
        return redirect('/');
    }
}
