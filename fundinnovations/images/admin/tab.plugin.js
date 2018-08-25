$(document).ready(function(){
	$('#c01').show();
	$('#a01').addClass("cur_menu");
	$('#c02,#c03,#c04,#c05,#c06').hide();
	$('#a02,#a03,#a04,#a05,#a06').addClass("in_active");
});
function setDealTab(tabIndex)
{
	switch(tabIndex)
	{
		case 1 : 
		c01();
		break;
		case 2 :
		c02();
		break;
		case 3 :
		c03();
		break;
		case 4 :
		c04();
		break;
		case 5 : 
		c05();
		break;
		case 6 :
		c06();
		break;
		case 7 :
		c07();
		break;
		case 8 :
		c08();
		break;
		default :
		c01();
	}
}
		
		
function c01()
{
	$('#c01').show();
	$('#a01').addClass("cur_menu").removeClass("in_active");
	$('#c02,#c03,#c04,#c05,#c06,#c07,#c08,#c09').hide();
	$('#a02,#a03,#a04,#a05,#a06,#a07,#a08,#a09').addClass("in_active").removeClass("cur_menu");
}
function c02()
{
	$('#c02').show();
	$('#a02').addClass("cur_menu").removeClass("in_active");
	$('#c01,#c03,#c04,#c05,#c06,#c07,#c08,#c09').hide();
	$('#a01,#a03,#a04,#a05,#a06,#a07,#a08,#a09').addClass("in_active").removeClass("cur_menu");
}
function c03()
{
	$('#c03').show();
	$('#a03').addClass("cur_menu").removeClass("in_active");
	$('#c01,#c02,#c04,#c05,#c06,#c07,#c08,#c09').hide();
	$('#a01,#a02,#a04,#a05,#a06,#a07,#a08,#a09').addClass("in_active").removeClass("cur_menu");
}
function c04()
{
	$('#c04').show();
	$('#a04').addClass("cur_menu").removeClass("in_active");
	$('#c01,#c02,#c03,#c05,#c06,#c07,#c08,#c09').hide();
	$('#a01,#a02,#a03,#a05,#a06,#a07,#a08,#a09').addClass("in_active").removeClass("cur_menu");
}
function c05()
{
	$('#c05').show();
	$('#a05').addClass("cur_menu").removeClass("in_active");
	$('#c01,#c02,#c03,#c04,#c06,#c07,#c08,#c09').hide();
	$('#a01,#a02,#a03,#a04,#a06,#a07,#a08,#a09').addClass("in_active").removeClass("cur_menu");
}
function c06()
{
	$('#c06').show();
	$('#a06').addClass("cur_menu").removeClass("in_active");
	$('#c01,#c02,#c03,#c04,#c05,#c07,#c08,#c09').hide();
	$('#a01,#a02,#a03,#a04,#a05,#a07,#a08,#a09').addClass("in_active").removeClass("cur_menu");
}

function c07()
{
	$('#c07').show();
	$('#a07').addClass("active").removeClass("in_active");
	$('#c08').hide();
	$('#a08').addClass("in_active").removeClass("active");
}
function c08()
{
	
	$('#c08').show();
	$('#a08').addClass("active").removeClass("in_active");
	$('#c07').hide();
	$('#a07').addClass("in_active").removeClass("active");

}
	
