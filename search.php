<?php
/**
 * The front page template
 */

get_header();
?>

<section class='pageHeader'>
        <div class="pageHeader__content">
        <img src="<?php echo get_stylesheet_directory_uri().'/assets/img/general_bg.jpg'; ?>" alt="Radio Accent">
            <div class="pageTitle">
                <div class="container">
                    <h2>Resultaten voor: <?php echo get_search_query(); ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container newsPosts withPadding">

        <div class="newsPosts__holder">
            <?php
            if ( have_posts() ) :
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                ?>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_title(get_the_ID()))); ?>" data-post-id='<?php the_ID(); ?>' data-type='preview-article'>
                
                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'medium') ?>" alt="<?php print(get_the_title()) ?>" loading="lazy">

                        <h5><?php $cats = get_the_category(); print($cats[0]->name); ?></h5>
                        <h3><?php print(get_the_title()) ?></h3>
                        <p><?php print(get_the_excerpt()) ?></p>

                    </a>
                <?php
                endwhile;
            else:
                ?>
                <p>We hebben overal gezocht maar niets gevonden.</p>
                <?php
            endif;
            ?>
        </div>

        <div class="pagination">
            <?php
            //call pagination function
            echo paginate_links();

            // Reset postdata
            wp_reset_postdata();
            ?>
        </div>

    </section>

<?php get_footer(); ?>