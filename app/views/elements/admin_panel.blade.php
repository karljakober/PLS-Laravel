<div class="ui large vertical inverted labeled icon right sidebar menu" id="adminmenu">
  <a class="hide item">
    <i class="close icon"></i> Close Menu
  </a>
  <div class="ui one column grid">
    <div class="column">
        <div class="ui inverted relaxed divided list">
            @foreach ($adminmenu as $item => $value)
            <div class="item">
              <div class="content">
                <h2 class="nogap centerheader"><a href="{{ URL::route('admin.' . $value . '.index') }}">{{ $item }}</a></h2>
              </div>
            </div>
            @endforeach
        </div>
    </div>
  </div>
</div>
