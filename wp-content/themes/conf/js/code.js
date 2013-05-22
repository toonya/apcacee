$(function(){
	init();
	autoSetHeight();
})




/* init */
function init(){
	$("#nav li").hover(function(){
		$(this).addClass("hover");
	},function(){
		$(this).removeClass("hover");
	})
}


/* Make nav and main area the same hight. */

function autoSetHeight(){
	$cont = $('#content').height();
	$bar = $('#sidebar').height();
	$pri = $('#primary').height();
	if($pri < $bar){
		$('#primary').height($('#main').height()-84);	
	}
	if($pri < $cont){
		$('#primary').css('height','auto');
	}
}

