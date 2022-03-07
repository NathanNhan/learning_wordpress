<?php

get_header();
if(have_posts()) : 
   while(have_posts()) : the_post();
     the_content();
endwhile;
else :
    echo 'no content';
endif;
  
  ?>
     <div class="home-column clearfix">
         <div class="one-half">
            <?php
              $onionsPosts = new WP_Query('cat=5&posts_per_page=2');
              if ($onionsPosts->have_posts()):
                while ($onionsPosts->have_posts()): $onionsPosts->the_post();
                ?>
                    <?php the_post_thumbnail('small-thumbnail');?>
				    <h2><a href="<?php the_permalink() ?>"><?php the_title();?></a> <?php the_time(' g:i a') ?></h2>
                    <p><?php the_excerpt(); ?></p>
				<?php
                endwhile;

              else:
                echo 'no content';
              endif;
            ?>
         </div>
         <div class="one-half last">
             <?php
              $newsPosts = new WP_Query('cat=6&posts_per_page=2&order=ASC');
              if ($newsPosts->have_posts()):
                while ($newsPosts->have_posts()): $newsPosts->the_post();
                ?>
                    <?php the_post_thumbnail('small-thumbnail');?>
				    <h2><a href="<?php the_permalink() ?>"><?php the_title();?></a><?php the_time(' g:i a') ?></h2>
                    <p><?php the_excerpt(); ?></p>
				<?php
                endwhile;

              else:
                echo 'no content';
              endif;
            ?>
         </div>
     </div>

  <?php
   /* loop options */
   



 get_footer();
?>