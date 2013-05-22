<?php

/**

 * Template Name: FULL PAGE
 
 */


get_header(); ?>
	<div id="full-page">
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="border-bottom"><div class="left-border-bottom"></div></div>
	</header><!-- .entry-header -->
	<div class="entry-content">

					<?php the_content(); ?>
	</div>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		
		</div>
	</div>
	    <div class="clear"></div>

<div id="footer" role="contentinfo">
			
	<!-- 				<div class="border-bottom"><div class="left-border-bottom"></div></div>	 -->
			<div id="copyright"><?php echo get_option("conf_copyright");  ?></div>		
			<div id="footer-nav"><?php wp_nav_menu(array('menu'=>'footer')) ?></div>
			<div id="footer-top"><a href="#top">Top</a></div>
			<div class="clear"></div>
					<div style="display:none">
						
							<?php echo get_option("conf_51la"); ?>
						
					</div>
	</div><!-- #colophon -->	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>






