/**
 * Zentropy javascript Poll functions
 *
 * @author Alex Weber <alexweber.com.br>
 *
 * - Provides frequently used extensions to base javascript objects
 * - jQuery browser detection tweak
 * - Define functions used in events
 */

Zentropy.poll = {

  // bind poll events
  bind : function(){
	  var $target = $('.block-poll'),
			  $poll = $target.find('.poll');

	  $poll.find('.bar').each(function(){
		  var $bar = $(this).find('div'),
				  pct = bar.css('width');

		  $bar.attr('rel', pct).css('width','0%');
	  });

	  Zentropy.poll.animate($target);
  },
  
  // animate results
  animate : function($target){
	  var $bars = $target.find('.poll').find('.bar'),
		  colors = shuffle(['#c60202', '#397e0f', '#3eb2cf', '#f0bc17', '#f04f17', ' #0c687f']),
		  i = 0;
	
	  $bars.each(function(){
		  var $t = $(this).find('.foreground'),
			  w = parseInt($t.attr('rel').replace(/%/, ''));
		    w = Math.ceil(2.13 * w);
		    
		  $t.css('backgroundColor', colors[i++])
		   .animate({
			  width : w
		  }, 1600);
	  });
  },
  
  // intercept ajax poll
  intercept : function(pollWrapper, response){
	  var content,
		  $form = $('#poll-view-voting'),
		  $target = form.parents('.content');
	
	  // assume poll is either in a block or panel
	  if(!$target.length){
		  $target = $form.parents('.pane-content');
	  }
	
	  // manipulate content
	  $content = $(response.output);
	  $content.find('.bar').each(function(){
		  var $bar = $(this).find('div'),
			  pct = bar.css('width');
		  $bar.attr('rel', pct).css('width','0%');
	  });

	  // hide form & show new content
	  $form.fadeOut(function(){
		  $target.html($content);
		  Zentropy.poll.animate($target);
	  });
	
	  // cancel code execution
	  return;
  }

};
