<?php

class TournamentsController extends BaseController {

	/**
	 * Tournament Repository
	 *
	 * @var Tournament
	 */
	protected $tournament;

	public function __construct(Tournament $tournament)
	{
		$this->tournament = $tournament;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tournaments = $this->tournament->all();

		return View::make('tournaments.index', compact('tournaments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tournaments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Tournament::$rules);

		if ($validation->passes())
		{
			$this->tournament->create($input);

			return Redirect::route('tournaments.index');
		}

		return Redirect::route('tournaments.create')
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
		$tournament = $this->tournament->findOrFail($id);

		return View::make('tournaments.show', compact('tournament'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tournament = $this->tournament->find($id);

		if (is_null($tournament))
		{
			return Redirect::route('tournaments.index');
		}

		return View::make('tournaments.edit', compact('tournament'));
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
		$validation = Validator::make($input, Tournament::$rules);

		if ($validation->passes())
		{
			$tournament = $this->tournament->find($id);
			$tournament->update($input);

			return Redirect::route('tournaments.show', $id);
		}

		return Redirect::route('tournaments.edit', $id)
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
		$this->tournament->find($id)->delete();

		return Redirect::route('tournaments.index');
	}

}
