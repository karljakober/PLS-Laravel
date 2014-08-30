@section('pageTitle', 'Admin - News')

@extends('layouts.master')

@section('content')

<h1>All News</h1>

<p>{{ link_to_route('admin.news.create', 'Add New News', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($news->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Author_id</th>
                <th>Title</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($news as $news)
                <tr>
                    <td>{{{ $news->author_id }}}</td>
                    <td>{{{ $news->title }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.news.destroy', $news->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('admin.news.edit', 'Edit', array($news->id), array('class' => 'btn btn-info')) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no news
@endif

@stop
