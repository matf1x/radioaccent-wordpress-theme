<?php
/**
 * The front page template
 */

get_header(); ?>

<section class="hero">

    <div class="hero--image">
        <img src="<?php echo esc_url( get_theme_mod( 'hero_background_image' ) ); ?>" alt="Radio Accent - Wetteren">
    </div>

    <div class="hero--container container">

        <div class="hero--container__info">

            <!-- Main title -->
            <h2><?= get_theme_mod( 'hero_slogan_text_1' ) ?></h2>
            <h3><?= get_theme_mod( 'hero_slogan_text_2' ) ?></h3>

            <?php
            if(get_theme_mod( 'hero_checkbox_button' )) {
                echo '
                <a href="' . get_theme_mod( 'hero_url_button' ) . '">' . get_theme_mod( 'hero_text_button' ) . ' <i class="fa-solid fa-arrow-right"></i></a>
                ';
            }
            ?>

        </div>
        <?php get_template_part( 'parts/widgets/player', 'top' ); ?>

    </div>

</section>

<section data-type='announcement-bar'>
    <div class="container">
        <a href="https://www.radioaccent.be/radio-accent-nu-ook-via-dab/" class="dabPlus--text container">
            <div>Radio Accent is nu ook te beluisteren via <span>DAB+</span></div>
            <button>Meer info <i class="fas fa-arrow-right"></i></button>
        </a>
    </div>
</section>

<section class="container newsPosts">

    <h2 class='sectionTitle'>Laatste regionieuws</h2>

    <div class="newsPosts__holder">
        <?php
        $the_query = new WP_Query( array( 
            'category_name' => 'Regio', 
            'posts_per_page' => 12 
        ) ); 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title(get_the_ID()))); ?>" data-post-id='<?php the_ID(); ?>' data-type='preview-article'>
                
                <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'medium') ?>" alt="<?php print(get_the_title()) ?>" loading="lazy">

                <h5><?php $cats = get_the_category(); print($cats[0]->name); ?></h5>
                <h3><?php print(get_the_title()) ?></h3>
                <p><?php print(get_the_excerpt()) ?></p>

            </a>
            <?php
            endwhile;
        endif;
        ?>

    </div>

    <div data-type="btn-more" data-color="blue">
        <a href="/category/regio/">Meer regionieuws <i class="fas fa-arrow-right"></i></a>
    </div>

</section>

<?php get_template_part( 'parts/songHistory', 'top' ); ?>
<?php get_footer(); ?>