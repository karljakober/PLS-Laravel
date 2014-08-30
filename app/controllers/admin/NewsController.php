<?php namespace Admin;

class NewsController extends \BaseController {

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $news = \News::all();
        return \View::make('news.admin.index', compact('news'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return \View::make('news.admin.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, News::$rules);

        if ($validation->passes())
        {
            \News::create($input);

            return Redirect::route('news.admin.index');
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
        $news = \News::findOrFail($id);

        return View::make('news.admin.show', compact('news'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $news = \News::find($id);

        if (is_null($news))
        {
            return Redirect::route('admin.news.index');
        }

        return View::make('news.admin.edit', compact('news'));
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
        $validation = Validator::make($input, \News::$rules);

        if ($validation->passes())
        {
            $news = \News::find($id);
            $news->update($input);

            return Redirect::route('admin.news.show', $id);
        }

        return Redirect::route('admin.news.edit', $id)
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
        \News::find($id)->delete();

        return Redirect::route('admin.news.index');
    }
}
