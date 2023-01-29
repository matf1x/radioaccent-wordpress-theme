<?php
/**
 * The front page template
 */

get_header();

// Get the current selected category
$current_page = get_queried_object();
$category     = $current_page->slug;
?>

    <section class='pageHeader'>
        <div class="pageHeader__content">
            <img src="https://img.nieuwsblad.be/Nc8rcLz4XHeLqzf5LXrmqg6Uhq0=/960x640/smart/https%3A%2F%2Fstatic.nieuwsblad.be%2FAssets%2FImages_Upload%2F2018%2F07%2F10%2FRadio_Accent.jpg" alt="Radio Accent">
            <div class="pageTitle">
                <div class="container">
                    <h2><?php single_cat_title(); ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container newsPosts withPadding">

        <div class="newsPosts__holder">
            <?php
            // Check if page is paged
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

            // Get the correct posts
            $query = new WP_Query( 
                array(
                    'paged'         => $paged, 
                    'category_name' => $category,
                    'order'         => 'desc',
                    'post_type'     => 'post',
                    'post_status'   => 'publish',
                )
            );

            // Loop over posts
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
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

        <div class="pagination">
            <?php
            //call pagination function
            echo paginate_links( $query );

            // Reset postdata
            wp_reset_postdata();
            ?>
        </div>

    </section>

<?php get_template_part( 'parts/songHistory', 'top' ); ?>
<?php get_footer(); ?>