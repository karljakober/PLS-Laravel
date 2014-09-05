@section('pageTitle', 'Admin - Edit News')

@extends('layouts.master')

@section('content')

{{ HTML::style('css/jquery-te-1.4.0.css') }}
{{ HTML::script('js/jquery-te-1.4.0.min.js') }}

{{ HTML::style('css/select2.css') }}
{{ HTML::script('js/select2.js') }}

<script type="text/javascript">
    $(function() {
        $("#content").jqte();
        $("#author_id").select2();
    });
</script>


<div class="ui segment">
    <div class="container">
        <div class="introduction">
            <h1 class="ui header inverted">
                Create News : Admin
            </h1>
        </div>
    </div>
</div>
<div class="main container inverted">
    <div class="ui fixed page grid">
        <div class="sixteen wide column">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            {{ Form::model($news, array('class' => 'ui form', 'method' => 'PATCH', 'route' => array('admin.news.update', $news->id))) }}

                    <div class="field">
                        <h3>{{ Form::label('title', 'Title') }}</h3>
                        {{ Form::text('title', Input::old('title'), array('placeholder'=>'Title', 'class' => 'opaque')) }}
                    </div>

                    <div class="field">
                        <h3>{{ Form::label('content', 'Content') }}</h3>
                        {{ Form::textarea('content', Input::old('content')) }}
                    </div>

                    <div class="field">
                        <h3>{{ Form::label('author_id', 'Author - (You can search by either username or email.)') }}</h3>
                        {{ Form::select('author_id', $user_selector ,Input::old('author_id'), array('class'=>'opaque')) }}
                    </div>

                    <div class="field">
                        {{ Form::submit('Update', array('class' => 'ui orange submit button')) }}
                        {{ link_to_route('admin.news.show', 'Cancel', $news->id, array('class' => 'ui red button')) }}
                    </div>

            {{ Form::close() }}

        </div>
    </div>
</div>

@stop
