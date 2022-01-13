<?php
namespace App\Http\Validation;


class LoginValidation {
    public function rules(){
        return [
           
        'email'=>['required','string'],
        'password'=>['required','string'],
        
        ];

    }


    public function message(){
        return [
            
           
            'email.required'=>'vous devez specifier votre email',
           
            'password.min'=>'vous devez specifier votre mot de passe',
           

        ];

    }

}

