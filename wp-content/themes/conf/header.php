<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
if(!current_user_can('administrator')){
	wp_redirect("/icctn/2013",302);
	} 
  */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/code.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/imgAnimate.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/slide.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/color.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/fn.js'; ?>"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a  name="top"></a>
<div id="page" class="hfeed">

<div id="header">
		<div id="banner-top"></div>
		<div id="banner">
            	<div id="banner-img">
                    <div id="showbox">
	                	<div id="showbox-img">
		                	<ul>
		                    	<li style="background:url(wp-content/themes/conf/images/banner-bg.jpg)"></li>
		                    </ul>
	                    </div>                    
                    	<div id="showbox-current"></div>
                        <div id="showbox-next">
                        	<ul></ul>
                        </div>
                    </div>
                </div>
                <div id="banner-wrap">
                    <div id="banner-logo"></div>
                </div><!-- #access -->
                <div class="clear"></div>                
        </div>
		<div id="nav"><?php wp_nav_menu(array('menu'=>'basic2')); ?><div class="clear"></div></div>

</div>


	<div id="main">
	
	