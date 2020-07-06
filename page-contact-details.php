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
                    <div class="contact-details-container">
                        <div class="contact-details__header">
                            <h2 class="contact-details__name">Tom Graafmans</h2>
                            <p class="contact-details__job-title">Junior WordPress-developer</p>
                        </div>
                        <div class="contact-details__body">
                            <ul class="contact-details__list">
                                <li class="contact-details__item">
                                    <span class="dashicons dashicons-smartphone"></span>
                                    <a href="callto:+31622785388">+31 62 27 85 388</a>
                                </li>
                                <li class="contact-details__item">
                                    <span class="dashicons dashicons-email"></span>
                                    <a href="mailto:graafmans.tom@gmail.com">graafmans.tom@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
        endif; ?>
    </main>

    <?php get_template_part('template-parts/footer'); ?>