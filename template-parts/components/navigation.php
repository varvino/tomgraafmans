<div class="hamburger js-hamburger">
    <img class="hamburger__icon" src="<?php echo get_theme_file_uri('assets/img/icons/utility/hamburger.svg'); ?>" alt="<?php bloginfo('name'); ?>">
</div>

<nav class="navmenu js-navmenu">
    <?php wp_nav_menu([
        'theme_location' => 'header-menu',
        'container_class' => 'navigation-container',
        'items_wrap' => '<ul class="navigation js-navigation">%3$s</ul>',
    ]); ?>
</nav>