// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	$(x).fadeIn() // 淡入
	if(y)
	$(y).fadeIn() // 淡入
	if(y&&url)
	$(y).load(url) // 載入
}
function cl(x)
{
	$(x).fadeOut(); // 淡出
}