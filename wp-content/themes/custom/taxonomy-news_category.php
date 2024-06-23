<?php
/**
 * Taxonomy Template: Newss Category
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Avijit Mondal
 */
get_header();
$taxonomy = get_queried_object();
// print_r($taxonomy);
?>

 <!-- Header Start -->
 <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php the_title();?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="<?php echo site_url();?>">Home</a></li>
                            <!-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> -->
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $taxonomy->name;?></li>
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
                <h6 class="section-title bg-white text-center text-primary px-3">Blogs</h6>
                <h1 class="mb-5"><?php echo $taxonomy->name;?></h1>
            </div> 
            <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <?php get_sidebar();?>
                        </div>
                    </div>
                    <?php 
                    $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'news'
                    );
                    $args = array(
                        'post_type' => 'news',
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news_category',
                                'field' => 'term_id',
                                'terms' => $taxonomy->term_id,
                            ),
                        ),
                    );                        
                    $query = new WP_Query( $args );
                    // echo "<pre>";
                    // print_r($query);
                    // echo "</pre>";
                    if($query->have_posts()){
                        while($query->have_posts()){
                            $query->the_post();
                            // print_r($query);
                            ?>
                                               <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url();?>" alt="" height="300" width="300">
                            </div>
                            <!-- <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div> -->
                            <div class="text-center p-4">
                                <h5 class="mb-0"><?php the_title();?></h5>
                                <small><?php echo get_the_date();?></small>
                                &nbsp <a href="<?php the_permalink();?>"><button type="button" class="btn btn-primary">Read More</button></a>
                            </div>
                        </div>
                    </div>
                       <?php
    
                        }
                    }
                ?>
                    <?php
                    // get_template_part( 'template-parts/content', 'page' );

                    // // If comments are open or we have at least one comment, load up the comment template.
                    // if ( comments_open() || get_comments_number() ) :
                    //     comments_template();
                    // endif;

		        // endwhile; // End of the loop.
                ?>
                <?php echo wp_pagenavi(); ?>
            </div>
        </div>
    </div>
    <!-- Team End -->

<?php
get_footer();
?>
