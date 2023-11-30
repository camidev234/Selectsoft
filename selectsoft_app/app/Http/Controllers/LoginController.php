<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index(){
        $roles= Role::all();
        return view('/auth/login',[
            'roles' => $roles
        ]);
    }

    public function autenticar(Request $request){
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('message', 'crendeciales incorrectas.');
        }
        $user=Auth::user();
        if($user->role_id){
            return redirect()->route('user.index');
        }
    }

}
