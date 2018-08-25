


$(document).ready(function(){

$(".preview").live('click',function(e){
			$videotype=$(this).attr("type");
			$videolink=$(this).attr('rel');
			alert($videotype+'  '+$videolink)
			e.preventDefault();
			$('html, body').animate({scrollTop:50}, 'fast');
			//Get the screen height and width
			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
			
			//Set heigth and width to mask to fill up the whole screen
			$('#mask').css({'width':maskWidth,'height':maskHeight});
			
			//transition effect		
			$('#mask').fadeIn(1000);	
			$('#mask').fadeTo("slow",0.8);	
			
			//Get the window height and width
			var winH = $(window).height();
			var winW = $(window).width();
			
			//Set the popup window to center
			id="#basic-modal-contentinitial";
			$(id).css('top',  150);
			$(id).css('left', winW/2-$(id).width()/2);
			var leftpadding=winW/2-$(id).width()/2;
			var rightpadding=leftpadding-70;
			
			$('.modalCloseImg').css('right',rightpadding);
			//transition effect
			$(id).fadeIn(2000);
			$('.modalCloseImg').show();
			var dealid=$(this).attr('rel');
			var playerurl=baseurl+'admin/videos/play_videos_in_admin';
			
			/*$(id).load(playerurl,{videolink:$videolink,videotype:$videotype},function(){
				
				$(".preview").hide();	
			})*/
			
			$.ajax({
			type: 'POST',
			url: playerurl,		
			data: 'videolink='+$videolink+'&videotype='+$videotype,
			success:function(msg)
			{
					$(id).html(msg);
					$(".preview").hide();	
			}
			});
			
		}) ;
});


//Method to close the popup
function close_popupwindow() 
{
$('#mask').hide();
$('.modalCloseImg').hide();
$('#basic-modal-contentinitial').empty('').hide();
$(".preview").show();	
}	
	