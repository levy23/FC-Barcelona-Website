<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) :    the_post(); ?>
  <!-- post -->
    <div class="container">
    <h1><?php the_title();?></h1>
        <?php the_post_thumbnail(large);?>
    <p><?php the_content();?></p>
        <?php comments_template();?>
<?php endwhile; ?>
  <!-- post navigation -->
<?php else: ?>
  <!-- no posts found -->
<?php endif; ?>
    </div>

<?php get_footer(); ?>
