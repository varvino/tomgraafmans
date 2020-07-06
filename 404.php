<head>
    <?php
    wp_head();
    get_template_part('template-parts/header');
    ?>

    <main class="container">
    <h1 class="text-align--center heading--xl">404</h1>
            <p class="text-align--center">Het lijkt er op dat deze pagina niet meer bestaat :(</p>
            <div class="flex justify-content--center">
                <a href="<?php echo site_url(); ?>" class="link button--secondary">Terug naar voorpagina</a>
            </div>
    </main>

    <?php get_template_part('template-parts/footer'); ?>
