@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Tournament</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'tournaments.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('lan_id', 'Lan_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'lan_id', Input::old('lan_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('start_time', 'Start_time:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('start_time', Input::old('start_time'), array('class'=>'form-control', 'placeholder'=>'Start_time')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('end_time', 'End_time:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('end_time', Input::old('end_time'), array('class'=>'form-control', 'placeholder'=>'End_time')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('type', 'Type:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('type', Input::old('type'), array('class'=>'form-control', 'placeholder'=>'Type')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('allow_teams', 'Allow_teams:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('allow_teams') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('assigned_admin', 'Assigned_admin:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('assigned_admin', Input::old('assigned_admin'), array('class'=>'form-control', 'placeholder'=>'Assigned_admin')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


