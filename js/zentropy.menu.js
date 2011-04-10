/**
 * Zentropy Drop-down menus
 *
 * @author Alex Weber <alex@alexweber.com.br>
 * @copyright 2011 Alex Weber
 */

Zentropy.menu = function($selector, options) {

  // default settings
  var settings = {
    easing: 'easeOutQuint', // 'effectName', null
    speedIn: 100, // int (ms)
    speedOut: 100, // int (ms)
    effect: null, // 'slide', 'fade', null
    callback: null // function, null
  };

  // if an options object is passed, extend defaults
  if(options && typeof options == 'object'){
    $.extend(settings, options);
  }

  // recursively bind dropdown to all elements
  $selector.find('li').each(function() {
    var $t = $(this),
        $target = $t.find('ul.menu:first');

    Zentropy.menu($target, options);
    $t.hoverIntent(
      function() {
        $t.addClass('hover');

        if (settings.effect === 'slide') {
          $target.stop().slideDown(settings.speedIn, settings.easing, settings.callback);
        } else if (settings.effect === 'fade') {
          $target.stop().fadeIn(settings.speedIn, settings.easing, settings.callback);
        } else {
          $target.show();
          if (settings.callback) {
            settings.callback('show');
          }
        }
      },
      function() {
        $t.removeClass('hover');

        if (settings.effect === 'slide') {
          $target.stop().slideUp(settings.speedOut, settings.easing, callback);
        } else if (settings.effect === 'fade') {
          $target.stop().fade(settings.speedOut, settings.easing, callback);
        } else {
          $target.hide();
          if (settings.callback) {
            settings.callback('hide');
          }
        }
      }
    );
  });
}
