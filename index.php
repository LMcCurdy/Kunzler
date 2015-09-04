<?php get_header(); ?>
<div class="wrap group">
<h1>Frankly Speaking</h1>

<div class="post-wrap group"> 
<?php if ( have_posts() ): ?>
  <?php while ( have_posts() ) : the_post(); $featured = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

      
            <?php if ( has_post_thumbnail() ) { ?>
      <div class="group">      
        <div class="grid-1"><div class="time"><p class="date"><?php the_time('j'); ?><span><?php the_time('F'); ?></span></p></div></div>
          <div class="grid-5 single-con">
              <div class="has-image" style="background-image: url('<?= $featured[0]; ?>')">
              <h2><?php the_title(); ?></h2>
              </div>
              <hr class="zig"><hr class="zag">
              <p class="date-m"><?php the_time('F j'); ?></p>
              <p class="social-links">
                <a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!"><i class="fa fa-twitter"></i></a>
              <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook."><i class="fa fa-facebook"></i></a>
              <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>"><i class="fa fa-pinterest"></i></a>
              <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
              </p>
              <div class="ex"><?php the_excerpt(); ?></div>
              <a href="<?php the_permalink(); ?>" class="continue">Continue Reading</a>

         </div>
     </div>

   <?php } else { ?>
<div class="group">
<div class="grid-1"><div class="time"><p class="date"><?php the_time('j'); ?><span><?php the_time('F'); ?></span></p></div></div>
<div class="grid-5 single-con">
<?php if ( get_field('youtube_url_code') ) { ?>
<iframe width="560" height="315" src="//www.youtube.com/embed/<?php the_field('youtube_url_code'); ?>?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
<?php } ?>
<h2><?php the_title(); ?></h2>
              <hr class="zig"><hr class="zag">
              <p class="date-m"><?php the_time('F j'); ?></p>
              <p class="social-links">
                <a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!"><i class="fa fa-twitter"></i></a>
              <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook."><i class="fa fa-facebook"></i></a>
              <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>"><i class="fa fa-pinterest"></i></a>
              <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
              </p>
              <div class="ex"><?php the_excerpt(); ?></div>
              <a href="<?php the_permalink(); ?>" class="continue">Continue Reading</a>
              <?php if ( get_field('coupon_pdf') ) { ?>
              <a href="<?php the_field('coupon_pdf'); ?>" class="coupon"><i class="fa fa-arrow-circle-o-down"></i> Download this week's Kunzler coupons</a>
              <?php } ?>
         </div>
   </div> 

   <?php } ?>



  <?php endwhile; wp_reset_query(); ?>
<?php else: ?>
  <h2>No posts found</h2>
<?php endif; ?>

</div>


<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <div class="prev">
    <?php next_posts_link( __( '&larr; Older posts' ) ); ?>
  </div>
  <div class="next">
    <?php previous_posts_link( __( 'Newer posts &rarr;' ) ); ?>
  </div>
<?php endif; ?>

</div> <!-- end of wrap group -->
<?php get_footer(); ?>

