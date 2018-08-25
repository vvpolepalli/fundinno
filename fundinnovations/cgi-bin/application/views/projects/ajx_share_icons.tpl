 {assign var="share_contant" value=$project_det.short_description|stripslashes}
<div class="addthis_toolbox " id="add_this"  addthis:url="{$promote_link}"
        addthis:title="{$project_det.project_title}"
        addthis:description="{$share_contant}">
            <div class="custom_images">
              <ul class="socialShare socialShareblck" {if $promote_link eq ''}  style="display:none;" {/if}>
                <li><a class="addthis_button_facebook fb show_soc"  style="display:block;cursor:pointer"  ><img src="" alt="fb" /></a></li>
                <li><a class="addthis_button_twitter twit show_soc" style="display:block;cursor:pointer"  ><img src="" alt="twit" /></a></li>
                <li><a class="addthis_button_linkedin in show_soc"  style="display:block;cursor:pointer" ><img src="" alt="in" /></a></li>
                <li><a class="email show_soc"  style="display:block;cursor:pointer"  onclick="open_mail_pop('{$promote_link}');"><img src="" alt="email" /></a></li>
                
              </ul>
            </div>
          </div> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ead062198b3ae6"></script>
      {literal}     <script type="text/javascript">
	 $(document).ready(function() {
	  $.getScript('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ead062198b3ae6', function() {
	  });
 });



</script>{/literal} 