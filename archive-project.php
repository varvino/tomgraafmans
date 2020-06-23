<head>
    <?php
    wp_head();
    get_template_part('template-parts/header');
    ?>

    <main class="container">
        <h1><?php post_type_archive_title(); ?></h1>
        <p class="archive-description">Op deze pagina vindt u al mijn projecten.</p>

        <?php if (have_posts()) : ?>
            <ul class="archive-posts archive-posts--<?php echo get_post_type(); ?>">
                <?php while (have_posts()) : the_post(); ?>
                    <li class="archive-post archive-post--<?php echo get_post_type(); ?>">
                        <a href="<?php the_permalink(); ?>" class="archive-post__link">
                            <?php the_post_thumbnail('large', ['class' => 'archive-post__image']); ?>
                        </a>
                    </li>
                <?php
                endwhile; ?>
            </ul>
        <?php endif; ?>
    </main>

    <?php get_template_part('template-parts/footer'); ?>