<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	public function showWelcome()
	{
		if (Auth::check()) {
			return Redirect::to('/dashboard');
		}
		$this->layout->content = View::make('home.welcome');
	}

	public function showDashboard()
	{
		$this->layout->content = View::make('home.dashboard');
	}

	public function showSponsors()
	{
		$this->layout->content = View::make('home.sponsors');
	}

}
