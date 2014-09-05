@section('pageTitle', 'Welcome')

@extends('layouts.master')

@section('content')
<div class="masthead segment">
  <div class="ui page grid">
    <div class="sixteen wide column">
      <div class="introduction">
        <h1 class="ui header orange">Pong Lan Software</h1>
        <h2 class="ui header orange">Under Development</h2>
        <p>Pong Lan Software (PLS) Is a fully functioned lan party management system build with Laravel. Less work for admins, more interaction for gamers.</p>
      </div>
      <div class="ui orange segment">
          @if (isset($activeLan))
              <h3>Current Lan</h3>
              <p>{{ $activeLan->name }}<p>
          @elseif (isset($upcomingLan))
              <h3>Upcoming Lan</h3>
              <p>{{ $upcomingLan->name }}<p>
          @elseif (isset($previousLan))
              <h3>Past Lan</h3>
              <p>{{ $previousLan->name }}<p>
          @endif
          <h5>{{ $lantext }}</h5>
          @if (!isset($previousLan))
          <a class="item" href="{{ URL::to('seatingchart') }}">
              <div class="ui orange button">Need a seat?</div>
          </a>
          @endif
      </div>
    </div>
  </div>
</div>
<div class="main container inverted">
    <div class="sticky-wrapper">
        <div class="peekmenu">
            <div class="ui vertical pointing secondary menu">
                @foreach($news as $article)
                  <a class="item">{{{ $article->title }}}</a>
                @endforeach
            </div>
        </div>
    </div>
    @foreach($news as $article)
    <h2>{{{ $article->title }}} - {{ link_to_route('user', $article->user->username, array($article->user->username)) }} {{ $article->created_at }}</h2>
    <div class="ui message inverted">
        {{ $article->content }}
    </div>
    @endforeach
</div>

@stop
