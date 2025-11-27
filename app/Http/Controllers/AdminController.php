<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
}
