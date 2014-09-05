@section('pageTitle', 'Admin - Show News')

@extends('layouts.master')

@section('content')


<div class="ui segment">
    <div class="container">
        <div class="introduction">
            <h1 class="ui header inverted">
                Preview News : Admin
            </h1>
        </div>
    </div>
</div>
<div class="main container inverted">
    <div class="ui fixed page grid">
        <div class="sixteen wide column">
            <div class="ui message inverted">
                <h3>{{{ $news->title }}} - Posted by {{ $news->user->username }} {{ $news->created_at }}</h3>
                <p>{{ $news->content }}</p>
            </div>
            {{ HTML::decode(link_to_route('admin.news.index', '<i class="arrow left icon"></i>', null, array('class' => 'ui orange button' ))) }}
            {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.news.destroy', $news->id))) }}
                {{ Form::submit('Delete', array('class' => 'ui button red')) }}
            {{ Form::close() }}
            {{ link_to_route('admin.news.edit', 'Edit', array($news->id), array('class' => 'ui button orange')) }}

        </div>
    </div>
</div>

@stop
