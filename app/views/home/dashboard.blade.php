@section('pageTitle', 'Dashboard')

@section('pageHeader', 'Dashboard')

@extends('layouts.master')

@section('content')

<div class="main container">
    <div class="ui grid">
        <div class="three column row">
            <div class="column">
                <div class="ui segment orange">
                    <h2>Time Remaining</h2>
                    <div class="ui active orange progress striped">
                      <div class="bar" style="width:{{ $progress }}%"></div>
                    </div>
                    <h4>start: 04:00 pm - 03 oct 2014</h4>
                    <h4>end  : 04:00 pm - 05 oct 2014</h4>
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
