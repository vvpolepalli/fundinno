/*
 * Image preview script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */
 
this.FloorImagePreview = function(){	
	/* CONFIG */
		
		xOffset1 = 220;
		yOffset1 = 900;
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$("a.previewFloor").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		$("body").append("<p id='previewFloor'><img src='"+ this.href +"' alt='Image preview' />"+ c +"</p>");								 
		$("#previewFloor")
			.css("top",(e.pageY - xOffset1) + "px")
			.css("left",(e.pageX - yOffset1) + "px")
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		$("#previewFloor").remove();
    });	
	$("a.previewFloor").mousemove(function(e){
		$("#previewFloor")
			.css("top",(e.pageY - xOffset1) + "px")
			.css("left",(e.pageX - yOffset1) + "px");
	});			
};


// starting the script on page load
$(document).ready(function(){
	FloorImagePreview();
});