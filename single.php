<?php get_header(); ?>
   
<div class="jumbotron img-header">
       <div class="container enregistrement">
            
        
        
            <div class="container header-search">
                <h4>Recherchez un emploi par un ou plusieurs des critères suivants:</h4>
                <?php echo do_shortcode("[wpjb_jobs_search]"); ?>
                
                <?php dynamic_sidebar( 'big-header' ); ?>
                
            </div>
           
           </div>
        
    </div>
</header><!--header-->
   
   
    <div id="wrap">
        
        <section class="jobboard">
           
            <div class="container">
                <div class="content col-md-8">
                    <div class="row row-eq-height">
                       <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            // Previous/next post navigation.
                            the_post_navigation( array(
                                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
                                    '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
                                    '<span class="post-title">%title</span>',
                            ) );

                        // End the loop.
                        endwhile;
                        ?>
                     </div>
                 </div><!--.content-->

                <div id="sidebar" class="col-sm-4"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>

            </div>
            
        </section>
    </div><!--.wrap>

<?php get_footer(); ?>