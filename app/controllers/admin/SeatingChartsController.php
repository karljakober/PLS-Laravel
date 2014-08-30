<?php

class SeatingChartsController extends \BaseController {

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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('seatingcharts.create');
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

            return Redirect::route('seatingcharts.index');
        }

        return Redirect::route('seatingcharts.create')
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

        return View::make('seatingcharts.show', compact('seatingChart'));
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
            return Redirect::route('seatingcharts.index');
        }

        return View::make('seatingcharts.edit', compact('seatingChart'));
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

            return Redirect::route('seatingcharts.show', $id);
        }

        return Redirect::route('seatingcharts.edit', $id)
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

        return Redirect::route('seatingcharts.index');
    }

}
