<?php
/**
 * The front page template
 */

get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="newsItemSingle container topMargin">

        <div class="newsItemSingle--holder">
            <!-- Meta info -->
            <h3 class="newsItemSingle--title"><?= get_the_title( get_option('page_for_posts', true)) ?></h3>
            <h4 class="newsItemSingle--subline">Gepost door <?= get_the_author(); ?> op <?php the_time('j F Y - G:i'); ?></h4>
            <?php
            // get the tags for this article
            $categories = get_the_category();
            if($categories):
            ?>
            <ul class="newsItemSingle--tags">
                <?php
                foreach($categories as $category):
                ?>
                <li><a href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a></li>
                <?php
                endforeach;
                ?>
            </ul>
            <?php
            endif;
            ?>
        </div>
    </section>

    <!-- Cover -->
    <figure class="newsItemSingle--cover">
        <?php the_post_thumbnail('large'); ?>
    </figure>

    <section class="newsItemSingle container bottomMargin">
        <div class="newsItemSingle--holder">
            <!-- Content -->
            <?php
                the_content();
            ?>

            <!-- Share -->
            <h5 class="newsItemSingle--share">Deel dit bericht</h5>
            <?php get_template_part( 'parts/share', 'top' ); ?>
        </div>

    </section>
        
<?php endwhile; ?>
<?php endif; ?>

<?php get_template_part( 'parts/songHistory', 'top' ); ?>
<?php get_footer(); ?>