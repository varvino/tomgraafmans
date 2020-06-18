<?php
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if (trim($_POST['email']) === '') {
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if (trim($_POST['message']) === '') {
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $message = stripslashes(trim($_POST['message']));
        } else {
            $message = trim($_POST['message']);
        }
    }

    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = get_bloginfo('name') . ' — ' . 'Contact Formulier Bericht';
        $body = "Naam: $name \n\nEmail: $email \n\nBericht: $message";
        $headers = 'Afzender: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Versturen naar: ' . $email;

        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;

        if ($emailSent = true);
        if (isset($_POST['submitform'])); { ?>
            <script type="text/javascript">
                window.location = "<?php echo site_url('bedankt'); ?>";
            </script>
    <?php }
    } ?>
<?php } ?>

<?php if ($hasError) : ?>
    <div class="container">
        <div class="alert alert--warning" role="alert">
            De informatie die u heeft ingevoerd is niet correct, probeer het nogmaals.
        </div>
    </div>
<?php endif; ?>