<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mcq;
use App\Models\MCQ_Record;
use App\Models\Quiz;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\map;

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
        $mcqs = Mcq::where('quiz_id',$id)->get();
        Session::put('firstMCQ',$mcqs[0]);

        return view('start-quiz',[
            "quizCount" => $quizCount,
            "quizName"=>$quizName
        ]);
    }

    public function mcq($id,$name){
        $record = new Record();
        $record->user_id = Session::get('user')->id;
        $record->quiz_id = Session::get('firstMCQ')->quiz_id;
        $record->status = 1;

        if($record->save()){
            $currentQuiz = [];
            $currentQuiz['totalMCQ'] = Mcq::where('quiz_id',Session::get('firstMCQ')->quiz_id)->count();
            $currentQuiz['currentMcq'] = 1;
            $currentQuiz['quizName'] = $name;
            $currentQuiz['quizId'] = Session::get('firstMCQ')->quiz_id;
            $currentQuiz['record_id'] = $record->id;
            Session::put('currentQuiz',$currentQuiz);
            $mcqData = Mcq::find($id);
            return view('mcq-page',[
                "quizName"=>$name,
                "mcqData"=>$mcqData
            ]);
        }else{
            return "Something Went Wrong";
        }

    }



    public function selectAndNext(Request $request, $id)
    {
        $currentQuiz = Session::get('currentQuiz');
        $currentQuiz['currentMcq'] += 1;
        $mcqData = Mcq::where([
            ['id', '>', $id],
            ['quiz_id', '=', $currentQuiz['quizId']]
        ])->first();

        $isExist = MCQ_Record::where([
            ["record_id", "=", $currentQuiz['record_id']],
            ["mcq_id", "=", $request->id],
        ])->count();
        if ($isExist < 1) {

            $mcq_record = new MCQ_Record();
            $mcq_record->record_id = $currentQuiz['record_id'];
            $mcq_record->user_id = Session::get('user')->id;
            $mcq_record->mcq_id = $request->id;
            $mcq_record->select_answer = $request->option;
            if ($request->option == Mcq::find($request->id)->correct_ans) {
                $mcq_record->is_correct = 1;
            } else {
                $mcq_record->is_correct = 0;
            }
            if (!$mcq_record->save()) {
                return "Something Went Wrong";
            }
            Session::put('currentQuiz', $currentQuiz);


            if ($mcqData) {

                return view('mcq-page', [
                    "quizName" => $currentQuiz['quizName'],
                    "mcqData" => $mcqData
                ]);
            }
            Record::where('id', $currentQuiz['record_id'])
            ->update(['status' => 2]);

            // Fetch result
            $resultData = MCQ_Record::WithMCQ()
                ->where('record_id', $currentQuiz['record_id'])
                ->get();

            $correctAns = MCQ_Record::where('record_id', $currentQuiz['record_id'])
                ->where('is_correct', 1)
                ->count();

            return view('quiz-result', [
                "resultData" => $resultData,
                "correctAns" => $correctAns
            ]);
        }
    }

    public function userDetails(){
        $quizRecord = Record::WithQuiz()->where('user_id',Session::get('user')->id)->get();
        return view('user-details',[
            "quizRecord"=>$quizRecord
        ]);
    }

    public function searchQuiz(Request $request){
        $quizData = Quiz::withCount('Mcq')->where('name','Like','%'.$request->search.'%')->get();
        return view('quiz-search',[
            "quizData" => $quizData,
            "quiz" => $request->search
        ]);
    }

    public function userLogout(){
        Session::forget('user');
        return redirect('/');
    }

}
