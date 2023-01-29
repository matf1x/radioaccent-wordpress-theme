<?php
/**
 * The front page template
 */

get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <section class='pageHeader'>
        <div class="pageHeader__content">
            <img src="https://img.nieuwsblad.be/Nc8rcLz4XHeLqzf5LXrmqg6Uhq0=/960x640/smart/https%3A%2F%2Fstatic.nieuwsblad.be%2FAssets%2FImages_Upload%2F2018%2F07%2F10%2FRadio_Accent.jpg" alt="Radio Accent">
            <div class="pageTitle">
                <div class="container">
                    <h2><?= get_the_title( get_option('page_for_posts', true)) ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container pageContent withPadding">
        <?php the_content(); ?>
        <?php get_template_part( 'parts/share', 'top' ); ?>
    </section>

<?php endwhile; ?>
<?php endif; ?>
<?php get_template_part( 'parts/songHistory', 'top' ); ?>
<?php get_footer(); ?>