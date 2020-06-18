<div class="hamburger js-hamburger">
    <img class="hamburger__icon" src="<?php echo get_theme_file_uri('assets/img/icons/hamburger.svg'); ?>" alt="<?php bloginfo('name'); ?>">
</div>

<div class="navmenu js-navmenu">
    <?php wp_nav_menu([
        'theme_location' => 'header-menu',
        'container_class' => 'navigation-container',
        'items_wrap' => '<nav class="navigation">%3$s</nav>',
    ]); ?>
</div>