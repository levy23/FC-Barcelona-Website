<?php get_header();?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body id="scroll">
<script type="text/javascript">
    $(document).ready(function() {
        $.localScroll();
    });
</script>

<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) :    the_post(); ?>
        <!-- post -->
        <?php the_content();?>
    <?php endwhile; ?>
        <!-- post navigation -->
    <?php else: ?>
        <!-- no posts found -->
    <?php endif; ?>
</div>

<a id="bottom" href="#top" class="material-icons">&#xe5d8;</a>

<?php get_footer();?>
