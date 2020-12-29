<?php
/*
 * Template Name: HomePage
 *
 * @package Blog
 */
get_header();
?>
<!-- Banner Starts Here -->
   <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
        <?php 
        // the query
        $all_post = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>5)); ?>
        
        <?php if ( $all_post->have_posts() ) : 
            //the loop 
            while ( $all_post->have_posts() ) : $all_post->the_post(); ?>
           
            <!-- end of the loop -->
            <div class="item">
               <?php if ( has_post_thumbnail() ) { 
               blog_post_thumbnail();
               } else  { ?>
                              <?php } ?>
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>
                              <?php the_category(' | '); ?>
                            </span>
                        </div>
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                        <ul class="post-info">
                            <li><a href="#"><?php the_author(); ?></a></li>
                            <li><a href="#"><?php the_date(); ?></a></li>
                            <li><a href="#"><?php comments_number( ); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>    
              
            <?php endwhile; 
            wp_reset_postdata(); ?>
 
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
      </div>
    </div>
<!-- Banner Ends Here -->

<section class="call-to-action" >
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

<section class="blog-posts">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="all-blog-posts">
               <div class="row">
                    <?php 
                    // the query
                    $all_post= new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>4)); ?>
                    
                    <?php if ( $all_post->have_posts() ) : 
                        //the loop 
                        while ( $all_post->have_posts() ) : $all_post->the_post(); ?>
                    <div class="col-sm-6">
                     <div class="blog-post">
                        <div class="blog-thumb">
                        <?php if ( has_post_thumbnail() ) { 
                        the_post_thumbnail( get_the_ID(), 'full' );
                        } ?>
                        </div>
                        <div class="down-content">
                        <span><?php the_category(', '); ?></span>
                           <a href="<?php the_permalink(); ?>">
                              <h4><?php the_title(); ?></h4>
                           </a>
                           <ul class="post-info">
                                <li><a href="#"><?php the_author(); ?></a></li>
                                <li><a href="#"><?php the_date(); ?></a></li>
                                <li><a href="#"><?php comments_number( ); ?></a></li>
                           </ul>
                           <?php wp_kses_post( the_excerpt() ); ?>
                           <span class = "post-read-more">
                              <a itemprop = "url" href = "<?php the_permalink(); ?>" target = "_blank">
                              <?php echo esc_html__( 'Read more', 'theme-domain' ) ?>
                              </a>
                           </span> 
                           <div class="post-options">
                              <div class="row">
                                 <div class="col-6">
                                    <?php 
                                    $posttags = get_the_tags();
                                    if ($posttags) {
                                       $hasComma = false;
                                       echo '<ul class="post-tags"><li><i class="fa fa-tags"></i></li>';
                                       foreach($posttags as $tag) {
                                          if ($hasComma){ 
                                             echo ", "; 
                                          }
                                          echo  '<li><a href="'.esc_url( get_tag_link( $tag->term_id ) ).'">' .$tag->name.'</a></li> '; 
                                          $hasComma=true;
                                       }
                                       echo '</ul>';
                                    } ?>
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
                  <?php endwhile; ?>
                  <?php else : ?>
                  <p class = "no-blog-posts">
                  <?php esc_html_e('Sorry, no posts matched your criteria.', 'theme-domain'); ?> 
                  </p>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                  <div class="col-lg-12">
                     <div class="main-button">
                        <a href="blog">View All Posts</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- <div class="col-lg-4">
            get_sidebar();
         </div> -->
         <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                    <?php wp_get_recent_posts(); ?>
                      <ul>
                        <li><a href="post-details.html">
                          <h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
                          <span>May 31, 2020</span>
                        </a></li>
                        <li><a href="post-details.html">
                          <h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
                          <span>May 28, 2020</span>
                        </a></li>
                        <li><a href="post-details.html">
                          <h5>Swag hella echo park leggings, shaman cornhole ethical coloring</h5>
                          <span>May 14, 2020</span>
                        </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <?php 
                        $categories = wp_get_post_categories(get_the_ID());
                           foreach($categories as $category){
                                 echo '<li>-<a href="' . get_category_link($category) . '">' . get_cat_name($category) . '</a></div>';
                           }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <?php
                        $posttags = get_the_tags();
                        if ($posttags) {
                           foreach ($posttags as $tag) {
                              echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                           }
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
   </div>
</section>
<?php 
get_footer();
?>