<?php

namespace App\Http\Controllers;

use App\Http\Validation\LoginValidation;
use App\Http\Validation\RegisterValidation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthenticationContrller extends Controller
{
    public function register(Request $request,RegisterValidation $validation)
    {$validator=Validator::make($request->all(),$validation->rules(),$validation->message());

    if($validator->fails()){
        return response()->json(['errors' => $validator->errors()]);
    }
        


       $user= User::Create([
            'email'=>$request->input('email'),
            'name'=>$request->input('name'),
            'password'=>bcrypt($request->input('password')),
            'api_token'=>Str::random()
            ]);

        return response()->json($user);
    }

    public function login(Request $request,LoginValidation $validation){
        $validator=Validator::make($request->all(),$validation->rules(),$validation->message());
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        if(Auth::attempt([ 'email'=> $request->input('email'),'password' => $request->input('password')]))
        { 
            
            $user=User::where('email',$request->input('email'))->firstOrFail();
            return response()->json($user);
            

           
           
           
        }
            else {
                return response()->json(['errors'=>'mauvais parametres de connexion!!']);
               }
        
    }
}
