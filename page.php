<?php
/**
 * The front page template
 */

get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <section id="pageContent" class="latest-posts container">
        <h2><?= get_the_title( get_option('page_for_posts', true)) ?></h2>

        <div class="pageContent">
            <?php the_content(); ?>
            <?php get_template_part( 'parts/share', 'top' ); ?>
        </div>

    </section>

<?php endwhile; ?>
<?php endif; ?>
<?php get_template_part( 'parts/lastsongs', 'top' ); ?>
<?php get_footer(); ?>