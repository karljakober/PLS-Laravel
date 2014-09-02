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
		$this->beforeFilter('auth', array('only' => array('postRegister', 'postAdd')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tournaments = $this->tournament->all();

		$inlist = false;
		foreach ($tournaments as $tournament)
		{
		    if (Auth::check() && $tournament->user->id == Auth::user()->id) {
				$inlist = true;
			}
		}

		return View::make('tournaments.index', compact('tournaments', 'inlist'));
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

}
