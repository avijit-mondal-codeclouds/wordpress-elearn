<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package custom
 */

get_header();
the_post(); /*
if the_author() is not working then the_post() on header;
*/
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
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php the_title();?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

	<!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="<?php echo get_the_post_thumbnail_url();?>" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Blog</h6>
                    <h1 class="mb-4"><?php the_title(); ?></h1>
                    <p class="mb-4"><?php the_content();?></p>
                    <!-- <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p> -->
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i><?php echo get_the_date();?></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>By <?php the_author(); ?></p>
                        </div>
                    </div>
                    <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> -->
                </div>
            </div>
        </div>
		<div class="container">
			<?php 
			// Comment_form();
			comments_template();
			?>
		</div>
    </div>
    <!-- About End -->

	<!-- <main id="primary" class="site-main">

		<?php
		// while ( have_posts() ) :
		// 	the_post();

		// 	get_template_part( 'template-parts/content', get_post_type() );

		// 	the_post_navigation(
		// 		array(
		// 			'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'custom' ) . '</span> <span class="nav-title">%title</span>',
		// 			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'custom' ) . '</span> <span class="nav-title">%title</span>',
		// 		)
		// 	);

		// 	// If comments are open or we have at least one comment, load up the comment template.
		// 	if ( comments_open() || get_comments_number() ) :
		// 		comments_template();
		// 	endif;

		// endwhile; // End of the loop.
		?>

	</main>#main -->

<?php
// get_sidebar();
get_footer();
