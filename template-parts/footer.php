<footer>
    <div class="cta-container margin-bottom--md">
        <div class="container flex flex-direction--column align-items--center">
            <h2 class="cta__text">Heeft mijn portfolio uw interesse gewekt?</h2>
            <a href="<?php echo site_url('contact') ?>" class="button button--cta">Neem contact op</a>
        </div>
    </div>
    <div class="container">
            <div class="social__icons">
                <a href="https://www.linkedin.com" class="social__icon">
                    <img src="<?php echo get_theme_file_uri('/assets/img/icons/linkedin.svg') ?>" alt="Deze link leidt naar mijn persoonlijke LinkedIn-pagina." class="social__icon-image">
                </a>
                <a href="https://www.github.com" class="social__icon">
                    <img src="<?php echo get_theme_file_uri('/assets/img/icons/github.svg') ?>" alt="Op mijn Github heeft u inzicht in hoe ik mijn thema's opzet." class="social__icon-image">
                </a>
                <a href="<?php echo site_url('contact-details') ?>" class="social__icon">
                    <img src="<?php echo get_theme_file_uri('/assets/img/icons/file-text.svg') ?>" alt="Wilt u graag snel contact opnemen? Dat kan! Op deze pagina vindt u mijn contactgevens." class="social__icon-image">
                </a>
            </div>
        </div>
            Copyright <?php echo date('Y'); ?> &mdash; Tom Graafmans
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>