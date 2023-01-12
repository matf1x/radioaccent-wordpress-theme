<?php
/**
 * The front page template
 */

get_header(); ?>

<section class="hero">

    <div class="hero--image">
        <img src="<?php echo get_stylesheet_directory_uri().'/assets/img/wetteren-algemeen.jpg'; ?>" alt="">
    </div>

    <div class="hero--container container">

        <div class="hero--container__info">
            <h2>Jouw Radio</h2>
            <h3>Jouw Ritme</h3>
        </div>
        <?php get_template_part( 'parts/widgets/player', 'top' ); ?>

    </div>

</section>

<section class="dabPlus" id="dabPlus">
    <a href="https://www.radioaccent.be/radio-accent-nu-ook-via-dab/" class="dabPlus--text container">
        <div>Radio Accent is nu ook te beluisteren via <span>DAB+</span></div>
        <button>Meer info <i class="fas fa-arrow-right"></i></button>
    </a>
</section>

<section id="head-news" class="latest-posts container">

    <h2>Laatste regionieuws</h2>

    <div class="latest-posts__wrapper">
        <?php
        $the_query = new WP_Query( array( 
            'category_name' => 'Regio', 
            'posts_per_page' => 12 
        ) ); 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
        <a class="newsItem" id="post-<?php the_ID(); ?>" href="<?php echo esc_url( get_permalink( get_page_by_title(get_the_ID()))); ?>">
            <?php the_post_thumbnail('large'); ?>
            <div class="newsItem--category cat-<?php $cats = get_the_category(); print(strtolower(str_replace(' ', '-',$cats[0]->name))); ?>"><?php $cats = get_the_category(); print($cats[0]->name); ?></div>
            <div class="newsItem--content">
                <h3 class="title"><?php print(get_the_title()) ?></h3>
                <p class="excerpt"><?php print(get_the_excerpt()) ?></p>
            </div>
        </a>
            <?php
            endwhile;
        endif;
        ?>

    </div>
    <div class="btn-holder">
        <a href="/category/regio/">Meer regionieuws <i class="fas fa-arrow-right"></i></a>
    </div>
</section>

<?php get_template_part( 'parts/songHistory', 'top' ); ?>
<?php get_footer(); ?>