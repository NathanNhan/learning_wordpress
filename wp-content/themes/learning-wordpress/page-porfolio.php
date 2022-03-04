<?php
get_header();
while (have_posts()) {
    the_post();?>
     <article class="post">
         <div class="column-container clearfix">
            <div class="column-title">
                <h3><?php the_title()?></h3>
            </div>
            <div class="column-content">
                 <p><?php the_content()?></p>
            </div>
         </div>
     
    
     </article>
<?php }
get_footer();
?>