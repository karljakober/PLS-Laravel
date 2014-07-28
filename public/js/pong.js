// namespace
window.semantic = {
  handler: {}
};

// Allow for console.log to not break IE
if (typeof window.console == "undefined" || typeof window.console.log == "undefined") {
  window.console = {
    log  : function() {},
    info : function(){},
    warn : function(){}
  };
}
if(typeof window.console.group == 'undefined' || typeof window.console.groupEnd == 'undefined' || typeof window.console.groupCollapsed == 'undefined') {
  window.console.group = function(){};
  window.console.groupEnd = function(){};
  window.console.groupCollapsed = function(){};
}
if(typeof window.console.markTimeline == 'undefined') {
  window.console.markTimeline = function(){};
}
window.console.clear = function(){};

// ready event
semantic.ready = function() {

    var
      $menu             = $('#menu'),
      $hideMenu         = $('#menu .hide.item'),
      $sidebarButton    = $('.attached.launch.button'),
      $menuPopup        = $('.ui.main.menu .popup.item'),
      $menuDropdown     = $('.ui.main.menu .dropdown'),

      // alias
      handler
    ;

  // event handlers
  handler = {
      menu: {
          mouseenter: function() {
            $(this)
              .stop()
              .animate({
                width: '155px'
              }, 300, function() {
                $(this).find('.text').show();
              })
            ;
          },
          mouseleave: function(event) {
            $(this).find('.text').hide();
            $(this)
              .stop()
              .animate({
                width: '70px'
              }, 300)
            ;
          }
      },
  };

  $menuPopup
    .popup({
      position   : 'bottom center',
      className: {
        popup: 'ui popup'
      }
    })
  ;
  $menuDropdown
    .dropdown({
      on         : 'hover',
      action     : 'nothing'
    })
  ;
  $sidebarButton
    .on('mouseenter', handler.menu.mouseenter)
    .on('mouseleave', handler.menu.mouseleave)
  ;
  $menu
    .sidebar('attach events', '.launch.button, .view-ui.button, .launch.item')
    .sidebar('attach events', $hideMenu, 'hide')
  ;
};


// attach ready event
$(document)
  .ready(semantic.ready)
;
