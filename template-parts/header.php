</head>
<header>
    <div class="container">
        <div class="navbar">
            <?php get_template_part('template-parts/components/logo'); ?>
            <?php get_template_part(
                'template-parts/components/navigation'
            ); ?>
        </div>
    </div>
</header>
<div class="container"><?php custom_breadcrumbs(); ?></div>

<body <?php body_class(); ?>>