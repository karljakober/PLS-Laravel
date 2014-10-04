@section('pageTitle', 'Seating Chart')

@section('pageHeader', 'Seating Chart')

@extends('layouts.master')

@section('content')
<script type="text/javascript">
$(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="popover"]').click(function () {
         $('[data-toggle="popover"]').not(this).popover('hide');
    });
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<style>
    #grid-source { position: absolute; }
    #grid-overlay { position: relative; }

    .hover { background-color: rgba(0,0,0,0.1) !important; }
    .selected { background-color: none; }

    .eraser { background-color: rgba(0,0,0,0.5); }
    .seat { background-color: #D9EDF7; border: 1px solid black; }
    .execseat { background-color: orange; border: 1px solid black; }
    .seattaken { background-color: purple; border: 1px solid black; }

    .wall { background-color: black; }
    .trash { background-color: red; }
    .floor { background-color: #FCF8E3; }

</style>

<div class="main container inverted">
    <div class="ui fixed page grid">
        <div class="sixteen wide column">
            <h2>{{ $seatingChart->name }}</h2>
            <table>
                <tbody>
                    <tr>
                    <?php $row = 0; ?>
                    @foreach($seatingChartTiles as $tile)
                        @if ($row != $tile->x)
                            </tr><tr>
                        @endif
                        <?php $seat = false; ?>
                        <?php //tile is a seat ?>
            			<?php $row = $tile->x; ?>

                        @if (isset($tile->seat_number) && $tile->seat_number != "")
                            @if (isset($tile['UserSeating']))
                                <?php //There is someone sitting down ?>
                                <td class="@if ($tile->tile_id == 'execseat') {{ 'execseattaken' }} @else {{ 'seattaken' }} @endif" style="width: 16px; height: 16px; font-size: 50%; text-align: center;" data-container="body" data-toggle="tooltip" data-placement="left" title="" data-original-title="{{ $tile->User->username }} is sitting here!">{{ $tile->seat_number }}
                            @else
                            	<?php //no one sitting down ?>
                                <td class="{{ $tile->tile_id }}" style="width: 16px; height: 16px; font-size: 50%; text-align: center;" data-container="body" data-toggle="popover" data-placement="left" data-content="No one is currently sitting here. Would you like to Sit down?">{{ $tile->seat_number }}
                            @endif
                        @else
                            <td class="{{ $tile->tile_id }}" style="width: 16px; height: 16px; font-size: 50%; text-align: center;"></td>
               			@endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
