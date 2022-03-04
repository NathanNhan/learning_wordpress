<?php
get_header();
while (have_posts()) {
    the_post();?>
     <article class="post">
    <p><?php the_time('F j Y g:i a') ?> - By <a href=" <?php echo get_author_posts_url(get_the_author_meta('ID'));  ?>"><?php echo get_the_author() ?></a></p>
    <?php
      $categories = get_the_category();
      $seperate = ', ';
      $output = '';
      if($categories) {
          foreach($categories as $category) {
              $output .= 'Posted by ' . '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $seperate;
          }
          echo trim($output , $seperate);
      }
    ?>
     <h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
     <?php the_post_thumbnail('banner-image'); ?>
     <p><?php the_content() ?></p>
     
     
     </article>
     
<?php }

get_footer();
?>