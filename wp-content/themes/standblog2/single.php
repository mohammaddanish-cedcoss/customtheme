<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blog
 */

get_header();
?>
  <!-- Banner Starts Here -->
  <div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Post Details</h4>
              <h2>Single blog post</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <!-- Banner Ends Here -->
	<section class="call-to-action">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-content">
						<div class="row">
							<div class="col-lg-8">
								<span>Stand Blog HTML5 Template</span>
								<h4>Creative HTML Template For Bloggers!</h4>
							</div>
							<div class="col-lg-4">
								<div class="main-button">
									<a rel="nofollow" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_parent">Download Now!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
			<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				// the_post_navigation(
				// 	array(
				// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'blog' ) . '</span> <span class="nav-title">%title</span>',
				// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'blog' ) . '</span> <span class="nav-title">%title</span>',
				// 	)
				// );

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
          </div>
          <div class="col-lg-4">
		        <?php get_sidebar(); ?>
          </div>
        </div>
      </div>
    </section>
	

<?php
get_footer();
