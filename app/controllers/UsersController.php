<?php
class UsersController extends BaseController{
    public function signup(){
        return View::make('signup');
    }

    public function signupDone(){
        $rules = array(
            'username' => 'required|unique:users|min:5', // Minumum 5 Characters and Unique
            'password' => 'required|min:8', // Password must be 8 characters, at least
            'password2' => 'same:password', // Password2 must be same of password
            'email' => 'required|email|unique:users' // Email must be an e-mail adress unique
        );

        $niceNames = array(
            'username' => 'Kullanıcı Adı',
            'password' => 'Şifre',
            'password2' => 'İkinci Şifre Alanı',
            'email' => 'E-posta'
        );

        // @TO DO You have to set Turkish words for $validation status -> finished
        // @TO DO You have to create a captcha

        $validation_result = Validator::make(Input::all(), $rules);
        $validation_result->setAttributeNames($niceNames);

        if($validation_result->fails()){
            return Redirect::to('signup')->withErrors($validation_result);
        }

        $user = new Users;
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');
        if($user->save()){
            /*if(Auth::attempt(['username'=>Input::get('username'), 'password'=>Input::get('password')], true)){
                return Redirect::to('/posts');
            }
            else
            {
                return "bir sorun oluştu :(, bu sorunla ilgileneceğiz..";
            }*/
            Auth::login($user);
            return Redirect::to('/');
        }
    }


    public function login(){
        return View::make('login');
    }

    public function loginDone(){
        if(!Auth::attempt(['username'=>Input::get('username'), 'password'=>Input::get('password')])){
            return Redirect::back()->with('error', 'Kullanıcı adı veya şifre yanlış.');
        }

        return Redirect::to('/posts');
    }
}