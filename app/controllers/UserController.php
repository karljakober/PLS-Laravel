<?php

class UserController extends BaseController {

    protected $layout = 'layouts.master';

    public function showLogin()
    {
        if (Auth::check()) {
            return Redirect::to('/dashboard');
        }
        $this->layout->content = View::make('user.login');
    }

    public function doLogin()
    {
        //validation rules
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
                return Redirect::to('dashboard');
            } else {
                // validation not successful, send back to form
                return Redirect::to('login');
            }

        }
    }

    public function doLogout()
    {
        Auth::logout(); // log out
        return Redirect::to('/');
    }
}
