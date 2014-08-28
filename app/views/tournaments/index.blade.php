@section('pageTitle', 'Tournament List')

@extends('layouts.master')

@section('content')
<div class="ui segment">
	<div class="container">
		<div class="introduction">
			<h1 class="ui header inverted">
				Tournaments
			</h1>
		</div>
	</div>
</div>
@if ($tournaments->count())
<div class="main container inverted">
	<div class="ui fixed page grid">
		<div class="sixteen wide column">
			<table class="ui table inverted">
				<thead>
					<tr>
						<th>Name</th>
						<th>Start_time</th>
						<th>End_time</th>
						<th>Type</th>
						<th>Assigned_admin</th>
						<th>&nbsp;</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tournaments as $tournament)
						<tr>
							<td>{{{ $tournament->name }}}</td>
							<td>{{{ $tournament->start_time }}}</td>
							<td>{{{ $tournament->end_time }}}</td>
							<td>{{{ $tournament->type }}}</td>
							<td>{{{ $tournament->assigned_admin }}}</td>
		                    <td>
		                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('tournaments.destroy', $tournament->id))) }}
		                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
		                        {{ Form::close() }}
		                        {{ link_to_route('tournaments.edit', 'Edit', array($tournament->id), array('class' => 'btn btn-info')) }}
		                    </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@else
	There are no tournaments
@endif

@stop
