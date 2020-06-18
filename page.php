<head>
    <?php
    wp_head();
    get_template_part('template-parts/header');
    ?>

    <main class="container">
        <h1><?php the_title(); ?></h1>
    </main>

    <?php get_template_part('template-parts/footer'); ?>