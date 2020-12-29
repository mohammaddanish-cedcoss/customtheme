<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<div class="col-lg-12">
			<div class="sidebar-item comments">
				<div class="sidebar-heading">
					<h2>
					<?php
					$blog_comment_count = get_comments_number();
					if ( '1' === $blog_comment_count ) {
						printf(
							/* translators: 1: title. */
							esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'blog' ),
							'<span>' . wp_kses_post( get_the_title() ) . '</span>'
						);
					} else {
						printf( 
							/* translators: 1: comment count number, 2: title. */
							esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $blog_comment_count, 'comments title', 'blog' ) ),
							number_format_i18n( $blog_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'<span>' . wp_kses_post( get_the_title() ) . '</span>'
						);
					}
					?>
					</h2><!-- .comments-title -->
				</div>
				<div class="content">
					<?php the_comments_navigation(); ?>

					<ul class="comment-list">
						<?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
						
					</ul><!-- .comment-list -->	
				</div>
			</div>
		</div>
		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'blog' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().  
	?>

	<div class="col-lg-12">
		<div class="sidebar-item submit-comment">
			<div class="sidebar-heading">
			<h2>Your comment</h2>
			</div>
			<div class="content">
			<form id="comment" action="#" method="post">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<fieldset>
						<input name="name" type="text" id="name" placeholder="Your name" required="">
						</fieldset>
					</div>
					<div class="col-md-6 col-sm-12">
						<fieldset>
						<input name="email" type="text" id="email" placeholder="Your email" required="">
						</fieldset>
					</div>
					<div class="col-md-12 col-sm-12">
						<fieldset>
						<input name="subject" type="text" id="subject" placeholder="Subject">
						</fieldset>
					</div>
					<div class="col-lg-12">
						<fieldset>
						<textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
						</fieldset>
					</div>
					<div class="col-lg-12">
						<fieldset>
						<button type="submit" id="form-submit" class="main-button">Submit</button>
						</fieldset>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<?php 
	comment_form();
	?>

</div><!-- #comments -->
