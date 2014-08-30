<?php

class SeatingChartsController extends BaseController {

	/**
	 * SeatingChart Repository
	 *
	 * @var SeatingChart
	 */
	protected $seatingChart;

	public function __construct(SeatingChart $seatingChart)
	{
		$this->seatingChart = $seatingChart;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Lan::active()) {
			$lan = Lan::next();
			if (!$lan) {
				$lan = Lan::previous();
			}
		} else {
			$lan = Lan::active();
		}

		$seatingChart = $this->seatingChart->find($lan->seating_chart_id)->first();
		$seatingChartTiles = SeatingChartTile::where('seating_chart_id', '=', $lan->seating_chart_id)->get();
		return View::make('seatingcharts.index', compact('seatingChart', 'seatingChartTiles'));
	}

}
