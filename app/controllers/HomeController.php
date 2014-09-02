<?php

class HomeController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('only' => array('getDashboard')));
	}

	public function getWelcome()
	{
		$now = new DateTime();
		if(!Lan::active()) {
			$upcomingLan = Lan::next();
			$interval = $now->diff(new DateTime($upcomingLan->start_time));
			$lantext = $interval->format("%d days, %h hours, %i minutes, %s seconds") . ' .';
			if (!$upcomingLan) {
				$previousLan = Lan::previous();
				//difference between end of lan and now
				$end_time = new DateTime($previousLan->end_time);
				$interval = $end_time->diff($now);
				$lantext = $interval->format("%d days, %h hours, %i minutes, %s seconds") . ' has passed.';
			}
		} else {
			$activeLan = Lan::active();
			//difference between now and end of lan
			$end_time = new DateTime($activeLan->end_time);
			$interval = $end_time->diff($now);
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
		$now = new DateTime();

		if(!Lan::active()) {
			$upcomingLan = Lan::next();
			$end_time = new DateTime($previousLan->end_time);
			$start_time = new DateTime($upcomingLan->start_time);

			$progress = (time() - $end_time->getTimestamp()) / ($start_time->getTimestamp() - $end_time->getTimestamp()) * 100;

			$end_time = $end_time->format('Y-m-d H:i:s');
			$start_time = $start_time->format('Y-m-d H:i:s');
			if (!$upcomingLan) {
				$previousLan = Lan::previous();
				$end_time = new DateTime($previousLan->end_time);
				$start_time = new DateTime($previousLan->start_time);
				$progress = '100';
				$end_time = $end_time->format('Y-m-d H:i:s');
				$start_time = $start_time->format('Y-m-d H:i:s');

			}
		} else {
			$activeLan = Lan::active();
			$end_time = new DateTime($activeLan->end_time);
			$start_time = new DateTime($activeLan->start_time);
			$progress = (time() - $start_time->getTimestamp()) / ($end_time->getTimestamp() - $start_time->getTimestamp()) * 100;
			$end_time = $end_time->format('Y-m-d H:i:s');
			$start_time = $start_time->format('Y-m-d H:i:s');
		}

		$this->layout->content = View::make('home.dashboard', compact('end_time', 'start_time', 'progress'));
	}

	public function getSponsors()
	{
		$this->layout->content = View::make('home.sponsors');
	}

}
