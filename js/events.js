/**
 * Bind javascript events
 */

jQuery(document).ready(function($){

	/* Poll Animations */
	
	if($('.block-poll').length){
		var target = $('.block-poll'),
				poll = target.find('.poll');

		poll.find('.bar').each(function(){
			var bar = $(this).find('div'),
					pct = bar.css('width');
			bar.attr('rel', pct).css('width','0%');
		});
		
		animaPoll(target);
	}

  /* Rollover de imagens */

	if($('.rollover').length){
		$('.rollover img').hover(
	    function(){
        var t = $(this);
        t.attr('src', newsrc = t.attr('src').replace(/_off/, '_on'));
	    },
	    function(){
		    var t = $(this);
		    t.attr('src', newsrc = t.attr('src').replace(/_on/, '_off'));
	    }
		);
    }

    /* Tag Cloud */

  if($('.tagcloud').length){
    $(".tagcloud").tagcloud({type:"list", sizemin:10, sizemax: 20, colormax : "000", colormin : "000"});
    setTimeout(function(){
    	$(".tagcloud").css('wordWrap','break-word');
        $(".tagcloud li").css('marginLeft', '3px');
    }, 50);
  }
});
