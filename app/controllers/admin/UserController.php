<?php namespace Admin;

class UserController extends \BaseController {

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $users = \Users::all();
        return \View::make('user.admin.index', compact('users'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return \View::make('user.admin.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())
        {
            \User::create($input);

            return Redirect::route('user.admin.index');
        }

        return Redirect::route('news.admin.create')
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
        $user = \User::findOrFail($id);

        return View::make('user.admin.show', compact('user'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $news = \User::find($id);

        if (is_null($user))
        {
            return Redirect::route('admin.user.index');
        }

        return View::make('user.admin.edit', compact('user'));
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
        $validation = Validator::make($input, \User::$rules);

        if ($validation->passes())
        {
            $user = \User::find($id);
            $user->update($input);

            return Redirect::route('admin.user.show', $id);
        }

        return Redirect::route('admin.user.edit', $id)
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
        \User::find($id)->delete();

        return Redirect::route('admin.user.index');
    }
}
