<?php
/**
 * The template for displaying the News listing page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tanlinell
 * @since Tanlinell 1.0
 */

get_header(); ?>

<?php do_action( 'tanlinell_content_wrapper_start');?>
	
	<?php do_action( 'tanlinell_content_main_start');?>
				
		<?php $post = get_page_by_title( 'News' ); ?>				
		<?php get_template_part( 'templates/partials/pagetitle' ); ?>
		
		<?php if ( have_posts() ) : ?>
			
			<ul class="article-list item-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="article-list__item list-item">
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
					<a href="<?php the_permalink(); ?>" class="article-list__btn btn">
						Read More
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
			<?php get_template_part('pagination'); ?>
			
		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>
				
	<?php do_action( 'tanlinell_content_main_end');?>

	<?php do_action( 'tanlinell_content_sub_start');?>
		<?php get_sidebar(); ?>
	<?php do_action( 'tanlinell_content_sub_end');?>
	
<?php do_action( 'tanlinell_content_wrapper_end');?>

<?php get_footer(); ?>