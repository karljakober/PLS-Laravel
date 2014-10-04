@section('pageTitle', 'Admin - Create Seating Chart')

@section('pageHeader', 'Create Seating Chart : Admin')

@extends('layouts.master')

@section('content')

<style>
    #grid-source { position: absolute; }
    #grid-overlay { position: relative; }

    .hover { background-color: rgba(0,0,0,0.1) !important; }
    .selected { background-color: none; }

    .eraser { background-color: rgba(0,0,0,0.5); }
    .seat { background-color: #D9EDF7; border: 1px solid black; }
    .execseat { background-color: orange; border: 1px solid black; }

    .wall { background-color: black; }
    .trash { background-color: red; }
    .floor { background-color: grey; }

</style>

<div class="main container">
    <div class="ui grid">
        <div class="sixteen wide column">
            <div class="ui row">
                <div class="sixteen wide column">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="two column row">
            <div class="four wide column">
                <div class="ui segment orange">
                    <h2>Tile Set</h2>
                    <div class="ui selection list">
                      <div class="item">
                        <i class="ui icon erase large"></i>
                        <div class="content">
                          <div class="header" id="seat">Seat</div>
                        </div>
                      </div>
                      <div class="item">
                        <i class="ui icon erase large"></i>
                        <div class="content">
                          <div class="header" id="execseat">Exec Seat</div>
                        </div>
                      </div>
                      <div class="item">
                        <i class="ui icon erase large"></i>
                        <div class="content">
                          <div class="header" id="wall">Wall</div>
                        </div>
                      </div>
                      <div class="item">
                        <i class="ui icon erase large"></i>
                        <div class="content">
                          <div class="header" id="floor">Floor</div>
                        </div>
                      </div>
                      <div class="item">
                        <i class="ui icon erase large"></i>
                        <div class="content">
                          <div class="header" id="trash">Trash Bin</div>
                        </div>
                      </div>
                      <div class="item">
                        <i class="ui icon erase large"></i>
                        <div class="content">
                          <div class="header" id="eraser">Eraser</div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="ui form segment orange">
                    <h2>Details</h2>
                    <form class="bs-example form-horizontal">
                        <div class="field">
                          <label for="inputChartName">Chart Name</label>
                          <input type="text" class="opaque" id="inputChartName" placeholder="General Seating Chart">
                        </div>
                        <div class="field">
                          <label for="inputWidth">Width</label>
                          <input type="text" class="opaque" value="32" id="inputWidth">
                          <button class="ui orange button" type="button" id="setWidth">Set Width</button>
                        </div>
                        <div class="field">
                          <label for="inputHeight">Height</label>
                          <input type="text" class="opaque" value="32" id="inputHeight">
                          <button class="ui button orange" type="button" id="setHeight">Set Height</button>
                        </div>
                        
                        <div class="field">
                          <button type="button" class="ui button orange" id="saveChart">Save Seating Chart</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="twelve wide column">
                <div id="grid-source"></div>
            </div>
        </div>
    </div>
</div>

@stop
