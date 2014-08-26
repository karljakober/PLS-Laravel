@extends('layouts.master')

@section('content')

<div class="main container inverted">
	<div class="ui fixed page grid">
		<div class="sixteen wide column">
			<h1>Show Server</h1>

			<p>{{ link_to_route('servers.index', 'Return to All servers', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

			<table class="ui table segment">
				<thead>
					<tr>
						<th>Lan_id</th>
							<th>Name</th>
							<th>Address</th>
							<th>User_id</th>
							<th>Additional_info</th>
							<th>Official</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>{{{ $server->lan_id }}}</td>
						<td>{{{ $server->name }}}</td>
						<td>{{{ $server->address }}}</td>
						<td>{{{ $server->user_id }}}</td>
						<td>{{{ $server->additional_info }}}</td>
						<td>{{{ $server->official }}}</td>
						<td>
							{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('servers.destroy', $server->id))) }}
								{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
							{{ Form::close() }}
							{{ link_to_route('servers.edit', 'Edit', array($server->id), array('class' => 'btn btn-info')) }}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
