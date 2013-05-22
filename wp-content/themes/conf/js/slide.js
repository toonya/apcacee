$(function(){
	slideAnimate();
})


function slideAnimate(){
	
	var obslide       = '.sub-menu';
	var obslideparent = 'sub-parent';
	var obslidep      = '.'+obslideparent;
	
/* 	$(obslide).hide(); */
	$(obslide).parent("li").addClass(obslideparent);
	$(obslidep).click(function(){
		if(!$(this).is(".open")){
			$(this).mouseover();
			return;
			}
		if($(this).is(".open")){
			$(this).mouseout();
			return;
			}	})
/*
	$(obslidep).hover(
		function(){
			$(obslide).stop(true,true).not(this).slideUp();
			$(this).addClass('open').children(obslide).slideDown();
		},function(){
			$(this).removeClass("open").children(obslide).slideUp(function(){$(obslide).stop(true,true);
});
		}
	);
*/
}