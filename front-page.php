<?php get_header(); ?>

	<div id="slider">
  		<div id="mask"></div>
  		<?php if( function_exists('bxslider') ) bxslider('home-page'); ?>
	</div>
  
	<?php 
		$args = array(
			'numberposts'	=> 1,
			'post_type'		=> 'recipe',
 			'meta_key'		=> 'recipe_of_the_month',
 			'meta_value'	=> true
		);
		$query = new WP_Query($args);
	?>
	<?php if($query->have_posts()): ?>
		<?php while( $query->have_posts() ) : $query->the_post(); ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			
	<div id="recipe-of-the-month" class="group">
 		<div class="grid-half no-margin" >
			<div class="bkg-wrap">
				<div class="bkg-img" style="background-image: url('<?= $url; ?>');"></div>
			</div>
			<div class="recipe-pic">
				<div style="background-image: url('<?= $url; ?>');">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/recipe-of-the-month.png" />
				</div>
			</div>
		</div>
		<div class="grid-half no-margin" >
			<div class="recipe">
				<div>
					<h4>Recipe <span>of the</span> Month</h4>
					<hr class="zig"><hr class="zag">
					<h3><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
					<a class="button" href="<?= get_permalink(); ?>">Continue to recipe</a>
				</div>
			</div>
		</div>
	</div>
	
		<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
	
	<?php 
		$args = array(
			'numberposts'	=> 4,
			'post_type'		=> 'recipe',
 			'orderby'		=> 'rand',
 			'meta_key'		=> 'featured',
 			'meta_value'	=> true
		);
		$query = new WP_Query($args);
	?>
	<?php if($query->have_posts()): ?>
	
	<div id="more-recipes" class="group">

	  <?php while( $query->have_posts() ) : $query->the_post(); ?>
	  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="featured-recipe grid-25 no-margin">
			<?php the_post_thumbnail('medium'); ?>
			<div>
				<h3><?php the_title(); ?></h3>
				<hr class="zig" /><hr class="zag" />
				<?php the_excerpt(); ?>
			</div>
			<a class="button" href="<?= get_permalink(); ?>">Continue to recipe</a>
		</div>
	  <?php endwhile; ?>
		
	</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>

	<div id="block-menu">
		
		<div class="menu-block group yellow">
			<img src="<?= get_template_directory_uri(); ?>/assets/images/nutritional-center.jpg" />
			<h4>Explore our <span>Nutritional Center</span></h4>
			<a href="#">Learn more about our products <span>&#8594;</span></a>
		</div>
		
		<div class="menu-block group red">
			<img src="<?= get_template_directory_uri(); ?>/assets/images/lancaster-favorites.jpg" />
			<h4>Lancaster County <span>Favorite Selections</span></h4>
			<a href="#">Learn more <span>&#8594;</span></a>
		</div>
		
		<div class="menu-block group blue">
			<img src="<?= get_template_directory_uri(); ?>/assets/images/kunzler-link.jpg" />
			<h4>Sign up for the <span>Kunzler Link Email</span></h4>
			<a href="#">Learn more <span>&#8594;</span></a>
		</div>
	
	</div>

<?php get_footer(); ?>