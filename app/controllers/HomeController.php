<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	public function showWelcome()
	{
		$this->layout->content = View::make('hello');
	}

	public function showLogin()
	{
		$this->layout->content = View::make('login');
	}

	public function doLogin()
	{
		// process the form
	}
}
