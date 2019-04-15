<?php

add_filter('wp_nav_menu', function ($nav_menu, $args) {
    if ($args->theme_location != 'footer_1'
        && $args->theme_location != 'footer_2'
    ) {
        return $nav_menu;
    }

    ob_start();
    ?>
    <!-- footer-info-area start -->
    <div class="footer-info-area">
        <div class="footer-title">
            <h3><?php echo $args->menu->name ?></h3>
        </div>
        <div class="desc_footer">
            <?php echo $nav_menu ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}, 10, 2);