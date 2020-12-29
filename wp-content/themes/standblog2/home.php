<?php get_header(); ?>
 <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Recent Posts</h4>
                <h2>Our Recent Blog Entries</h2>
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
                    <a href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
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
            <div class="all-blog-posts">
              <div class="row">
                <?php 
                    $all_post = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish',)); ?>
                     <?php if ( $all_post->have_posts() ) : 
                    //the loop 
                    while ( $all_post->have_posts() ) : $all_post->the_post(); ?>
                    <div class="col-lg-6">
                        <div class="blog-post">
                            <div class="blog-thumb">
                            <?php if ( has_post_thumbnail() ) { 
                                the_post_thumbnail( get_the_ID(), 'full' );
                            } ?>
                            </div>
                            <div class="down-content">
                                <span><?php the_category(); ?></span>
                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                <ul class="post-info">
                                    <li><a href="#"><?php the_author(); ?></a></li>
                                    <li><a href="#"><?php the_date(); ?></a></li>
                                    <li><a href="#"><?php comments_number(); ?></a></li>
                                </ul>
                                <p><?php the_excerpt(); ?></p>
                                <div class="post-options">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="post-tags">
                                        <li><i class="fa fa-tags"></i></li>
                                        <li><a href="#">Best Templates</a>,</li>
                                        <li><a href="#">TemplateMo</a></li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;?>
                <?php endif; ?>
                
                <div class="col-lg-12">
                  <ul class="page-numbers">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <?php get_sidebar(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>