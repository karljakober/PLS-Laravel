<?php

class HomeController extends BaseController {

	public function getWelcome()
	{
		if(!Lan::active()) {
			$upcomingLan = Lan::next();
			if (!$upcomingLan) {
				$previousLan = Lan::previous();
			}
		} else {
			$activeLan = Lan::active();
		}

		if (Auth::check()) {
			return Redirect::to('/dashboard');
		}

		$news = News::orderBy('created_at', 'desc')->get();

		View::share('bodystyle', 'peek');
		return View::make('home.welcome', compact('upcomingLan', 'previousLan', 'activeLan', 'news'));
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
