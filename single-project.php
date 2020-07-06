<head>
    <?php
    wp_head();
    get_template_part('template-parts/header');
    ?>

    <main class="container">
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post(); ?>
                <div class="post">
                    <h1 class="post__title"><?php the_title(); ?></h1>
                    <div class="post__content"><?php the_content(); ?></div>
                </div>

                <?php if (have_rows('portfolio_gallery')) : ?>
                    <div class="owl-carousel owl-theme margin--lg">
                        <?php while (have_rows('portfolio_gallery')) : the_row(); ?>
                            <div class="carousel__item">
                                <?php $image = get_sub_field('image');
                                if (!empty($image)) : ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_attr($image['title']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?> </div>
                        <?php endwhile;
                    else : ?>
                        <div class="margin-bottom--md"></div>
                    <?php endif; ?>
                    </div>
            <?php
            endwhile;
        endif; ?>

            <?php $portfolio_items = new WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => 2,
                'post_status' => 'publish',
                'orderby' => 'rand',
                'order' => 'ASC',
                'post__not_in' => array(get_the_ID())
            )); ?>

            <?php if ($portfolio_items > 0) : ?>
                <div class="more-projects-container">
                    <h3>Meer projecten</h3>
                    <ul class="archive-posts archive-posts--<?php echo get_post_type(); ?>">
                        <?php while ($portfolio_items->have_posts()) : $portfolio_items->the_post(); ?>
                            <li class="archive-post archive-post--<?php echo get_post_type(); ?>">
                                <a href="<?php the_permalink(); ?>" class="archive-post__link">
                                    <?php the_post_thumbnail('large', ['class' => 'archive-post__image']); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <a href="<?php echo site_url('projects'); ?>" class="link margin-top--md">Bekijk portfolio</a>
                </div>
            <?php endif; ?>

            <?php wp_reset_query(); ?>

    </main>

    <?php get_template_part('template-parts/footer'); ?>