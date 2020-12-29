<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog
 */

?>
	<footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'new-menu',
              'container' => 'ul',
              'menu_class'   => 'social-icons'
            )
          );
          ?>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
			  <p>Copyright <?php echo date('Y'); ?> 
			  	<a href="<?php echo esc_url( __( bloginfo( 'url' ), 'blog' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( bloginfo( 'name' ) ), 'WordPress' );
				?>
				</a> 
		</div>
          </div>
        </div>
      </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
