<?php namespace admin;

class SeatingChartsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $seatingCharts = \SeatingChart::all();
        return \View::make('seatingcharts.admin.index', compact('seatingCharts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $jsIncludes = array('addSeatingChart.js');
        return \View::make('seatingcharts.admin.create', compact('jsIncludes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if(\Input::get('jsonData')) {

            $data = json_decode(\Input::get('jsonData'),true);
            $chart = new \SeatingChart;
            $chart->name = $data['name'];
            $chart->width = $data['width'];
            $chart->height = $data['height'];
            $chart->save();
            $chartId = $chart->id;
            $tiles = array();
 
            foreach ($data['tiles'] as $thetile) {
                $tile = array();
                $tile['seating_chart_id'] = $chartId;
                $tile['x'] = $thetile['x'];
                $tile['y'] = $thetile['y'];
                $tile['tile_id'] = $thetile['tileName'];
                if (isset($thetile['seatId'])) {
                    $tile['seat_number'] = $thetile['seatId'];
                } else {
                    $tile['seat_number'] = null;
                }
                $tiles[] = $tile;
            }
            \SeatingChartTile::insert($tiles);
        }
        echo 'success';
        exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $seatingChart = \SeatingChart::findOrFail($id);

        return \View::make('seatingcharts.show', compact('seatingChart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $seatingChart = \SeatingChart::find($id);

        if (is_null($seatingChart))
        {
            return \Redirect::route('seatingcharts.index');
        }

        return \View::make('seatingcharts.edit', compact('seatingChart'));
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
        $validation = \Validator::make($input, \SeatingChart::$rules);

        if ($validation->passes())
        {
            $seatingChart = \SeatingChart::find($id);
            $seatingChart->update($input);

            return \Redirect::route('seatingcharts.show', $id);
        }

        return \Redirect::route('seatingcharts.edit', $id)
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
        \SeatingChart::find($id)->delete();

        return \Redirect::route('seatingcharts.index');
    }

}
