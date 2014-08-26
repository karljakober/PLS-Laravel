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
      $peek             = $('.peekmenu'),
      $peekItem         = $peek.children('.menu').children('a.item'),
      $peekSubItem      = $peek.find('.item .menu .item'),
      $pageTabMenu      = $('body > .tab.segment .tabular.menu'),
      $pageTabs         = $('body > .tab.segment .menu .item'),
      $menu             = $('#menu'),
      $adminmenu        = $('#adminmenu'),
      $hideMenu         = $('#menu .hide.item'),
      $adminHideMenu    = $('#adminmenu .hide.item'),
      $sidebarButton    = $('.attached.launch.button'),
      $adminSidebarButton = $('.attached.launchadmin.button'),
      $menuPopup        = $('.ui.main.menu .popup.item'),
      $menuDropdown     = $('.ui.main.menu .dropdown'),
      $waypoints        = $peek.closest('.tab, .container').find('h2').first().siblings('h2').addBack(),
      // alias
      handler
    ;

  // event handlers
     handler = {
        makeStickyColumns: function() {
          var
            $visibleStuck = $(this).find('.fixed.column .image, .fixed.column .content'),
            isInitialized = ($visibleStuck.parent('.sticky-wrapper').size() !== 0)
          ;
          if(!isInitialized) {
            $visibleStuck
              .waypoint('sticky', {
                offset     : 65,
                stuckClass : 'fixed'
              })
            ;
          }
          // apparently this doesnt refresh on first hit
          $.waypoints('refresh');
          $.waypoints('refresh');
        },
        movePeek: function() {
          if( $('.stuck .peekmenu').size() > 0 ) {
            $('.peekmenu')
              .toggleClass('pushed')
            ;
          }
          else {
            $('.peekmenu')
              .removeClass('pushed')
            ;
          }
        },
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
        adminmenu: {
          click: function() {
              $(this).toggle(function () {
                    $(this).css({right: "155px"});
                }, function () {
                    $(this).css({right: "0px"});
                });
          },
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
       peek: function() {
      var
        $body     = $('html, body'),
        $header   = $(this),
        $menu     = $header.parent(),
        $group    = $menu.children(),
        $headers  = $group.add( $group.find('.menu .item') ),
        $waypoint = $waypoints.eq( $group.index( $header ) ),
        offset
      ;
      offset    = $waypoint.offset().top - 70;
      if(!$header.hasClass('active') ) {
        $menu
          .addClass('animating')
        ;
        $headers
          .removeClass('active')
        ;
        $body
          .stop()
          .one('scroll', function() {
            $body.stop();
          })
          .animate({
            scrollTop: offset
          }, 500)
          .promise()
            .done(function() {
              $menu
                .removeClass('animating')
              ;
              $headers
                .removeClass('active')
              ;
              $header
                .addClass('active')
              ;
              $waypoint
                .css('color', $header.css('border-right-color'))
              ;
              $waypoints
                .removeAttr('style')
              ;
            })
        ;
      }
    },

    peekSub: function() {
      var
        $body           = $('html, body'),
        $subHeader      = $(this),
        $header         = $subHeader.parents('.item'),
        $menu           = $header.parent(),
        $subHeaderGroup = $header.find('.item'),
        $headerGroup    = $menu.children(),
        $waypoint       = $('h2').eq( $headerGroup.index( $header ) ),
        $subWaypoint    = $waypoint.nextAll('h3').eq( $subHeaderGroup.index($subHeader) ),
        offset          = $subWaypoint.offset().top - 80
      ;
      $menu
        .addClass('animating')
      ;
      $headerGroup
        .removeClass('active')
      ;
      $subHeaderGroup
        .removeClass('active')
      ;
      $body
        .stop()
        .animate({
          scrollTop: offset
        }, 500, function() {
          $menu
            .removeClass('animating')
          ;
          $subHeader
            .addClass('active')
          ;
        })
        .one('scroll', function() {
          $body.stop();
        })
      ;
    },
  };
  if( $pageTabs.size() > 0 ) {
    $pageTabs
      .tab({
        onTabLoad : function() {
          $.proxy(handler.makeStickyColumns, this)();
          $peekItem.removeClass('active').first().addClass('active');
        }
      })
    ;
  }
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
  $adminSidebarButton
    .on('mouseenter', handler.adminmenu.mouseenter)
    .on('mouseleave', handler.adminmenu.mouseleave)
  ;
  $menu
    .sidebar('attach events', '.launch.button, .view-ui.button, .launch.item')
    .sidebar('attach events', $hideMenu, 'hide')
  ;
  $adminmenu
    .sidebar('attach events', '.launchadmin.button, .view-ui.button, .launchadmin.item')
    .sidebar('attach events', $adminHideMenu, 'hide')
  ;
  $waypoints
    .waypoint({
      continuous : false,
      offset     : 100,
      handler    : function(direction) {
        var
          index = (direction == 'down')
            ? $waypoints.index(this)
            : ($waypoints.index(this) - 1 >= 0)
              ? ($waypoints.index(this) - 1)
              : 0
        ;
        $peekItem
          .removeClass('active')
          .eq( index )
            .addClass('active')
        ;
      }
    })
  ;
  $('body')
    .waypoint({
      handler: function(direction) {
        if(direction == 'down') {
          if( !$('body').is(':animated') ) {
            $peekItem
              .removeClass('active')
              .eq( $peekItem.size() - 1 )
                .addClass('active')
            ;
          }
        }
      },
      offset: 'bottom-in-view'
     })
  ;
  $peek
    .waypoint('sticky', {
      offset     : 85,
      stuckClass : 'stuck'
    })
  ;

  $peekItem
    .on('click', handler.peek)
  ;
  $peekSubItem
    .on('click', handler.peekSub)
  ;
};


// attach ready event
$(document)
  .ready(semantic.ready)
;
