<head>
    <?php
    wp_head();
    get_template_part('template-parts/header');
    ?>

    <main class="container">
        <h1><?php post_type_archive_title(); ?></h1>

        <?php if (have_posts()) : ?>
            <ul class="archive-posts">
                <?php while (have_posts()) : the_post(); ?>
                    <li class="archive-post">
                        <h3 class="archive-post__title"><?php the_title(); ?></h3>
                        <?php if (the_excerpt()) : ?>
                            <p class="archive-post__content"><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="link--archive-post">Bekijk</a>
                    </li>
                <?php
                endwhile; ?>
            </ul>
        <?php endif; ?>
    </main>

    <?php get_template_part('template-parts/footer'); ?>