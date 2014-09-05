@section('pageTitle', 'Admin - News')

@extends('layouts.master')

@section('content')
<div class="ui segment">
    <div class="container">
        <div class="introduction">
            <h1 class="ui header inverted">
                News : Admin
            </h1>
        </div>
    </div>
</div>


@if ($news->count())
<div class="main container inverted">
    <div class="ui fixed page grid">
        <div class="sixteen wide column">
            <p>{{ HTML::decode(link_to_route('admin.news.create', '<i class="ui icon plus"></i>New News', null, array('class' => 'ui orange button' ))) }}</p>
            <table class="ui table inverted">
                <thead>
                    <tr>
                        <th>Author Username</th>
                        <th>Title</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($news as $news)
                        <tr>
                            <td>{{ link_to_route('user', $news->user->username, array($news->user->username)) }}</td>
                            <td>{{ link_to_route('admin.news.show', $news->title, array($news->id)) }}</td>
                            <td>
                                {{ link_to_route('admin.news.edit', 'Edit', array($news->id), array('class' => 'ui small button orange')) }}
                                {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.news.destroy', $news->id))) }}
                                    {{ Form::submit('Delete', array('class' => 'ui small negative button')) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
    There are no news
@endif

@stop
