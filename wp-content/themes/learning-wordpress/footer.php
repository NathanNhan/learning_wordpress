<?php wp_footer(); ?>
<footer class="site-footer">
    <nav class="site-nav">
        <?php
          $args = array(
              'theme_location' => 'footer'
          )
        
        ?>
        <?php wp_nav_menu($args); ?>
    </nav>
    <p><?php bloginfo('name') ?> &copy; <?php echo Date('Y'); ?></p>
</footer>
</div>
</body>
</html>