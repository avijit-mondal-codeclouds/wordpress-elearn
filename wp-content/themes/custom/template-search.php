<?php
/*
Template Name: Search Template
*/
get_header();

// Initialize the search variable
$searchPost = '';

if (isset($_GET['title'])) {
    $searchPost = sanitize_text_field($_GET['title']);
}

// Get the current page number
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// echo $paged;
?>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown"><?php the_title(); ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="<?php echo site_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page"><?php the_title(); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">News</h6>
            <h1 class="mb-5">Latest</h1>
        </div> 
        <form class="row gx-3 gy-2 align-items-center" method="GET">
            <div class="col-auto">
                <label class="visually-hidden" for="autoSizingInput">Name</label>
                <input type="text" class="form-control" id="autoSizingInput" name="title" placeholder="Search by name" value="<?php echo esc_attr($searchPost); ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <hr>
        <div class="row g-4">
            <?php 
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'news',
                's' => $searchPost,
                // 'posts_per_page'=>1,
                'paged' => $paged // Correctly pass the paged parameter
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" height="300" width="300">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0"><?php the_title(); ?></h5>
                                <small><?php echo get_the_date(); ?></small>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-3">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-12">
                    <?php wp_pagenavi(array('query' => $query)); ?>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-dark" role="alert">
                    No data found!
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<!-- Team End -->

<?php get_footer(); ?>
