@extends('layouts.scaffold')

@section('main')

<h1>All Tournaments</h1>

<p>{{ link_to_route('tournaments.create', 'Add New Tournament', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($tournaments->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Lan_id</th>
				<th>Name</th>
				<th>Start_time</th>
				<th>End_time</th>
				<th>Type</th>
				<th>Allow_teams</th>
				<th>Assigned_admin</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tournaments as $tournament)
				<tr>
					<td>{{{ $tournament->lan_id }}}</td>
					<td>{{{ $tournament->name }}}</td>
					<td>{{{ $tournament->start_time }}}</td>
					<td>{{{ $tournament->end_time }}}</td>
					<td>{{{ $tournament->type }}}</td>
					<td>{{{ $tournament->allow_teams }}}</td>
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
@else
	There are no tournaments
@endif

@stop
