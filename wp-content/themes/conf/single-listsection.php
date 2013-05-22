<?php
/**

 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						$post_meta_data = get_post_custom($post->ID) ;
						$section = unserialize($post_meta_data['sec_textarea'][0]);
						echo '<div id="list-section-content"><ul class="section_repeatable">';  
							foreach ($section as $string) {  
							    echo '<li>'.$string.'</li>';  
							}  
							echo '</ul></div>'; 
					?>


				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		

		</div><!-- #primary -->
		<div id="sidebar">
				
				<div id="sub"><div id="sub-wrapper"><a target="_blank" href="<?php echo get_option("conf_sub_url"); ?>">Submit your paper now.</a></div></div>
				<div id="side-container">
					<div class="side-e">
					<h1>本页导航</h1>
						<?php
						$section_nav = unserialize($post_meta_data['sec_text'][0]);
						echo '<div id="list-section-title"><ul class="section_repeatable">';  
							foreach ($section_nav as $string) {  
							    echo '<li>'.$string.'</li>';  
							}  
							echo '</ul></div>'; 
						
	?>
					</div>
				<div class="clear"></div>	
				</div>
			<div class="clear"></div>
<!-- 			<div id="main-bottom"></div> -->
	</div><!-- #main -->
	    <div class="clear"></div>
	    </div>
	<!-- main end -->
	<div id="footer" role="contentinfo">
		<div id="inner-footer">
			
	<!-- 				<div class="border-bottom"><div class="left-border-bottom"></div></div>	 -->
<!-- 			<div id="footer-top"><a href="#top">Top</a></div> -->
<!-- 		<div id="footer-nav"><?php wp_nav_menu(array('menu'=>'footer')) ?></div> -->

			<div class="clear"></div>
					<div style="display:none">
						
							<?php echo get_option("conf_51la"); ?>
						
					</div>
		</div>

	</div><!-- #colophon -->	
						<div id="copyright"><?php echo get_option("conf_copyright");  ?></div>		

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>