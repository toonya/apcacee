<?php

/**

 * Template Name: SCI PAGE 
 */
get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>


				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		





	</div><!-- #primary -->
		<div id="sidebar">
				
				<div id="sub"><div id="sub-wrapper"><a target="_blank" href="<?php echo get_option("conf_sub_url"); ?>">SUBMIT PAPER</a></div></div>
				<div id="side-container">
					<div class="side-e">
					<h1>本页导航</h1>
						<div id="scipage_nav">
							<?php echo get_post_meta(get_the_ID(),'nav',true); ?>
						</div>
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
<script type="text/javascript">
	$(function(){
		$("#scipage_nav a").each(function(i,e){
			var str = $(e).attr("href");
			str='.'+str.slice(1);
			if(i>0)$(str).hide();
		})
		$("#scipage_nav a").click(function(){
			var tar = $(this).index("#scipage_nav a");
			$("#scipage_nav a").each(function(i,e){
				var str = $(e).attr("href");
				str='.'+str.slice(1);
				$(str).hide(50,function(){
					if((i+1)>=$("#scipage_nav a").size()){
						var showtar = $("#scipage_nav a").eq(tar).attr("href");
						showtar='.'+showtar.slice(1);
						setTimeout(function(){$(showtar).show();}, 200) 
					} 
				});
			})
		})
	})
</script>
</body>
</html>