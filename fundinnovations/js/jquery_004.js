;(function( $ ){
	
	
	$().mousemove(
		function(e)
		{
			$().data('mousePosition', e);
		}
	);
	$().mousemove();
	
	jQuery.fn.mouseFollow = function(bSwitch)
	{	
	
		if(bSwitch)
		{
			this.addClass('mouse-follow');
			
			this.each(
				function(i)
				{
					
					$(this).data('followFunction', 
								 function()
								 {
									var t = $().data('mousePosition');
									var tx = t.clientX;
									var ty = t.clientY;
									
									var p = $(this).position();
									var px = p.left;
									var py = p.top;
									
									var x = px + ((tx - px) / 30);
									var y = py + ((ty - py) / 30);
									$(this).css('left', x);
									$(this).css('top', y);
								 });
					
					$(this).mouseenter(function() 
									   { 
										    $(this).stopTime('followInterval');
									   });
					
					$(this).mouseleave(function()
									   {
									   		$(this).everyTime(1, 'followInterval', $(this).data('followFunction'));
									   });
					$(this).everyTime(1, 'followInterval', $(this).data('followFunction'));
					 // end everytime
				} // end each function
			); // end each
		}	
		else
		{
			this.removeClass('mouse-follow');
			
			this.each(
				function()
				{
					$(this).mouseMove(null);
					$(this).stopTime('followInterval');	
				}
			);
		}
		
	}
	
	
	
	

})( jQuery );
;(function( $ ){
	
	
	
	// layout
	jQuery.fn.layout = function()
	{
		var w = 0;
		this.find('img').each
		(
			function()
			{
				$(this).css('position', 'absolute');
				$(this).css('top', '0');
				$(this).css('width', 'auto');
				$(this).css('height', 'auto');
				$(this).css('z-index', '0');
				var ih = $(this).height();
				var iw = $(this).width();
				$(this).css('height', '100%');
				var ratio = $(this).height() / ih;
				$(this).css('width', Math.round(iw * ratio) + 'px');
				$(this).css('left', Math.round(w) + 'px');
				w += Math.round($(this).width()+4);
			}
		);
		
		var ul = this.find('ul');
		
		ul.width(w);
		
		this.imageIndex(this.imageIndex(), false);
		
	}
	
	
	
	// fwd
	jQuery.fn.fwd = function()
	{
		this.imageIndex(this.imageIndex() + 1);
	}
	
	
	
	
	// rev
	jQuery.fn.rev = function()
	{
		this.imageIndex(this.imageIndex() - 1);
	}
	
	
	
	
	
	//imageIndex
	jQuery.fn.imageIndex = function(n, animate)
	{
		if(n != undefined)
		{
			// set imageIndex property
			n = Math.max(0, n);
			n = Math.min(this.find('img').length - 1, n);
			this.attr('imageIndex', n);
			
			// enable or disable rev/fwd buttons
			if(n == 0) { this.find('a.rev').addClass('disabled'); } else { this.find('a.rev').removeClass('disabled'); }
			if(n == this.find('img').length - 1) { this.find('a.fwd').addClass('disabled'); } else { this.find('a.fwd').removeClass('disabled'); }
				
			// scroll to the image
			var img = this.find('img:eq(' + n + ')');
			var imgx = img.position().left;
			var imgw = img.width();
			var winw = this.width();
			var x = -imgx + (winw / 2) - (imgw / 2);
			x = Math.max(x, winw - this.find('ul').width());
			x = Math.min(x, 0);
			x = Math.round(x);
			if(animate != false)
			{
				this.find('ul').stop();
				this.find('ul').animate({'left':x}, 800, 'easeOutQuad');
			}
			else
			{
				this.find('ul').css('left',x);
			}
			
		}
		
		// find index of selected image (there must be a better way to do this!)
		if(this.attr('imageIndex') == undefined) { this.attr('imageIndex', 0); }
		return parseInt(this.attr('imageIndex'));
	}
	
	
	
	
	//init
	jQuery.fn.imageScroller = function()
	{	
		// initialise
		this.addClass('image-scroller-initialised');
		
		
		// do layout
		this.layout();	
		$(window).bind('resize', function(){ $('.image-scroller-initialised').layout(); } );
		$('.image-scroller-initialised img').load( function(){ $('.image-scroller-initialised').layout(); } );
		
		
		// click navigation
		this.append('<div class="revfwd"><a class="rev"></a><a class="fwd"></a></div>');
		//this.find('.revfwd').mouseFollow(true);
		
		//this.mouseleave( function() { this.find('.revfwd').mouseFollow(false); } );
		//this.mouseleave( function() { this.find('.revfwd').mouseFollow(true); } );
		
		this.find('a.rev').click
		( 
			function()
			{ 
				$(this).parent().parent().rev();
			} 
		);
		this.find('a.fwd').click
		( 
			function()
			{ 
				$(this).parent().parent().fwd();
			} 
		);
		
	}
	
	
	
	

})( jQuery );


// backgrounds --------------------------------------------------------------//

var Backgrounds = {};

Backgrounds.init = function()
{
	
	$('body').each
	(  
		function()
		{
			var imgsrc = $(this).css('background-image');
			if(imgsrc != 'none')
			{
				imgsrc = imgsrc.slice( imgsrc.indexOf('(') + 1 , -1);
				$(this).css('background-image', 'none');
				$(this).prepend('<div class="bg"><img alt="" /></div>');
				$(this).find('div.bg img').attr('src', imgsrc.split('"').join(''));
			}
		}
	);
	Backgrounds.resizeHandler();
	$(window).resize(Backgrounds.resizeHandler);
	$('div.bg img').load(Backgrounds.resizeHandler);
}

Backgrounds.resizeHandler = function()
{	
	var w = $(window).width();
	var h = $(window).height();
	
	$('div.bg img').each
	(  
		function()
		{	
			var wr = w / $(this).width();
			var hr = h / $(this).height();
			var r = Math.max(wr, hr);
			var imgw = Math.round($(this).width() * r);
			var imgh = Math.round($(this).height() * r);
			
			$(this).width( imgw );
			$(this).height(  imgh );
			
			var l = Math.round((w/2) - (imgw/2));
			$(this).css('margin-left', l+'px');
		}
	);
}

// image scroller -----------------------------------------------------------//

var ImageScroller = {};
ImageScroller.init = function()
{
	if($('div.image-scroller').length)
	{
		$('div.image-scroller').imageScroller();
		ImageScroller.resizeHandler();
		$(window).resize(ImageScroller.resizeHandler);
	}
}	
ImageScroller.resizeHandler = function()
{
	$('div.image-scroller').height( $(window).height() - $('#header').height() );
	$('div.image-scroller').layout();
}	






// image preloading 
var ImagePreload = {}
ImagePreload.preloadImages = function()
{
  for(var i = 0; i<arguments.length; i++)
  {
    jQuery("<img>").attr("src", arguments[i]);
  }
}




// init ---------------------------------------------------------------------//

function init()
{
	Backgrounds.init();
	ImageScroller.init();
	//RunwayVid.init();
}	
$(document).ready(init);