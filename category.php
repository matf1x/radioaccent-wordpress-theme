<?php
/**
 * The front page template
 */

get_header();

// Get the current selected category
$current_page = get_queried_object();
$category     = $current_page->slug;
?>
<section id="head-news" class="latest-posts container">

    <h2><?php single_cat_title(); ?></h2>

    <div class="latest-posts__wrapper">
        
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

    <div class="pagination">
        <?php
        //call pagination function
        echo paginate_links( $query );

        // Reset postdata
        wp_reset_postdata();
        ?>
    </div>

</section>
<?php get_template_part( 'parts/lastsongs', 'top' ); ?>
<?php get_footer(); ?>