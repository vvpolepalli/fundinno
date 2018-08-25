<style>
.play_img {
	left: 120px;
	position: absolute;
	top: 60px;
}
</style>

{literal} 
<script type="text/javascript">
	var baseurl="{/literal}{$baseurl}{literal}";
	
 $(".preview").live('click',function(e){
			$videotype=$(this).attr("type");
			$videolink=$(this).attr('rel');
		//	var dealid=$(this).attr('rel');
			var videotitle=$(this).attr('title');
			$('#vid_captn').html(videotitle);
			$('#player_popup').show();
			openpPopup();
			var playerurl='{/literal}{$baseurl}{literal}archive_projects/play_videos';
			$('#pop_cntnt').load(playerurl,{videolink:$videolink,videotype:$videotype},function(){
				
				//$(".preview").hide();	
			})
		}) ;
		function video_stschk(vid){
                var baseurl = '{/literal}{$baseurl}{literal}';
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/video_sts_chk",
				data: {video:vid}, 
				success: function(msg){
                                        if(msg=='yes'){
					$('#notice_popup').show();openpPopup();
                                        $('#notice_pop_cntnt').html('Video uploading is in progess. Please refresh after some time and try to play.');
                                        }else{
                                            $('#notice_popup').show();openpPopup();
                                        $('#notice_pop_cntnt').html('Video uploading is completed. Page will reload now.');
                                            window.location.reload();   
                                        }
					}
				});
        }
		function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
	 closepPopup();
 	}
	</script> {/literal}
    <section class="innerMidWrap">
  <ul class="innerMidTab">
        <li><a href="{$baseurl}archive_projects/project_details/{$proj_id}" >Project Details</a></li>
        <li><a href="{$baseurl}archive_projects/project_backers/{$proj_id}">Supporters <span class="value">({$project_det_counts.backers_cnt})</span></a></li>
        <li><a class="active" href="{$baseurl}archive_projects/project_videos/{$proj_id}">Videos <span class="value">({$project_det_counts.videos_cnt})</span> <span class="arrowtabs arrowvideo"></span></a></li>
        <li><a  href="{$baseurl}archive_projects/project_images/{$proj_id}">Images <span class="value">({$project_det_counts.images_cnt})</span></a></li>
        <li><a href="{$baseurl}archive_projects/project_comments/{$proj_id}">Comments <span class="value">({$project_det_counts.comments_cnt})</span> </a></li>
        {if $project_status.project_status eq 'success'}
        <li><a href="{$baseurl}archive_projects/project_updates/{$proj_id}">Project Updates </a></li>
        {/if}
        {if $project_status.user_id eq $user_id && $user_id neq ''}
        <li><a href="{$baseurl}archive_projects/project_admin_commets/{$proj_id}">Admin Comments<span class="value">({$project_det_counts.admin_comments_cnt})</span></a></li>
        {/if}
      </ul>
  <div class="clear"></div>
  <div class="innerMidContent">
        <div class="discovervideo">
      <h5>Videos</h5>
      {if $proj_videos|@count gt 0}
      <ul>
            {assign var="cnt" value="1"}
            {foreach from=$proj_videos item=vid}
            <li id="vid_li_{$vid.id}" {if $cnt % 3 eq 0} class="last" {/if} >
          <div class="videoDetailsPane"> 
            {if $vid.type eq 1} 
                {if $vid.vid_sts eq 'yes'}
                <a rel="{$vid.video_link}" title="{$vid.video_title}" type="{$vid.type}" href="javascript:void(0);"  onclick="video_stschk('{$vid.video_link}')"   class="pirobox_gall1" >
                    <img class="play_img" src="{$baseurl}images/play_b.png">
          <img src="{$baseurl}uploads/projects/videos/original/{$vid.thumb_image}" style="width: 317px;height: 188px;" alt="project images" /> 
                    </a>
           {else}
                <a rel="{$vid.video_link}" title="{$vid.video_title}" type="{$vid.type}" href="javascript:void(0);" class="pirobox_gall1 preview" > <img class="play_img" src="{$baseurl}images/play_b.png"> <img src="{$baseurl}uploads/projects/videos/original/{$vid.thumb_image}" style="width: 317px;height: 188px;" alt="project images" /> </a> {/if}
            {elseif $vid.type eq 0} <a rel="{$vid.video_external_id}" title="{$vid.video_title}" type="{$vid.type}"   class="pirobox_gall1 preview"  > <img  class="play_img" src="{$baseurl}images/play_b.png"> <img src="{$vid.thumb_image}" alt="project images" style="width: 317px;height: 188px;" /> </a>{else} <a rel="{$vid.video_external_id}" title="{$vid.video_title}" type="{$vid.type}"  class="pirobox_gall1 preview"  > <img class="play_img" src="{$baseurl}images/play_b.png"> <img src="{$vid.thumb_image}" alt="project images" style="width: 317px;height: 188px;" /> </a> {/if} </div>
          <div class="vCaption">
                <div id="captnBlk_{$vid.id}"><span id="captn{$vid.id}">{$vid.video_title}</span></div>
              </div>
        </li>
            {assign var="cnt" value=$cnt+1}
            {foreachelse}
            
            No videos
            {/foreach}
          </ul>
      {else}
      <div class="noDataFound">No videos.</div>
      {/if}
      <div class="clear"></div>
    </div>
        <div class="clear"></div>
        <div class="clear"></div>
      </div>
  <div class="clear"></div>
</section>
    <div id="player_popup" class="popFixed" style="display:none">
  <div class="popabs">
        <div id="inlineContent1" class="white_content"  style="width:650px !important">
      <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('player_popup')">Close</a>
          
            <div class="popTitle" > <h4 id="vid_captn"></h4></div>
          <div id="pop_cntnt">loading...</div>
       
          </div>
      <div class="clear"></div>
    </div>
      </div>
</div>

      <div id="notice_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('notice_popup')">Close</a>
     <div class="popTitle">
        <h4>Alert...!</h4>
        </div>
        <div id="notice_pop_cntnt" class="prodeForm">
        </div>
      
    </div>
    <div class="clear"></div>
  </div>
  </div>
</div>