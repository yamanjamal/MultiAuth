<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function create(Request $request)
    {
        // use App\Models\User;
        // use Illuminate\Support\Facades\Auth;
        // use Illuminate\Support\Facades\Validator;
        // use Illuminate\Support\Facades\Hash;
        // dd('help');
        $request->validate([
           'name' => 'required',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|max:30|min:5',
            'cpassword' => 'required|max:30|min:5|same:password',
        ]);
        // return $request->input();

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $quary=$user->save();

        if($quary){
            return redirect()->route('user.register')->with(['success' => 'user created seccessfuly']);
        }else{
            return redirect()->route('user.register')->with(['ERORR' => 'somthing went wrong']);
        }

        // Users::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
    }
    public function check(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|max:30|min:5',
        ],[
            'email.exists'=>'this email does not exist!'
        ]);

        $cred=$request->only('email','password');
        if (Auth::guard('web')->attempt($cred)) {
            return redirect()->route('user.home')->with(['success' => 'user loggedin seccessfuly']);
        }else{
            return redirect()->route('user.login')->with(['ERORR' => 'the info is not correct']);
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
