<div>Category : {$category} <br/>
  {if $project_list|@count gt 0 && $project_list neq 0}
  
  Select staff pick project :
  <div class="formValidation" >
    <select name="project_list" id="project_list" class="user_select" >
      <option value="0">Select project</option>
      
      {foreach from=$project_list key=k item=pr }
                  
      <option value="{$pr.id}" >{$pr.project_title}</option>
      
      {/foreach}
                   
    </select>
  </div>
  {else}
  Sorry there is no projects created on this category.
  {/if} </div>