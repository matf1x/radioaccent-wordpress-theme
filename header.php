<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta property="og:site_name" content="Radio Accent" />
	<meta property="og:locale" content="nl_BE" />
	<meta property="fb:app_id" content="527337407652304" />
	<meta property="og:type" content="website" />
	<?php if ( !is_home() ): ?>
	<meta property="og:url" content="<?= get_permalink() ?>" />
	<?php endif; ?>
	<?php if ( has_post_thumbnail() && !is_home() ): ?>
	<meta property="og:image" content="<?= the_post_thumbnail_url() ?>">
    <?php endif; ?>

    <!-- Title of page -->
    <title>
    <?php if(is_front_page()) {
        echo get_bloginfo( 'name' ) ;
        echo ' - ';;
        echo get_bloginfo( 'description' ) ;
    }else{
        wp_title( '|', true, 'right' ); 
     }
     ?></title>

    <!-- include the stylesheet -->
    <link rel="stylesheet" type="text/css" href="//use.fontawesome.com/releases/v6.2.0/css/all.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/dist/css/style.css'; ?>">
    <?php wp_head(); ?>

</head>
<body>

    <header>
        <div class="navigationBar">
            <div class="container navContainer" id="navigation">
                <div class="navContainer--mobileBtn" data-action="open-menu">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="navContainer--logo">
                    <a href="/"><img src="<?php echo get_stylesheet_directory_uri().'/assets/img/logo.png'; ?>" alt="logo-radio-accent" title="Radio Accent"></a>
                </div>
                <div class="navContainer--navigation" id="navigationContainer">
                    <?php get_template_part( 'parts/navigation', 'top' ); ?>
                </div>
                <div class="navContainer--search">
                    <i class="fas fa-search" data-action="open-search"></i>
                </div>
            </div>
        </div>

        <div class="searchBar" id="searchBar">
            <div class="container searchContainer">
                <form role="search" method="get" id="searchform" class="searchform" action="https://radioaccent.be/">
                    <input type="text" name="s" id="searchInput" placeholder="zoeken">
                    <button type="submit">Zoeken</button>
                </form>
            </div>
        </div>

        <!-- Send a message modal -->
        <?php get_template_part( 'parts/widgets/onairbar', 'top' ); ?>

    </header>