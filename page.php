<?php
/**
 * The front page template
 */

get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <section class='pageHeader'>
        <div class="pageHeader__content">
            <img src="<?php echo get_stylesheet_directory_uri().'/assets/img/general_bg.jpg'; ?>" alt="Radio Accent">
            <div class="pageTitle">
                <div class="container">
                    <h2><?= get_the_title( get_option('page_for_posts', true)) ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container pageContent withPadding">
        <?php the_content(); ?>
    </section>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>