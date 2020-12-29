<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="all-blog-posts">
	<div class="row">
		<div class="col-lg-12">
			<div class="blog-post">
				<div class="blog-thumb">
				<?php if ( has_post_thumbnail() ) { 
				blog_post_thumbnail();
				} ?>
				</div>
				<div class="down-content">
					<span><?php the_category(', '); ?></span>
					<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h4 class="entry-title">', '</h4>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<ul class="post-info">
								<li><a href="#"><?php the_author(); ?></a></li>
								<li><a href="#"><?php the_date(); ?></a></li>
								<li><a href="#"><?php comments_number( ); ?></a></li>
							</ul>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					</header><!-- .entry-header -->
					<div class="entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blog' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog' ),
							'after'  => '</div>',
						)
					);
					?>
					</div><!-- .entry-content -->
					<div class="post-options">
					<div class="row">
						<div class="col-6">
							<footer class="entry-footer">
								<?php blog_entry_footer(); ?>
							</footer><!-- .entry-footer -->
						</div>
						<div class="col-6">
							<ul class="post-share">
							<li><i class="fa fa-share-alt"></i></li>
							<li><a href="#">Facebook</a>,</li>
							<li><a href="#"> Twitter</a></li>
							</ul>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
		<?php 
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'blog' ) . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'blog' ) . '</span> <span class="nav-title">%title</span>',
			)
		);
		?>
		</div>
		<?php 
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;?>
	</div>
	</div>
</article>
<!-- #post-<?php the_ID(); ?> -->
