/**
 * Zentropy javascript core
 */

// Add String.trim() method
String.prototype.trim = function(){
	return this.replace(/\s+$/, '').replace(/^\s+/, '');
}

// Add Array.indexOf() method
if (!Array.prototype.indexOf) {
  Array.prototype.indexOf = function (obj, fromIndex) {
    if (fromIndex == null) {
      fromIndex = 0;
    } else if (fromIndex < 0) {
      fromIndex = Math.max(0, this.length + fromIndex);
    }
    for (var i = fromIndex, j = this.length; i < j; i++) {
      if (this[i] === obj){
        return i;
      }
    }
    return -1;
  };
}

// jQuery Browser Detect Tweak For IE7
jQuery.browser.version = jQuery.browser.msie && parseInt(jQuery.browser.version) == 6 && window["XMLHttpRequest"] ? "7.0" : jQuery.browser.version;

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

/**
 * Image handling functions
 */
Zentropy.image = { _cache : [] };

// preload images
Zentropy.image.preload = function(){
  for(var i = arguments.length; i--;){
    var cacheImage = document.createElement('img');
    cacheImage.src = arguments[i];
    Zentropy.image._cache.push(cacheImage);
  }
}

// remove no-js class from body so we know js is enabled when styling
Drupal.behaviors.zentropy_jsflag = function() {
  $('html').removeClass('no-js');
}
