<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   
    public function check(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:admins,email',
            'password' => 'required|max:30|min:5',
        ],[
            'email.exists'=>'this email does not exist!'
        ]);

        $cred=$request->only('email','password');
        if (Auth::guard('admin')->attempt($cred)) {
            return redirect()->route('admin.home')->with(['success' => 'admin loggedin seccessfuly']);
        }else{
            return redirect()->route('admin.login')->with(['ERORR' => 'the info is not correct']);
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
