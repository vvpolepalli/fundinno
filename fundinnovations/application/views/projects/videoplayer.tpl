{if $videotype eq 1}

 <!--[if lt IE 9]> 
{literal} 
<script type="text/javascript">
$(function() {
		  flowplayer("project_player", "{/literal}{$baseurl}{literal}video/flowplayer/flowplayer-3.2.15.swf",{
      clip:  {
          autoPlay: true,
          autoBuffering: true
      }
 	 });
	});
</script>
{/literal}

    <a href="{$baseurl}uploads/projects/videos/original/{$videolink}" style="display:block;width:590px;height:350px"  id="project_player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
  <link rel="stylesheet" type="text/css" href="{$baseurl}video/video_js/video-js.css">
 {literal} 
<script type="text/javascript">
$(function() {
	 $.getScript('{/literal}{$baseurl}{literal}video/video_js/video.js', function() {
	 });
	});
</script>
{/literal}	
 <video id="example_video_1" autoplay class="video-js vjs-default-skin" controls preload="none" width="590" height="350"
      poster=""
      data-setup="{}">
    <source src="{$baseurl}uploads/projects/videos/original/{$videolink}" type='video/flv' />
    <track kind="captions" src="captions.vtt" srclang="en" label="English" />
  </video> <![endif]>
  
<!--<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player"  width="590" height="350">

<param name="movie" value="{$baseurl}uploadify/Mediaplayer50.swf" />
<param name="allowfullscreen" value="true" />
<param name="allowscriptaccess" value="always" />
<param name="wmode" value="transparent">
<param name="flashvars" value="file={$baseurl}uploads/projects/videos/original/{$videolink}&autostart=true" />
<embed type="application/x-shockwave-flash"
id="player2"
name="player2"
src="{$baseurl}/uploadify/Mediaplayer50.swf" 
width="590" height="350"
allowscriptaccess="always"
allowfullscreen="true"
wmode="transparent"
flashvars="file={$baseurl}uploads/projects/videos/original/{$videolink}&autostart=true"/>
</object>-->
{else if $videotype eq 0}
        
<object width="590" height="350">
<param name="movie" value=="http://www.youtube.com/v/{$videolink}"></param>
<param name="allowFullScreen" value="true"></param>
<param name="autoplay" value="1"></param>
<param name="allowscriptaccess" value="always"></param>
<param name="wmode" value="transparent">
<embed src="http://www.youtube.com/v/{$videolink}?version=3&autoplay=1&amp;rel=0" 
type="application/x-shockwave-flash" allowscriptaccess="always"
allowfullscreen="true"  wmode="transparent"    
width="590" height="350" >
</embed>
</object>
{else if $videotype eq 2}
      
        
<object width="590" height="350">
<param name="movie" value=="http://vimeo.com/{$videolink}"></param>
<param name="allowFullScreen" value="true"></param>
<param name="autoplay" value="1"></param>
<param name="allowscriptaccess" value="always"></param>
<param name="wmode" value="transparent">
<embed src="http://vimeo.com/moogaloop.swf?clip_id={$videolink}&amp;server=vimeo.com&amp;color=00adef&amp;fullscreen=1&autoplay=1&start=1" 
type="application/x-shockwave-flash" allowscriptaccess="always"
allowfullscreen="true"  wmode="transparent"    
width="590" height="350" >
</embed>
</object>
 {/if}