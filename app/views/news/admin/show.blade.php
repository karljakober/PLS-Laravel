@section('pageTitle', 'Admin - Show News')

@extends('layouts.master')

@section('content')

<h1>Show News</h1>

<p>{{ link_to_route('admin.news.index', 'Return to All news', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Content</th>
                <th>Author_id</th>
                <th>Title</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $news->content }}}</td>
                    <td>{{{ $news->author_id }}}</td>
                    <td>{{{ $news->title }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.news.destroy', $news->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.news.edit', 'Edit', array($news->id), array('class' => 'btn btn-info')) }}
                    </td>
        </tr>
    </tbody>
</table>

@stop
