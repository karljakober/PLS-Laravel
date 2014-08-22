@section('pageTitle', 'Dashboard')

@extends('layouts.master')

@section('content')
<div class="ui segment">
  <div class="container">
    <div class="introduction">
      <h1 class="ui header inverted">
        Dashboard
      </h1>
    </div>
  </div>
</div>
<div class="main container">
    <div class="ui grid">
      <div class="three column row">
        <div class="column">
          <div class="ui segment orange">
            Three
          </div>
        </div>
        <div class="column">
          <div class="ui segment inverted">
            Three
          </div>
        </div>
        <div class="column">
          <div class="ui segment orange">
            Three
          </div>
        </div>
      </div>
    </div>
</div>

@stop
