// JavaScript Document
$(function(){
	setCurrent($("#showbox-img li").eq(0).css("background-image"));		
/*
	loadImg();	
	buldBox();	
*/
	
	$("#footer-top a").hover(function(){

	},function(){
		
	})
/*	showBox(1);*/


//	$('.wpcf7-response-output').remove();
})
/*function timer(fn,time,i){
	setTimeout(function(){fn(i)},time);
}
function change(i){
	$count = $("#banner-img ul li").length;
	$("#banner-img ul li").not(".up").hide();
	$(".up").removeClass("up");
	$("#banner-img ul li").eq(i).hide().addClass("up");
	$("#banner-img ul li").eq(i).fadeIn(2000,function(){
		if(i+2>$count) i=0;
		else i++;
		timer(change,2000,i);
		});
}*/

function buldBox(){
	$showBox = $("#showbox");
	$width	 = $showBox.width();
	$height  = $showBox.height();
	$next	 = $showBox.find("#showbox-next ul");
	$nexthtml   =  "";
	$widtheach  =  parseInt($width/2);
	$heighteach =  parseInt($height/2);
	$widthfix   =  $width-$widtheach*1;
	$heightfix  =  $height-$heighteach*1;
	function buld(){

		for(i=0;i<2;i++){
				
			for(j=0;j<2;j++){
				if(j==1&&i==1){
					$nexthtml+="<li ";
					$nexthtml+="showBoxLeft='-"+j*$widtheach+"px' showBoxTop='-"+i*$heighteach+"px' ";
					$nexthtml+="style='display:none; width:"+$widthfix+"px;";
					$nexthtml+="height:"+$heightfix+"px;";
					$nexthtml+="'></li>";
				}
				if(j==1&&i!=1){
					$nexthtml+="<li ";
					$nexthtml+="showBoxLeft='-"+j*$widtheach+"px' showBoxTop='-"+i*$heighteach+"px' ";
					$nexthtml+="style='display:none; width:"+$widtheach+"px;";
					$nexthtml+="height:"+$heighteach+"px;";
					$nexthtml+="'></li>";
				}
				if(j!=1&&i==1){
					$nexthtml+="<li ";
					$nexthtml+="showBoxLeft='-"+j*$widtheach+"px' showBoxTop='-"+i*$heighteach+"px' ";
					$nexthtml+="style='display:none; width:"+$widthfix+"px;";
					$nexthtml+="height:"+$heighteach+"px;";
					$nexthtml+="'></li>";
				}	
				if(i!=1&&j!=1){
					$nexthtml+="<li ";
					$nexthtml+="showBoxLeft='-"+j*$widtheach+"px' showBoxTop='-"+i*$heighteach+"px' ";
					$nexthtml+="style='display:none; width:"+$widtheach+"px;";
					$nexthtml+="height:"+$heighteach+"px;";
					$nexthtml+="'></li>";				
				}

			}
		}
		return $nexthtml;
			
		}	
	$next.html(buld());	
}
function setCurrent(url){
	$("#showbox-current").css("background",""+url);
}
function setNext(url){
	$("#showbox-next ul li").each(function(index, element) {
        $left = $(element).attr("showBoxLeft");
		$top  = $(element).attr("showBoxTop");
		$(element).css("background",url+" "+$left+" "+$top);
    });

}
function showBox(i){
	var url = new Array();
	$("#showbox-img li").each(function(index, element) {
        url[index] = $(element).css("background-image");
    });
	function run(i){
		setNext(url[i]);
/*  		color(i);	 */
		piece(0,i);
/*		setCurrent(url[i]);
		i++;
		timer(run,2000,i);*/	
	}
	function timer(fn_name,time,i){
		if(i>=url.length) i=0;
		setTimeout(function(){fn_name(i)},time);
	}
	function piece(n,i){
/*		$("#banner-logo").css("background-size","0px");*/
		$("#showbox-next li").eq(n).fadeIn(500,function(){ 
			if(n<4){ 
				n++;
				piece(n,i);
			} 
			if(n==4){
				setCurrent(url[i]);				
				$("#showbox-next li").hide();
				i++;
				timer(run,2000,i);
/*		$("#banner-logo").css("background-size","100%");*/
				
				}  
			})
		}
	function color(i){
		switch (i){
			case 1:
			$("#header, #banner-b-sidebar").animate({"backgroundColor":"#05243d"},2000);
			break;
			case 2:
			$("#header, #banner-b-sidebar").animate({"backgroundColor":"#132c2f"},2000);
			break;
			case 3:
			$("#header, #banner-b-sidebar").animate({"backgroundColor":"#352f34"},2000);
			break;	
			case 4:
			$("#header, #banner-b-sidebar").animate({"backgroundColor":"#2f4e8f"},2000);
			break;	
			case 5:
			$("#header, #banner-b-sidebar").animate({"backgroundColor":"#1b505d"},2000);
			break;
			case 5:
			$("#header, #banner-b-sidebar").animate({"backgroundColor":"#152b43"},2000);
			break;																							
			case 0:
			$("#header, #banner-b-sidebar").animate({"backgroundColor":"#3e3728"},2000);
			break;			
		}
	}	
	timer(run,2000,i);
}
function loadImg(){
	$img = $("#showbox-img li");
	$totle = $img.length;
	$count = 1;
	$img.not($img[0]).each(function(index, element) {
		$(element).load(
			$(element).attr("imgurl"),
			function(){
				$(element).css({"background":"url("+$(element).attr("imgurl")+")"});
				$count++;
				if($count==$totle) showBox(1);
			}
		);        
    });
}
