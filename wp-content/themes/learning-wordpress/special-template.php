<?php
/* 
Template Name: Special Layout
*/
get_header();
while (have_posts()) {
    the_post();?>
     <article class="post">
     <h3><?php the_title()?></h3>
     <!-- info box -->
     <div class="info-box">
         <h4>Disclaimer Title</h4>
         <p>Lorem ipsum dolor sit amet, </p>
     </div>
     <p><?php the_content()?></p>
     </article>
<?php }
get_footer();
?>