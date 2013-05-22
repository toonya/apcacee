<?php
// create custom plugin settings menu
add_action('admin_menu', 'baw_create_menu');

function baw_create_menu() {

	//create new top-level menu
	add_menu_page('Option_setting', 'Option_setting', 'administrator', basename(__FILE__), 'baw_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'Option_setting', 'new_option_name' );
	register_setting( 'Option_setting', 'some_other_option' );
	register_setting( 'Option_setting', 'option_etc' );
}



function baw_settings_page() {
?>
<div class="wrap">
<h2>Your Plugin Name</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'Option_setting' ); ?>
    
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name </th>
        <td><input type="text" name="new_option_name[text_string]" value="<?php $options = get_option('new_option_name'); echo $options['text_string']; ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option[text_string]" value="<?php $options = get_option('some_other_option'); echo $options['text_string']; ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc[text_string]" value="<?php $options = get_option('option_etc'); echo $options['text_string']; ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>