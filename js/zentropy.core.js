/**
 * Zentropy javascript core
 */

String.prototype.trim = function(){
	return this.replace(/\s+$/, '').replace(/^\s+/, '');
}

if (!Array.prototype.indexOf) {
  Array.prototype.indexOf = function (obj, fromIndex) {
    if (fromIndex == null) {
      fromIndex = 0;
    } else if (fromIndex < 0) {
      fromIndex = Math.max(0, this.length + fromIndex);
    }
    for (var i = fromIndex, j = this.length; i < j; ++i) {
      if (this[i] === obj){
        return i;
      }
    }
    return -1;
  };
}

// jQuery Browser Detect Tweak For IE7
jQuery.browser.version = jQuery.browser.msie && parseInt(jQuery.browser.version) == 6 && window["XMLHttpRequest"]
  ? "7.0"
  : jQuery.browser.version;

// Console.log wrapper to avoid errors when firebug is not present
// usage: log('inside coolFunc',this,arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console){
    console.log( Array.prototype.slice.call(arguments) );
  }
};

// init object
var Zentropy = Zentropy || {};

Drupal.behaviors.zentropy_jsinit = function() {
  // add ie sniffer class for IE 8 and below
  if ($.browser.msie && $.browser.version <= 8) {
    $('html').addClass('ie').addClass('ie' + $.browser.version.substr(0, 1));
  }
}
