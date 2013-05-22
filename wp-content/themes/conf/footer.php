<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
		</div><!-- #primary -->
		<div id="sidebar">
				
				<div id="sub"><div id="sub-wrapper"><a target="_blank" href="<?php echo get_option("conf_sub_url"); ?>">Submit your paper now.</a></div></div>
				<div id="side-container">
					<div class="side-e">
					<h1>Important Date</h1>
						<?php
	$tar_page= get_page(1447);
	/* echo "<h2>".$cur_page->post_title."</h2>"; */
	echo apply_filters('the_content', $tar_page->post_content);
	
	?>
					</div>
					<div class="side-e">
					<h1>Contact us</h1>
										<?php
					
					$tar_page= get_page(1527);
					/* echo "<h2>".$cur_page->post_title."</h2>"; */
					echo apply_filters('the_content', $tar_page->post_content);
					
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