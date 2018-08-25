<!--<script type="text/javascript" src="{$baseurl}js/fancyBox/lib/jquery-1.9.0.min.js"></script>-->

<!--<script type="text/javascript" src="{$baseurl}js/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>-->

	<link rel="stylesheet" type="text/css" href="{$baseurl}js/fancyBox/source/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="{$baseurl}js/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />

	<link rel="stylesheet" type="text/css" href="{$baseurl}js/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />


	<!-- Add Media helper (this is optional) -->
   {literal} <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */
  $.getScript('{/literal}{$baseurl}{literal}js/fancyBox/lib/jquery-1.9.0.min.js', function() {
	   $.getScript('{/literal}{$baseurl}{literal}js/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js', function() {
	    $.getScript('{/literal}{$baseurl}{literal}js/fancyBox/source/jquery.fancybox.js?v=2.1.4', function() {
			 $.getScript('{/literal}{$baseurl}{literal}js/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7', function() {
			$('.fancybox').fancybox();
			});
			});
			});
			});
			

		});
		</script>{/literal}
    
<section class="innerMidWrap">
	<ul class="innerMidTab">
		<li><a href="{$baseurl}archive_projects/project_details/{$proj_id}">Project Details</a></li>
		<li><a href="{$baseurl}archive_projects/project_backers/{$proj_id}">Supporters <span class="value">({$project_det_counts.backers_cnt})</span></a></li>
		<li><a href="{$baseurl}archive_projects/project_videos/{$proj_id}">Videos <span class="value">({$project_det_counts.videos_cnt})</span></a></li>
		<li><a class="active" href="{$baseurl}archive_projects/project_images/{$proj_id}">Images <span class="value">({$project_det_counts.images_cnt})</span> <span class="arrowtabs arrowvideo"></span></a></li>
		<li><a href="{$baseurl}archive_projects/project_comments/{$proj_id}">Comments <span class="value">({$project_det_counts.comments_cnt})</span> </a></li>
		{if $project_status.project_status eq 'success'}
    <li><a href="{$baseurl}archive_projects/project_updates/{$proj_id}">Project Updates </a></li>{/if}
		 {if $project_status.user_id eq $user_id && $user_id neq ''}
		<li><a href="{$baseurl}archive_projects/project_admin_commets/{$proj_id}">Admin Comments<span class="value">({$project_det_counts.admin_comments_cnt})</span></a></li>{/if}
	</ul>
	<div class="clear"></div>
	<div class="innerMidContent">
		<div class="discovervideo">
			<h5>Image</h5>
                        {if $proj_photos|@count gt 0 || $project_main_img.project_image neq ''}
			<ul>
            {assign var="cnt" value="1"}
            {if $project_main_img.project_image neq ''}
           <li {if $cnt % 3 eq 0} class="last" {/if} >  
            <a class="fancybox" href="{$baseurl}uploads/projects/images/gallary/{$project_main_img.project_image}" data-fancybox-group="gallery" title=""> <img src="{$baseurl}uploads/projects/images/medium/{$project_main_img.project_image}" alt="project images"></a></li>
          {assign var="cnt" value=$cnt+1}
          {/if}
          {foreach from=$proj_photos item=photo key=k}
          <li {if $cnt % 3 eq 0} class="last" {/if} ><!--<a href="{$baseurl}uploads/projects/images/medium/{$photo.image}" rel="gallery" title="3"  class="pirobox_gall">-->
          <table cellpadding="0" cellpadding="0" width="100%" border="0" height="190">
          <tr><td align="center" valign="middle">
           <a class="fancybox" href="{$baseurl}uploads/projects/images/gallary/{$photo.image}" data-fancybox-group="gallery" title=""> <img class="project_imgs" src="{$baseurl}uploads/projects/images/medium/{$photo.image}" alt="project images"></a>
           <div class="vCaption"><div id="captnBlk_{$photo.id}"><span id="captn{$photo.id}">{$photo.image_title}</span></div></div>
           </td></tr></table>
           </li>
          {assign var="cnt" value=$cnt+1}
         {/foreach}
                       
			</ul> {else}
         <div class="noDataFound">No Images.</div>
         {/if}
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section>
