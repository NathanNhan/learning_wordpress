<?php
get_header();
while (have_posts()) {
    the_post();?>
     <h2>Search result for : <?php the_search_query(); ?></h2>
     <?php get_template_part('content'); ?>
     
<?php }

get_footer();
?>