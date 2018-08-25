<section class="innerMidWrap">
	<ul class="innerMidTab">
		<li><a href="{$baseurl}archive_projects/project_details/{$proj_id}">Project Details</a></li>
		<li><a class="active" href="{$baseurl}archive_projects/project_backers/{$proj_id}">Supporters <span class="value">({$project_det_counts.backers_cnt})</span> <span class="arrowtabs arrowvideo"></span></a></li>
		<li><a href="{$baseurl}archive_projects/project_videos/{$proj_id}">Videos <span class="value">({$project_det_counts.videos_cnt})</span></a></li>
		<li><a href="{$baseurl}archive_projects/project_images/{$proj_id}">Images <span class="value">({$project_det_counts.images_cnt})</span></a></li>
		<li><a href="{$baseurl}archive_projects/project_comments/{$proj_id}">Comments <span class="value">({$project_det_counts.comments_cnt})</span> </a></li>
		{if $project_status.project_status eq 'success'}
    <li><a href="{$baseurl}archive_projects/project_updates/{$proj_id}">Project Updates </a></li>{/if}
   {if $project_status.user_id eq $user_id && $user_id neq ''}
		<li><a href="{$baseurl}archive_projects/project_admin_commets/{$proj_id}">Admin Comments<span class="value">({$project_det_counts.admin_comments_cnt})</span></a></li>{/if}
	</ul>
	<div class="clear"></div>
	<div class="innerMidContent">
		<div class="bakersBlock">
			<h5>Supporters</h5>
            {if $proj_backers neq 0}
            
			<ul>{assign var="cnt" value="1"}
            {foreach from=$proj_backers item=backer}
				<li {if $cnt % 3 eq 0} class="last" {/if} >
					<div class="bakerImg">
                   <a href="{$baseurl}profile/index/{$backer.backers_details.id}"> {if $backer.backers_details.profile_imgurl neq ''}<img src="{$backer.backers_details.profile_imgurl}" height="112" align="bakers">
                    {else}
                    <img src="{$baseurl}images/prof_no_img.png" align="bakers">
                    {/if}</a></div>
					<div class="rightCntnt">
						<h4><a href="{$baseurl}profile/index/{$backer.backers_details.id}">{$backer.backers_details.profile_name|ucwords}</a></h4>
						<p>{$backer.backers_details.city_name}</p>
						<p class="font15">Supported Projects : <b>{$backer.backed_proj_cnt}</b></p>
					</div>
					<div class="clear"></div>
				</li>
                 {assign var="cnt" value=$cnt+1}
                 {foreachelse}
                  <div class="noDataFound">No supporters.</div>
                 {/foreach}
                
				
			</ul>{else}
            <div class="noDataFound">No supporters.</div>
            {/if}<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section>