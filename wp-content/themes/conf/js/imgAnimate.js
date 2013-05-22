$(function(){
	imgAnimate();
})





function imgAnimate(){
	$obimgAnimate  = '.tour_picture';
	$totle     = $($obimgAnimate).size();
	$now       = 0;
	$next      = 1;
	
	function run(){
		setTimeout(function(){animate()}, 2000)
	}
	
	function animate(){
		$($obimgAnimate).eq($now).fadeOut(2000);
		$($obimgAnimate).eq($next).fadeIn(2000,function(){controller();});

	}
	function controller(){
		$now = $next;
		($now+1) >= $totle ? $next=0:$next+=1;
		run();
	}
	function imgInit(){
		$($obimgAnimate).hide().first().show();
	}
	function loadImg(){
		imgInit();
		$img = $($obimgAnimate);
		$count = 1;
		
		$img.not($img[0]).each(function(index, element) {
			$(element).load(
				$(element).attr("imgurl"),
				function(){
					$(element).attr({"src":$(element).attr("imgurl")});
					$count++;
					if($count==$totle) run();
				}
			);        
	    });
	}
	loadImg();
}