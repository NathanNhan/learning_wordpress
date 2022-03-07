<?php 
/** 
 * Plugin Name: Custom post type
 */


function ideapro_custom_post_type () {
    register_post_type('Example', array(
        'labels' => array(
            "name" => __('Examples'),
            "singular_name" => __('Example'),
            "add_new_item" => __('Add new Examples'),
            "add_new" => __('Add new Examples'),
            "edit_item" => __('Edit Example'),
            "search_items" => __('Search Examples')
        ),
        'public' => true,
        'menu_position' => 5,
        'exclude_from_search' => true,
        'register_meta_box_cb' => 'example_metabox',
        'has_archive' => false,
        'supports' => array('title','editor','thumbnail'),
    ) );

}
add_action('init','ideapro_custom_post_type');

function example_metabox() {
   add_meta_box( 'example_meta_box_custom_field', 'meta_box_custom_field', 'example_meta_display', 'example', 'normal');
}
add_action('add_meta_boxes','example_metabox');


function example_meta_display () {
    global $post;
    $sub_title = get_post_meta($post->ID,'subtitle',true);
    $author_name = get_post_meta($post->ID, 'authorName',true);
   ?>
    <label>Sub title</label>
    <input type="text" name="subtitle" class="widefat" placeholder="Sub title..." value="<?php print $sub_title; ?>"/>
    <br/><br/>
    <label>Author Name</label>
    <input type="text" name="authorName" class="widefat" placeholder="Author Name..." value="<?php print $author_name; ?>"/>

   <?php
}


function example_posttype_save ($post_id) {
    $is_auto_save = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    if($is_auto_save || $is_revision){
        return;
    };
    $post = get_post($post_id);
    if($post->post_type = 'example'){
        /* save the custom field data */
        if(array_key_exists('subtitle',$_POST)){
            update_post_meta($post_id, 'subtitle', $_POST['subtitle']);
        }

        if(array_key_exists('authorName',$_POST)){
            update_post_meta($post_id, 'authorName', $_POST['authorName']);
        }

    }

}
add_action('save_post','example_posttype_save');


function get_example_post_type () {
    $args = array (
        'posts_per_page' => -1,
        'post_type' => 'example',
    );
    $ourPosts = get_posts($args);
    $content = '';
    foreach($ourPosts as $key=>$val) {
        
        $sub_title = get_post_meta($val->ID,'subtitle',true);
        $author_name = get_post_meta($val->ID, 'authorName',true);
        $content .= $val->ID . '<br/>';
        $content .= '<strong><a href="' . get_permalink($val->ID) .'">' . $val->post_title . '</a></strong><br/>';
        if($sub_title != ''){$content .= $sub_title . '<br/>';}
        $content .= $val->post_content . '<br/>';
        if($author_name != ''){$content .= '<em> Author: ' . $author_name . '</em><hr/>';}
    }
    return $content;

}
add_shortcode('get_example_posts', 'get_example_post_type');