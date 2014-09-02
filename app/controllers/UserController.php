<?php

class UserController extends BaseController {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getIndex()
    {

    }

    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::to('/dashboard');
        }
        return View::make('user.login');
    }

    public function postLogin()
    {
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:5'
        );

        // run validation rules on inputs
        $validator = Validator::make(Input::all(), $rules);

        //fail, redirect back to login, without password
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // success, create user data
            $userdata = array(
                'email' 	=> Input::get('email'),
                'password' 	=> Input::get('password')
            );

            // login
            if (Auth::attempt($userdata)) {
                // validation successful!
                // redirect them to the dashboard
                return Redirect::to('dashboard')->with('flash_success', 'Logged in successfully. Welcome!');
            } else {
                // validation not successful, send back to form
                return Redirect::to('login');
            }

        }
    }

    public function getRegister()
    {
        return View::make('user.register');
    }

    public function postRegister()
    {
        $rules = array(
            'email'    => 'required|email|unique:users',
            'password' => 'required|alphaNum|min:5|confirmed',
            'username' => 'required|alphaNum|min:3|unique:users',
            'password_confirmation'=>'required|alphaNum|min:5'
        );

        // run validation rules on inputs
        $validator = Validator::make(Input::all(), $rules);
        //fail, redirect back to login, without password
        if ($validator->fails()) {
            return Redirect::to('register')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation'));
        } else {
            // success, create user data
            $userdata = array(
                'email' 	=> Input::get('email'),
                'password' 	=> Input::get('password')
            );

            $user = new User;
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            // login
            if (Auth::attempt($userdata)) {
                // validation successful!
                // redirect them to the dashboard
                return Redirect::to('dashboard');
            } else {
                // validation not successful, send back to form
                return Redirect::to('login');
            }

        }

    }

    public function getLogout()
    {
        Auth::logout(); // log out
        return Redirect::to('/');
    }

    public function getProfile($username) {
        $user = $this->user->where('username', '=', $username)->get();
        print_r($user);
    }

    public function getSettings() {

    }


}
