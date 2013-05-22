<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	


	<header class="entry-header">
		<span></span><span><h1 class="entry-title"><?php the_title(); ?></h1></span><span></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if(!is_page('Conference News'))the_content(); ?>
		<?php if(is_page('Conference News')):; ?>
			<ul id="latest-news">
			<?php query_posts('showposts=100');
	
				// The Loop
				while ( have_posts() ) : the_post();
				     echo '<li><a href="';
				     the_permalink();
				     echo '" title="';
				     the_title();
				     echo '">';
				     the_title();
				     echo '</a>';
				     echo '<div class="time">';
					 the_time('F j, Y');  
					 echo '</div>';
				     echo '</li>';
	
				endwhile;
				
				// Reset Query
				wp_reset_query();
				?> 
			</ul>	
		<?php endif; ?>
		

	</div><!-- .entry-content -->

	<?php if(is_page('Overview')): ; ?>
<!--
<?php $add_1 = get_page(1447); ?>
	<div>
		<header class="entry-header">
			<h1 class="entry-title"><?php echo apply_filters('the_title', $add_1->post_title); ?></h1>
			<div class="border-bottom"><div class="left-border-bottom"></div></div>
		</header>
		<div class="entry-content">
			<?php echo apply_filters('the_content', $add_1->post_content); ?>
		</div>
	</div>

<?php $add_2 = get_page(1467); ?>
	<div>
		<header class="entry-header">
			<h1 class="entry-title"><?php echo apply_filters('the_title', $add_2->post_title); ?></h1>
			<div class="border-bottom"><div class="left-border-bottom"></div></div>
		</header>
		<div class="entry-content">
			<?php echo apply_filters('the_content', $add_2->post_content); ?>
		</div>
	</div>

<?php $add_3 = get_page(1527); ?>
	<div>
		<header class="entry-header">
			<h1 class="entry-title"><?php echo apply_filters('the_title', $add_3->post_title); ?></h1>
			<div class="border-bottom"><div class="left-border-bottom"></div></div>
		</header>
		<div class="entry-content">
			<?php echo apply_filters('the_content', $add_3->post_content); ?>
		</div>
	</div>


-->
<?php	
	$tar_page_1842= get_page(1842);
	/* echo "<h2>".$cur_page->post_title."</h2>"; */
?>
<div>
	<header class="entry-header">
		<span></span><span><h1 class="entry-title"><?php echo $tar_page_1842->post_title ?></h1></span><span></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php echo apply_filters('the_content', $tar_page_1842->post_content); ?>
	</div><!-- .entry-content -->


</div>
<div>
	<header class="entry-header">
		<span></span><span><h1 class="entry-title">Conference News</h1></span><span></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<ul id="latest-news">
		<?php query_posts('showposts=5');

			// The Loop
			while ( have_posts() ) : the_post();
			     echo '<li><a href="';
			     the_permalink();
			     echo '" title="';
			     the_title();
			     echo '">';
			     the_title();
			     echo '</a>';
			     echo '<div class="time">';
				 the_time('F j, Y');  
				 echo '</div>';
			     echo '</li>';

			endwhile;
			
			// Reset Query
			wp_reset_query();
			?> 
		</ul>	
	</div><!-- .entry-content -->


</div>
	
<?php endif;?>

</article>

	
	

<footer class="entry-meta">
	<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-meta -->	