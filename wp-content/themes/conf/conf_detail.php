<?php   
	saveoptions();
	function saveoptions(){
		if(isset($_POST['option_save'])){  
		update_op("blogname");
		update_op("blogdescription");
		update_op("conf_detail");
		update_op("conf_copyright");
		update_op("conf_51la");
		update_op("conf_sub_url");
		
	/*
	
    $option1 = stripslashes($_POST['conf_detail']);   
    update_option('conf_detail', $option1);//更新选项   

    $option2 = stripslashes($_POST['conf_copyright']);   
    update_option('conf_copyright', $option2);//更新选项   

    $option3 = stripslashes($_POST['conf_51la']);   
    update_option('conf_51la', $option3);//更新选项 
*/  
			
		}
	}
	function update_op($key){
			$option = stripslashes($_POST[$key]);   
		    if($option!="")update_option($key, $option);//更新选项   
		}
	function init_set_field(){
		
	}
?>   
  
<?php      
function conf_detail_init(){   
    add_menu_page( 'Details', 'Details', 'administrator', 'conf_detail_init_options','display_function');   
}   
add_action('admin_menu', 'conf_detail_init');   
  
function display_function(){ 
	$all = array("blogname","conf_detail","conf_copyright","conf_51la","conf_sub_url");
?> 
	  
    <form method="post" name="conf_detail_form" id="conf_detail_form">   	
	    <h2>Set name of the Conference.</h2>
	    <p>   
	    <label>   
	    <input name="blogname" size="40"  value="<?php echo get_option('blogname'); ?>"/>
	   	Enter here.   
	    </label>   
	    </p>
	    <h2>Set full name of the Conference.</h2>
	    <p>   
	    <label>   
	    <input name="blogdescription" size="40"  value="<?php echo get_option('blogdescription'); ?>"/>
	   	Enter here.   
	    </label>   
	    </p>         
       
	    <h2>Set location & time of the <?php bloginfo( 'name' ) ?>.</h2>   
	    <p>   
	    <label>   
	    <input name="conf_detail" size="40"  value="<?php echo get_option('conf_detail'); ?>"/>
	   	Enter here.   
	    </label>   
	    </p>   
	    <h2>Set copyright of the <?php bloginfo( 'name' ) ?>.</h2>   
	    <p>   
	    <label>   
	    <input name="conf_copyright" size="40"  value="<?php echo get_option('conf_copyright'); ?>"/>   
	   	Enter here.   
	    </label>   
	    </p> 
	    <h2>Set 51.la of the <?php bloginfo( 'name' ) ?>.</h2>   
	    <p>   
	    <label>   
	    <input name="conf_51la" size="40"  value="<?php echo esc_attr(get_option("conf_51la")) ?>"/>          
	   	Enter here. <?php if(get_option("conf_51la")!="")echo "<i>Already set</i>." ?>
	    </label>   
	    </p> 
	    <h2>Set the url of submission system  of the <?php bloginfo( 'name' ) ?>.</h2>   
	    <p>   
	    <label>   
	    <input name="conf_sub_url" size="40"  value="<?php echo get_option('conf_sub_url'); ?>"/>          
	   	Enter here.   
	    </label>   
	    </p> 

	    <p class="submit">   
	        <input type="submit" name="option_save" value="<?php _e('Save'); ?>" />   
    </p>    
    </form>   
       
<?php } ?>