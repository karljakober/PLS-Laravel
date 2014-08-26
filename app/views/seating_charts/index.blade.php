@extends('layouts.scaffold')

@section('main')

<h1>All Seating_charts</h1>

<p>{{ link_to_route('seating_charts.create', 'Add New Seating_chart', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($seating_charts->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Width</th>
				<th>Height</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($seating_charts as $seating_chart)
				<tr>
					<td>{{{ $seating_chart->name }}}</td>
					<td>{{{ $seating_chart->width }}}</td>
					<td>{{{ $seating_chart->height }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('seating_charts.destroy', $seating_chart->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('seating_charts.edit', 'Edit', array($seating_chart->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no seating_charts
@endif

@stop
