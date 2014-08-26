<?php

class ServersController extends BaseController {

	/**
	* Server Repository
	*
	* @var Server
	*/
	protected $server;

	public function __construct(Server $server)
	{
		$this->server = $server;
	}

	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{
		//TODO: needs current lan id
		$officialservers = $this->server->where('official', '=', true)->get();
		$userservers = $this->server->where('official', '!=', true)->get();

		return View::make('servers.index', compact('officialservers', 'userservers'));
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return View::make('servers.create');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @return Response
	*/
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Server::$rules);

		if ($validation->passes())
		{
			$this->server->create($input);

			return Redirect::route('servers.index');
		}

		return Redirect::route('servers.create')
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
		$server = $this->server->findOrFail($id);

		return View::make('servers.show', compact('server'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function edit($id)
	{
		$server = $this->server->find($id);

		if (is_null($server))
		{
			return Redirect::route('servers.index');
		}

		return View::make('servers.edit', compact('server'));
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
		$validation = Validator::make($input, Server::$rules);

		if ($validation->passes())
		{
			$server = $this->server->find($id);
			$server->update($input);

			return Redirect::route('servers.show', $id);
		}

		return Redirect::route('servers.edit', $id)
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
		$this->server->find($id)->delete();

		return Redirect::route('servers.index');
	}

}
