@extends('layouts.scaffold')

@section('main')

<h1>All News</h1>

<p>{{ link_to_route('news.create', 'Add New News', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($news->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Content</th>
				<th>Author_id</th>
				<th>Title</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($news as $news)
				<tr>
					<td>{{{ $news->content }}}</td>
					<td>{{{ $news->author_id }}}</td>
					<td>{{{ $news->title }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('news.destroy', $news->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('news.edit', 'Edit', array($news->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no news
@endif

@stop
