{if $videotype eq 1}
<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player"  width="400" height="350">

<param name="movie" value="{$baseurl}/uploadify/Mediaplayer50.swf" />
<param name="allowfullscreen" value="true" />
<param name="allowscriptaccess" value="always" />
<param name="wmode" value="transparent">
<param name="flashvars" value="file={$baseurl}uploads/projects/videos/original/{$videolink}&autostart=true" />
<embed type="application/x-shockwave-flash"
id="player2"
name="player2"
src="{$baseurl}/uploadify/Mediaplayer50.swf" 
width="400" height="350"
allowscriptaccess="always"
allowfullscreen="true"
wmode="transparent"
flashvars="file={$baseurl}uploads/projects/videos/original/{$videolink}&autostart=true"/>
</object>
{else if $videotype eq 0}
        
<object width="400" height="350">
<param name="movie" value=="http://www.youtube.com/v/{$videolink}"></param>
<param name="allowFullScreen" value="true"></param>
<param name="autoplay" value="1"></param>
<param name="allowscriptaccess" value="always"></param>
<param name="wmode" value="transparent">
<embed src="http://www.youtube.com/v/{$videolink}?version=3&autoplay=1&amp;rel=0" 
type="application/x-shockwave-flash" allowscriptaccess="always"
allowfullscreen="true"  wmode="transparent"    
width="400" height="350" >
</embed>
</object>
{else if $videotype eq 2}
      
        
<object width="400" height="350">
<param name="movie" value=="http://vimeo.com/{$videolink}"></param>
<param name="allowFullScreen" value="true"></param>
<param name="autoplay" value="1"></param>
<param name="allowscriptaccess" value="always"></param>
<param name="wmode" value="transparent">
<embed src="http://vimeo.com/moogaloop.swf?clip_id={$videolink}&amp;server=vimeo.com&amp;color=00adef&amp;fullscreen=1&autoplay=1&start=1" 
type="application/x-shockwave-flash" allowscriptaccess="always"
allowfullscreen="true"  wmode="transparent"    
width="400" height="350" >
</embed>
</object>
 {/if}