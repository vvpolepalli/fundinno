<style type="text/css">
p {
color: #686868;
font: 13px/20px Arial, sans-serif, "Myriad Pro";
padding: 5px 0;
margin: 0;

}
html, body {
	border: 0;
	margin:0;
	padding:0;
}
body{
	color: #686868;
	font: 13px/20px Arial, sans-serif, "Myriad Pro";
	overflow: hidden;
	background:#fff;
}
.projDesc img{
	max-width:100%;
}
</style>
<script type="text/javascript" src="{$baseurl}js/jquery-1.4.3.min.js"></script>
{literal} <script type="text/javascript">
$(window).load(function(){
$('#proj_cntnt',window.parent.document).css('height',$(document).height());
$(".projDesc").find("a").attr('target','_parent');
var page_t='{/literal}{$page_t}{literal}';
if(page_t =='media_page'){
var hash_pos=parent.document.URL.indexOf('#')+1;
if(hash_pos !=0){
var goto=parent.document.URL.substr(hash_pos);
document.getElementById(goto).scrollIntoView()
}
}
});
</script>{/literal} 
<div class="projDesc" >
{$cms_content.page_content}
</div>