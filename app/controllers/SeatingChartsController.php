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
		$seatingCharts = $this->seatingChart->all();

		return View::make('seating_charts.index', compact('seatingCharts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('seating_charts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, SeatingChart::$rules);

		if ($validation->passes())
		{
			$this->seatingChart->create($input);

			return Redirect::route('seating_charts.index');
		}

		return Redirect::route('seating_charts.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$seatingChart = $this->seatingChart->findOrFail($id);

		return View::make('seating_charts.show', compact('seatingChart'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$seatingChart = $this->seatingChart->find($id);

		if (is_null($seatingChart))
		{
			return Redirect::route('seating_charts.index');
		}

		return View::make('seating_charts.edit', compact('seatingChart'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, SeatingChart::$rules);

		if ($validation->passes())
		{
			$seatingChart = $this->seatingChart->find($id);
			$seatingChart->update($input);

			return Redirect::route('seating_charts.show', $id);
		}

		return Redirect::route('seating_charts.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->seatingChart->find($id)->delete();

		return Redirect::route('seating_charts.index');
	}

}
