<?php
namespace App\Http\Validation;


class RegisterValidation {
    public function rules(){
        return [
            'name'=>['required','string','max:150','min:3'],
        'email'=>['required','string','email','min:3','unique:users'],
        'password'=>['required','string','min:8'],
        'confirm_password'=>['required','same:password'],

        ];

    }


    public function message(){
        return [
            
            'name.required'=>'vous devez specifier votre nom',
            'email.required'=>'vous devez specifier votre email',
            'email.unique'=>'mail deja utilisé',
            'password.min'=>'mot de passe avec 8 carecteres minimum',
            'confirm_password.same'=>'vos mot de passes ne sont pas identiques',

        ];

    }

}

