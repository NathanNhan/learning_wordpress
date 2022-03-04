<?php

get_header();

while (have_posts()) {
    the_post();?>
<article class="post">
         <?php
         // nếu đang là page children
    $theParents = wp_get_post_parent_id(get_the_ID());
    // nếu đang là page parent
    $testArray = get_pages(array(
        'child_of' => get_the_ID(),
    ));
    if ($theParents or $testArray) {?>
      <span class="parent-link">
          <a href="<?php echo get_the_permalink($theParents); ?>"><?php echo get_the_title($theParents) ?></a>
      </span>
      <?php }?>
   <?php ?>
    <ul class="min-menu">
   <!-- nếu có parents page -->
   <?php if ($theParents) {
        $childrenOf = $theParents;
    } else {
        $childrenOf = get_the_ID();
    }
    wp_list_pages(array(
        "child_of" => $childrenOf,
        "title_li" => null,
    ));

    ?>
    </ul>
     <h3><?php the_title()?></h3>
     <p><?php the_content()?></p>
     </article>
<?php }

get_footer();

?>
