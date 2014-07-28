  <div class="ui large fixed transparent inverted main menu" style="display: block;">
    <div class="container">
      <a class="title active item" href="{{ URL::to('/') }}">
        <b>P<i class="icon crosshairs orange logo"></i>NG</b>
      </a>
      <a class="item" href="{{ URL::to('tournaments') }}">
        <i class="trophy icon"></i> Tournaments
      </a>
      <a class="item" href="{{ URL::to('servers') }}">
        <i class="gamepad icon"></i> Servers
      </a>
      <a class="item" href="{{ URL::to('sponsors') }}">
        <i class="dollar icon"></i> Sponsors
      </a>
      <a class="item" href="{{ URL::to('seating') }}">
        <i class="users icon"></i> Seating Chart
      </a>
      <div class="right menu">
        @if(Auth::check())
        <div class="ui dropdown item">
          {{ Auth::user()->username }} <i class="dropdown icon"></i>
          <div class="menu ui transition hidden">
            <a class="item" href="/user/{{ Auth::user()->username }}">View Profile</a>
            <a class="item" href="{{ URL::to('settings') }}">Settings</a>
            <a class="item" href="{{ URL::to('logout') }}">Log Out</a>
          </div>
        </div>
        @else
        <a class="item" href="{{ URL::to('register') }}">
            <div class="ui orange button">Sign Up</div>
        </a>
        <a class="item" href="{{ URL::to('login') }}">
            <div class="ui orange button">Log In</div>
        </a>
        @endif
      </div>
    </div>
  </div>
@if(Auth::check())
<div class="ui orange huge launch right attached button">
  <i class="icon list layout"></i>
  <span class="text">Chat</span>
</div>
@endif
