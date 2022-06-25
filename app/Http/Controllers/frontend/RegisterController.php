<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class RegisterController extends Controller{
    public function index(){
        return view ('frontend.admin.register');
    }

    public function register(StoreUserRequest $req){
        $req->validated();
        Auth::login($user=User::create([
            'first_name'=>$req->first_name ,
            'last_name'=> $req->last_name,
            'email'=> $req->email,
            'password'=> Hash::make($req->password),
        ]));
        return redirect(RouteServiceProvider::HOME);
    }
}
