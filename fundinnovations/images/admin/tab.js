// JavaScript Document

	


function c01()
{
	$('#c01').fadeIn();
	$('#a01').addClass("active").removeClass("normal");
	$('#c02,#c03').fadeOut();
	$('#a02,#a03').addClass("normal").removeClass("active");
}
function c02()
{
	$('#c02').fadeIn();
	$('#a02').addClass("active").removeClass("normal");
	$('#c01,#c03').fadeOut();
	$('#a01,#a03').addClass("normal").removeClass("active");
}
function c03()
{
	$('#c03').fadeIn();
	$('#a03').addClass("active").removeClass("normal");
	$('#c01,#c02').fadeOut();
	$('#a01,#a02').addClass("normal").removeClass("active");
}
