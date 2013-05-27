jQuery(function($){
	$(".section_repeatable li:first").addClass("active");
	$("#section-page-content").val($("#sec_textarea").val());  //优先级很低，所以用这个方法设置。
	
	$(".repeatable-save ").on("click",function(){
		$(".active #sec_textarea").val(tinyMCE.activeEditor.getContent());
	})
	$("#post").submit(function() {
		  $(".repeatable-save ").click();
	});
	
	//add a section area.
	$(".repeatable-add").on("click",function(){
		$sectionfiled = $(this).parent().find(".section_repeatable li.img-list-template").clone();
		$sectionfiled
		.insertAfter($(this).parent().find(".section_repeatable li.img-list-template"))
		.find('.section-title span:first').text("")
		.parent().hide()
		.next().show()
		.find( ":first-child" ).val("");
		$name_title = $(".section_repeatable li.img-list-template").find(".section-title-edit :first-child").attr("name");
		$name_content = $(".section_repeatable li.img-list-template").find("textarea").attr("name");
		$new_name_title = $name_title.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;});
		$new_name_content = $name_content.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;});		
		$(".section_repeatable li.img-list-template").find(".section-title-edit :first-child").attr("name",$new_name_title).val("");
		$(".section_repeatable li.img-list-template").find("textarea").attr("name",$new_name_content).val("");
		$(".section_repeatable li.img-list-template .section-content-edit").click();
		tinyMCE.activeEditor.setContent("Please enter the new section content here.");

		return false;
	});
	
	//add edit function of title edit
	$(".section-title :first-child").live("click",function(){
		$(this).parent().hide().next().show().find("#sec_text").focus();
		$(this).parent().prev().click();
	});
	$(".section-title-save").live("click",function(){
		$new_title = $(this).prev().val();
		$(this).parent().hide().prev().show().find("span:first").text($new_title);
	});
	
	//delete item
	$(".repeatable-remove").live("click",function(){
		$(this).closest("li").remove();
	});
	
	//edit content
	$(".section-content-edit").live("click",function(){
		$(".repeatable-save ").click();		
		$(".section_repeatable li").removeClass("active");
		$(this).closest("li").addClass("active");
		tinyMCE.activeEditor.setContent($(".active #sec_textarea").val());
	});
	$("#sec_text").live("focusout",function(){
		$(this).next().click();
	});
	
	
	$('.custom_upload_image_button').click(function() {  
        formfield = jQuery(this).siblings('.custom_upload_image');  
        preview = jQuery(this).siblings('.custom_preview_image');  
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');  
        window.send_to_editor = function(html) {  
            imgurl = jQuery('img',html).attr('src');  
            classes = jQuery('img', html).attr('class');  
            id = classes.replace(/(.*?)wp-image-/, '');  
            formfield.val(id);  
            preview.attr('src', imgurl);  
            tb_remove();  
        }  
        return false;  
    });  
	  
	$('.custom_clear_image_button').click(function() {  
        var defaultImage = jQuery(this).parent().siblings('.custom_default_image').text();  
        jQuery(this).parent().siblings('.custom_upload_image').val('');  
        jQuery(this).parent().siblings('.custom_preview_image').attr('src', defaultImage);  
        return false;  
    });  
	
	//!sort fix
	
	jQuery.fn.extend({
	  sortfix: function() {
	    return this.each(function(i,e) { 
		    $(this).find('input').attr('name',  function(index, name) {
				return name.replace(/(\d+)/, function(fullMatch, n) {
					return i;
				});
			});
	    });
	  }
	});
	//remove picture
	$('.remove-img').click(function(){
	    $(this).parent().remove();
	    $('.img-list').not(".img-list-template").sortfix();
    })
	
	$("#submit").click(function(){
	    $('.img-list-template').remove();
    })
	// onload fix 150*150
	$('.img-list').each(function(i,e){
    
	    $img = $(this).find('input').val();
		 
		var reg = /\.jpg/g;
		
		$img = $img.replace(reg, '-150x150.jpg');
		
		$(this).find('img').attr('src',$img); 
		 
    });
	//media management handle    
	 var ty_uploader;
	 var ty_reciever;
	 
	 // Bind to our click event in order to open up the new media experience.
	$(document.body).on('click.tyOpenMediaManager', '.ty-open-media', function(e){ //ty-open-media is the class of our form button
	 
		 // Prevent the default action from occuring.
		 e.preventDefault();
		 
		 
		 // If the frame already exists, re-open it.
		 if ( ty_uploader ) {
			 ty_uploader.open();
		 return;
		 }
		 ty_uploader = wp.media.frames.ty_uploader = wp.media({
		 
		//Create our media frame
			 className: 'media-frame ty-media-frame',
			 frame: 'select', //Allow Select Only
			 multiple: true, //Disallow Mulitple selections
			 library: {
			 type: 'image' //Only allow images
			 },
		 });
		 ty_uploader.on('select', function(){
			 // Grab our attachment selection and construct a JSON representation of the model.
			 var media_attachment = ty_uploader.state().get('selection').map( function( attachment ) {
												  attachment = attachment.toJSON();
												  return attachment; 
												  });		 
	
			 $.each(media_attachment,function(k,v){
		
		//!转换成img target形式		
	
				 $imgurl = v.url;
		
		//!make it 150x150
				 
				 var reg = /\.jpg/g;
				
				 $img150 = $imgurl.replace(reg, '-150x150.jpg');
				 
				 
		
		//!获取最后一个元素
		
				 ty_reciever = $('.img-list-template');



		//!输入新的列
				
					
		/* 		 var listhtml = '<li class="img-list"><input type="hidden" placeholder="Enter" name="travel-imgs['+$('.img-list').size()+']" value="" /><img src="" /></li>'; */
				 listhtml = ty_reciever.clone(true);
				 jQuery('img', listhtml).attr('src', $img150);
				 jQuery(listhtml).removeAttr('style').removeClass('img-list-template');
				 jQuery('input', listhtml).attr('value', $imgurl);
/*
				 jQuery('input', listhtml).attr('value', $imgurl).attr('name',  function(index, name) {
						return name.replace(/(\d+)/, function(fullMatch, n) {
						return Number(n) + 1;
					});
				})
*/
				  
		 //!插入 img 列表
		
		 		
				 ty_reciever.before(listhtml);
				 $('.img-list').not(".img-list-template").sortfix();
	
			 })
			 
		 });
		 
		 
		// Now that everything has been set, let's open up the frame.
		 ty_uploader.open();
		 });
		 //!make it sortable
	$('.img-area ul').sortable({
			opacity: 0.6,
			revert: true,
			cursor: 'move',
			handle: '.sort',
			tolerance: "pointer" ,
		  	update: function( event, ui ) {
/* 		  		 alert("test"); */
				 $('.img-list').not(".img-list-template").sortfix();
				 }
		 });
})


