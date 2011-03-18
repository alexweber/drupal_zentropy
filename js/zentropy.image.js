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
