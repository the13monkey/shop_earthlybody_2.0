<?php

get_header();

global $wp_query;

?>

<div class="container">

    <div class="row justify-content-center mt-5 mb-lg-0">

        <h3 class="text-uppercase font-weight-light text-center">Search Results for <span class="font-weight-bold"><?php the_search_query() ?></span></h3>

    </div>

    <div class="row justify-content-center">

        <p class="font-weight-normal"><?php echo $wp_query->found_posts ?> Results Found</p>

    </div>

    <hr>

    <div class="row mb-lg-5">

        <div class="col col-12">

        <?php if (have_posts()) { ?>

            <ul class="list-unstyled search-results">

            <?php while ( have_posts() ) { the_post(); ?>

            <li class="media mb-3">
                <a href="<?php the_permalink(); ?>" class="d-flex flex-column flex-md-row align-items-center" style="text-decoration: none;">
                    <?php $featured_img_url = get_the_post_thumbnail_url( get_the_ID() ); ?>

                    <img class="mr-3" src="<?php echo $featured_img_url; ?>" alt="Generic placeholder image" style="width:150px; height:150px;">

                    <div class="media-body text-dark text-center text-md-left mt-3 mt-md-0">
                        <h5 class="mt-0 mb-1 text-dark">
                            <?php the_title();  ?>
                        </h5>
                        <?php echo substr(get_the_excerpt(), 0,180); ?>
                    </div>
                </a>
            </li>

            <?php } ?>

            </ul>

            <?php } else {

                echo "No results found.";

            }
            ?>

        </div>

    </div>

    <div class="row">

        <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>

    </div>

</div>

<?php get_footer(); ?>