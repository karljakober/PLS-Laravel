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
              Current Lan<br />
              October 4th (Friday) from 4pm to the 6th (Sunday) at 4PM (48 hours)<br />
              19 days, 11 hours, 43 mins, 11 secs<br />
              Early setup Friday at 12pm!<br />
          @elseif (isset($upcomingLan))
              Upcoming Lan
          @elseif (isset($previousLan))
              Past Lan
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
    <h2>{{{ $article->title }}}</h2>
    <div class="ui message inverted">
        {{ $article->content }}
    </div>
    @endforeach
</div>

@stop
