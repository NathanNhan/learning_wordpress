<?php
get_header();
while (have_posts()) {
    the_post();?>
    <?php get_template_part('content'); ?>
     
<?php }

get_footer();
?>