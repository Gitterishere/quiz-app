<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mcq;
use App\Models\Quiz;
use Illuminate\Http\Request;

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
            "email"=>"required|email",
            "password"=>"required|min:3|confirmed"
        ]);
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
}
