@section('pageTitle', 'Admin - Seating Charts')

@section('pageHeader', 'Seating Charts : Admin')

@extends('layouts.master')

@section('content')

@if ($seatingCharts->count())
<div class="main container inverted">
    <div class="ui fixed page grid">
        <div class="sixteen wide column">
            <p>{{ HTML::decode(link_to_route('admin.seatingchart.create', '<i class="ui icon plus"></i>New SeatingChart', null, array('class' => 'ui orange button' ))) }}</p>
            <table class="ui table inverted">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($seatingCharts as $chart)
                        <tr>
                            <td>{{ link_to_route('seatingchart', $chart->name, array($chart->id)) }}</td>
                            <td>
                                {{ link_to_route('admin.seatingchart.edit', 'Edit', array($chart->id), array('class' => 'ui small button orange')) }}
                                {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.seatingchart.destroy', $chart->id))) }}
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
    There are no seating charts
@endif

@stop
