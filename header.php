
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">

        <div class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                WARHAMMER 40,000
            </a>
        </div>

        <nav class="site-navigation"
             aria-label="Hoofdnavigatie">

            <ul>
                <?php
                wp_list_pages(array(
                    'title_li' => '',
                ));
                ?>
            </ul>

        </nav>

    </div>
</header>
