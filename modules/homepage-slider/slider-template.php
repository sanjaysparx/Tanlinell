<?php
	$args = array(
		'post_type'=> 'homepage_slides',
		'orderby' => 'menu_order',
		'order'	=> 'ASC',
		'posts_per_page' => '5'
	);
	
	$slides = new WP_Query($args);
?>
	
<?php if ( $slides->have_posts() ): ?>

	<section class="home-featured-slider container-extend">
		<div class="flexsliderSTOP">
			<ul class="slides">
			<?php while ($slides->have_posts() ) : $slides->the_post(); ?>
				
				<?php
					//setup the custom meta object
					global $custom_metabox;
					
					// get the meta data for the current post
					$custom_metabox->the_meta();
					
					//link meta data
					$custom_metabox->the_field('text');
					$link_text = $custom_metabox->get_the_value();
					
					$custom_metabox->the_field('url');
					$link_url = $custom_metabox->get_the_value();
					
					$featured_image       =  tanlinell_get_post_thumb( $post->ID );
					$post_thumbnail_sized =  trailingslashit(get_stylesheet_directory_uri()) . 'timthumb.php?src='.$featured_image[0] . '&q=80&w=1400&zc=1';
				?>
				
				<li class="slide">				
					<div class="slide-content">
						<div class="slide-content-inner">
							
							<a href="<?php echo $link_url ?>"><?php echo $link_text ?></a>
							
							<?php the_title('<h3>', '</h3>'); ?>
							<?php the_content();?>
															
						</div>
					</div>
					<img class="slide-bg" src="<?php echo $post_thumbnail_sized; ?>" alt="">
				</li>
				
	        <?php endwhile; wp_reset_postdata();?>
			</ul>
		</div>
	</section>

<?php endif; ?>