<?php

class HomeController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('only' => array('getDashboard')));
	}

	public function getWelcome()
	{
		if(!Lan::active()) {
			$upcomingLan = Lan::next();
			$now = new DateTime();
			$interval = $now->diff(new DateTime($upcomingLan->start_time));
			$lantext = $interval->format("%d days, %h hours, %i minutes, %s seconds") . ' .';
			if (!$upcomingLan) {
				$previousLan = Lan::previous();
				//difference between end of lan and now
				$end_time = new DateTime($previousLan->end_time);
				$interval = $end_time->diff(new DateTime());
				$lantext = $interval->format("%d days, %h hours, %i minutes, %s seconds") . ' has passed.';
			}
		} else {
			$activeLan = Lan::active();
			//difference between now and end of lan
			$end_time = new DateTime($activeLan->end_time);
			$interval = $end_time->diff(new DateTime());
			$lantext = $interval->format("%d days, %h hours, %i minutes, %s seconds") . ' until end.';
		}

		if (Auth::check()) {
			return Redirect::to('/dashboard');
		}

		$news = News::orderBy('created_at', 'desc')->get();

		View::share('bodystyle', 'peek');
		return View::make('home.welcome', compact('upcomingLan', 'previousLan', 'activeLan', 'news', 'lantext'));
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
