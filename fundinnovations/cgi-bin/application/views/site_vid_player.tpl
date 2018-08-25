<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player"  width="590" height="350">

<param name="movie" value="{$baseurl}uploadify/Mediaplayer50.swf" />
<param name="allowfullscreen" value="true" />
<param name="allowscriptaccess" value="always" />
<param name="wmode" value="transparent">
<param name="flashvars" value="file={$baseurl}video/{$videolink}&autostart=true" />
<embed type="application/x-shockwave-flash"
id="player2"
name="player2"
src="{$baseurl}uploadify/Mediaplayer50.swf" 
width="600" height="350"
allowscriptaccess="always"
allowfullscreen="true"
wmode="transparent"
flashvars="file={$baseurl}video/{$videolink}&autostart=true"/>
</object>