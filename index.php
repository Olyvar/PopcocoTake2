<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>
<div class="mainContainer">
	<div class="mainContent">
		<ol>
		<?php while ( have_posts() ) : the_post(); ?>
			<li>
				<article class="blogBox">
					<aside><?php the_date('jS F Y'); ?></aside>					
					<h1><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<p class="category">Posted under: 
					<?php
					$the_cat = get_the_category();
					$category_name = $the_cat[0]->cat_name;
					$category_description = $the_cat[0]->category_description;
					$category_link = get_category_link( $the_cat[0]->cat_ID );
					?>
					<a class="grayLinks" href="<?php echo $category_link; ?>" class="category_logo"><?php echo $category_name; ?></a>
					<?php the_content(); ?></p>
					<hr class="goldenHR">
					<span class="claretLinks"><p><?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></p>
					<p class="tags"><?php the_tags('Tagged: '); ?></p></span>
				</article>
			</li>
		<?php endwhile; ?>
		</ol>
		<?php else: ?>
		<h1>No posts to display</h1>
		<?php endif; ?>
	</div>
	<?php include 'sidebar.php'; ?>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>