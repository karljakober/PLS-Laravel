@extends('layouts.master')
    @section('content')
    <div class="main container inverted">
        <div class="ui fixed page grid">
              <div class="sixteen wide column">
                <h1>Login</h1>
                {{ Form::open(array('url' => 'login')) }}
                <div class="ui form segment inverted">
                  <div class="required field">
                    {{ Form::label('email', 'Email Address') }}
                    <div class="ui left labeled icon input">
                      {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email')) }}
                      <i class="user icon"></i>
                    </div>
                  </div>
                  <div class="required field">
                    {{ Form::label('password', 'Password') }}
                    <div class="ui left labeled icon input">
                      {{ Form::password('password') }}
                      <i class="lock icon"></i>
                    </div>
                  </div>
                  <div class="ui error message">
                    <div class="header">We noticed some issues</div>

                  </div>
                  @if(!$errors->isEmpty())
                  <div class="ui posterror message">
                    <div class="header">We noticed some issues</div>
                    <ul class="list">
                        <li>{{ $errors->first('email'); }}</li>
                        <li>{{ $errors->first('password') }}</li>
                    </ul>
                  </div>
                  @endif
                  {{ Form::submit('Log In!', ['class' => 'ui submit button']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @stop
