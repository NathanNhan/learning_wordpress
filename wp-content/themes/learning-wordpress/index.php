<?php
get_header();
?>
    <div class="site-content clearfix">
        <div class="main-column">
            <?php
            while (have_posts()) {
                the_post();?>
                <?php get_template_part('content', get_post_format()); ?>
                 
            <?php } ?>
            
      </div>
       
       <?php get_sidebar(  ); ?>

    </div>
  


<?php get_footer();
?>