<?php
/**
 * The front page template
 */

get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="container" data-type="news-article">

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
        <h3><?= get_the_title( get_option('page_for_posts', true)) ?></h3>
        
        <div class="articleInfo">
            <div class="author">
                <i class="fa-solid fa-at"></i> <?= get_the_author(); ?><br />
                <i class="fa-regular fa-clock"></i> <?php the_time('j F Y - G:i'); ?>
            </div>
            <div class="share">
                <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink() . ' @radioaccentbe'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink() ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="mailto:?&subject=<?= get_the_title( get_option('page_for_posts', true)) ?>&body=<?= get_the_excerpt() ?> - <?= get_permalink() ?>"><i class="fa-solid fa-envelope-open-text"></i></a>
                <a href="#" data-type='copy-link' data-clipboard-url='<?= get_permalink() ?>' data-clipboard-success="Link gekopieerd" data-clipboard-error="Oeps, er is iets fout gelopen"><i class="fa-solid fa-link"></i></a>
            </div>
        </div>

        <img src="<?= get_the_post_thumbnail_url(get_the_ID(),'full') ?>" alt="<?php print(get_the_title()) ?>" class="newsHeader" loading="lazy">

        <?php the_content(); ?>

    </section>
        
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>