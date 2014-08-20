<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	public function getWelcome()
	{
		if (Auth::check()) {
			return Redirect::to('/dashboard');
		}

		View::share('bodystyle', 'peek');
		$this->layout->content = View::make('home.welcome');
	}

	public function getDashboard()
	{
		$this->layout->content = View::make('home.dashboard');
	}

	public function getSponsors()
	{
		$this->layout->content = View::make('home.sponsors');
	}

}
