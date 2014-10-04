@section('pageTitle', 'Server List')

@extends('layouts.master')

@section('content')

@if ($officialservers->count())
<div class="ui segment">
	<div class="container">
		<div class="introduction">
			<h1 class="ui header inverted">
				Official Servers
			</h1>
		</div>
	</div>
</div>
<div class="main container">
	<div class="ui grid">
		<div class="sixteen wide column">
			<table class="ui table inverted">
				<thead>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Additional Info</th>
						@if (Auth::Check() && Auth::user()->admin)
						<th>&nbsp;</th>
						@endif
					</tr>
				</thead>

				<tbody>
					@foreach ($officialservers as $server)
						<tr>
							<td>{{{ $server->name }}}</td>
							<td>{{{ $server->address }}}</td>
							<td>{{{ $server->additional_info }}}</td>
							@if (Auth::Check() && Auth::user()->admin)
							<td>
								{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('servers.destroy', $server->id))) }}
								{{ Form::submit('Delete', array('class' => 'ui red button')) }}
								{{ Form::close() }}
								{{ link_to_route('admin.servers.edit', 'Edit', array($server->id), array('class' => 'ui orange button')) }}
							</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
			@if (Auth::Check() && Auth::user()->admin)
			<p>{{ link_to_route('admin.servers.create', 'Add an Official Server', null, array('class' => 'ui orange button')) }}</p>
			@endif
		</div>
	</div>
</div>
@endif
<div class="ui segment">
	<div class="container">
		<div class="introduction">
			<h1 class="ui header inverted">
				User Hosted Servers
			</h1>
		</div>
	</div>
</div>
<div class="main container">
	<div class="ui grid">
		<div class="sixteen wide column">
			@if ($userservers->count())
				<table class="ui table inverted">
					<thead>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>Additional Info</th>
							<th>&nbsp;</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($userservers as $server)
							<tr>
								<td>{{{ $server->name }}}</td>
								<td>{{{ $server->address }}}</td>
								<td>{{{ $server->additional_info }}}</td>
								<td>
									{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('servers.destroy', $server->id))) }}
									{{ Form::submit('Delete', array('class' => 'ui red button')) }}
									{{ Form::close() }}
									{{ link_to_route('servers.edit', 'Edit', array($server->id), array('class' => 'ui orange button')) }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<p>So far, there are no User Hosted servers!</p>
			@endif

			@if (Auth::Check())
				<p>{{ link_to_route('servers.create', 'Add a Server', null, array('class' => 'ui orange button')) }}</p>
			@else
				<p>You need to {{ link_to_route('servers.create', 'Log In') }} to list a hosted server</p>
			@endif
		</div>
	</div>
</div>

@stop
