
<?php 

/** 
 * Plugin Name: Idea pro plugin
 * Description: This is my first plugin
 * Author: Nathan
 * Version: 1.0
 */
function idea_pro_example () {
    $content = "This is an example plugin";
    $content .= '<div>This is my div</div>';
    $content .= '<p>This is my paragraph</p>';
    return $content;
}
add_shortcode("example", "idea_pro_example");

function idea_pro_admin_menu_options () {
  add_menu_page('Header and Footer Scripts', 'Site Script', 'manage_options', 'ideapro_admin_menu', 'ideapro_scripts_page', '',  200);
}
add_action('admin_menu','idea_pro_admin_menu_options');

function ideapro_scripts_page () {
    
    if(array_key_exists('submit_scripts_update',$_POST)){
        update_option('ideapro_header_script', $_POST['header_scripts']);
        update_option('ideapro_footer_script', $_POST['footer_scripts']);

        ?>
            <div id="setting-error-settings-updated" class="updated_settings_error notice is-dismissible"><strong>Setting have been saved.</div>

        <?php
    }


    $header_script = get_option('ideapro_header_script', 'none' );
    $footer_script = get_option('ideapro_footer_script', 'none' );
    ?>
        <div class="wrap">
            <h2>Update Scripts</h2>
            <form method="POST" action="">
                <label for="header_script">Header Script</label>
                <textarea name="header_scripts" class="large-text"><?php print $header_script ?></textarea>
                <label for="footer_script">Footer Script</label>
                <textarea name="footer_scripts" class="large-text"><?php print $footer_script ?></textarea>
                <input type="submit" name="submit_scripts_update" value="UPDATE SCRIPTS" class="button button-primary"/>

            </form>
        </div>

    <?php
}


// show up
function display_header_script () {
    $header_script = get_option('ideapro_header_script', 'none' );
    print $header_script;
}
add_action('wp_head','display_header_script');


function display_footer_script () {
    $footer_script = get_option('ideapro_footer_script', 'none' );
    print $footer_script;
}
add_action('wp_footer','display_footer_script');



//submit form
function ideapro_form () {
    $content = '';
    $content .= '<form method="POST" action="http://learnwp.local/thank-you/">';
    $content .= '<input type="text" name="full_name" placeholder="Your full Name"/>';
    $content .= '<br/>';

    $content .= '<input type="text" name="email_address" placeholder="Email Address"/>';
    $content .= '<br/>';

    $content .= '<input type="text" name="phone_number" placeholder="Phone number"/>';
    $content .= '<br/>';

    $content .= '<textarea type="text" name="comments" placeholder="Give us your comments"></textarea>';
    $content .= '<br/>';

    $content .= '<input type="submit" name="ideapro_submit_form" value="SUBMIT YOUR INFOMATION"/>';



    $content .= '</form>';

    return $content;

}
add_shortcode('contact_form', 'ideapro_form');

function set_html_content_type () {
    return 'text/html';
}


function ideapro_form_capture () {
    global $wpdb, $post;
    if(array_key_exists('ideapro_submit_form',$_POST)){
        $to = "trongnhan8150@gmail.com";
        $subject = "Idea Pro Example site form Submission";
        $body = '';
        $body .= 'Name: '.$_POST['full_name']. '<br/>';
        $body .= 'Email'. $_POST['email_address'] . '<br/>';
        $body .= 'Phone:' . $_POST['phone_number'] . '<br/>';
        $body .= 'Comments:' . $_POST['comments'] . '<br/>';
        add_filter('wp_mail_content_type','set_html_content_type' );
        wp_mail($to, $subject, $body);
        remove_filter('wp_mail_content_type','set_html_content_type');
    }
    //Add data into database

    $insertData = $wpdb->get_results(" INSERT INTO wp_form_submissions (data) VALUES ('" . $body . "')");

    //Array of arguments for inserting a new comment. 
    // $commentdata = array( 
    //     'comment_approved' => 1, 
    //     'comment_author_IP' => $_SERVER['REMOTE_ADDR'], 
    //     'comment_content' => $body, 
    //     'comment_date' => current_time('mysql'), 
    //     'comment_post_ID' => $post->ID, 
    // ); 
      
    //NOTICE! Understand what this does before running. 
    // $result = wp_insert_comment($commentdata); 

}
add_action('wp_head','ideapro_form_capture');






?>