<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Mcq;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request){

        $validation = $request->validate([
            "name"=>"required|max:255",
            "password"=>"required|max:255"
        ]);

        $admin = Admin::where([
            ['name','=',$request->name],
            ['password','=',$request->password]
        ])->first();

        if(!$admin){
            $validation = $request->validate([
            "user"=>"required",

        ],[
            "user.required"=>"User Does Not Exist"
        ]);
        }
        Session::put('admin',$admin);
        return redirect('dashboard');
    }

    public function dashboard(){
        $admin = Session::get('admin');
        if($admin){
            return view('admin',[
                "name"=>$admin->name,
            ]);
        }else{
            $admin = Session::get('admin');
            return redirect('admin-login');
        }

    }

    public function categories(){

        $admin = Session::get('admin');
        $categories = Category::get();

        if($admin){
            return view('categories',[
                "name"=>$admin->name,
                "categories" => $categories
            ]);
        }else{
            $admin = Session::get('admin');
            return redirect('admin-login');
        }
    }

    public function addCategory(Request $request){
        $admin = Session::get('admin');

        $validation = $request->validate([
            "category" => "required | min:3 | unique:categories,name"
        ]);

        $category = new Category();
        $category->name = $request->category;
        $category->creator = $admin->name;
        if($category->save()){
            Session::flash('category', "Success: Category " . $request->category. " Added");
        }
        return redirect('admin-categories');
    }

    public function addQuiz(){
        $admin = Session::get('admin');
        $categories = Category::get();

        if($admin){
            $quizName = request('quiz');
            $category_id = request('category_id');

            if($quizName && $category_id && !Session::has('quizDetails')){
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if($quiz->save()){
                    Session::put('quizDetails',$quiz);
                }
            }

            return view('add-quiz',[
                "name"=>$admin->name,
                "categories" => $categories
            ]);
        }else{
            $admin = Session::get('admin');
            return redirect('admin-login');
        }
    }

    public function deleteCategory($id){
        $isDeleted = Category::find($id)->delete();
        if($isDeleted){
            Session::flash('category', "Success: Category Deleted");
        }
        return redirect('admin-categories');
    }

    public function addMCQs(Request $request){

        $request->validate([
            "question" => "required",
            "a"=>"required",
            "b"=>"required",
            "c"=>"required",
            "d"=>"required",
            "correct_ans"=>"required"
        ]);

       $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');
        $mcq = new Mcq();

        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->correct_ans = $request->correct_ans;

        $mcq->admin_id = $admin->id;
        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $quiz->category_id;

        if($mcq->save()){
            if($request->submit == "add-more"){
                return redirect(url()->previous());
            }else{
                Session::forget('quizDetails');
                return redirect('/admin-categories');
            }
        }
    }

    public function endQuiz(){
        Session::forget('quizDetails');
        return redirect('/admin-categories');
    }

    public function logout(){
        Session::forget('admin');
        return redirect('admin-login');
    }


}
