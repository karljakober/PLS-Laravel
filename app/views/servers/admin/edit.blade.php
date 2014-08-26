@extends('layouts.master')

@section('content')

<div class="main container inverted">
    <div class="ui fixed page grid">
          <div class="sixteen wide column">
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        <h1>Edit Server</h1>

                        @if ($errors->any())
                        	<div class="alert alert-danger">
                        	    <ul>
                                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                                </ul>
                        	</div>
                        @endif
                    </div>
                </div>

                {{ Form::model($server, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('servers.update', $server->id))) }}

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
                            {{ Form::label('address', 'Address:', array('class'=>'col-md-2 control-label')) }}
                            <div class="col-sm-10">
                              {{ Form::text('address', Input::old('address'), array('class'=>'form-control', 'placeholder'=>'Address')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('user_id', 'User_id:', array('class'=>'col-md-2 control-label')) }}
                            <div class="col-sm-10">
                              {{ Form::input('number', 'user_id', Input::old('user_id'), array('class'=>'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('additional_info', 'Additional_info:', array('class'=>'col-md-2 control-label')) }}
                            <div class="col-sm-10">
                              {{ Form::text('additional_info', Input::old('additional_info'), array('class'=>'form-control', 'placeholder'=>'Additional_info')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('official', 'Official:', array('class'=>'col-md-2 control-label')) }}
                            <div class="col-sm-10">
                              {{ Form::checkbox('official') }}
                            </div>
                        </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-10">
                      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
                      {{ link_to_route('servers.show', 'Cancel', $server->id, array('class' => 'btn btn-lg btn-default')) }}
                    </div>
                </div>

                {{ Form::close() }}
        </div>
    </div>
</div>

@stop
