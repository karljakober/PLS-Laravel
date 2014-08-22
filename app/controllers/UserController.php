<?php

class UserController extends BaseController {

    protected $layout = 'layouts.master';

    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::to('/dashboard');
        }
        $this->layout->content = View::make('user.login');
    }

    public function postLogin()
    {
        // run validation rules on inputs
        $validator = Validator::make(Input::all(), User::$rules);

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

    public function getLogout()
    {
        Auth::logout(); // log out
        return Redirect::to('/');
    }

    public function getProfile($username) {
        $user = User::where('username', '=', $username)->get();
        print_r($user);
    }

    public function getSettings() {

    }


}
