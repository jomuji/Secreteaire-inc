<?php get_header(); ?>
<div class="jumbotron img-header">
       <div class="container enregistrement">
            
           
            
        
        
            <div class="container header-blogue">
                <h1><?php single_cat_title( '', true ); ?></h1>
                <?php //echo do_shortcode("[wpjb_jobs_search]"); ?>
                
                <?php //dynamic_sidebar( 'big-header' ); ?>
                
            </div>
           
           </div>
        
    </div>
</header><!--header-->
   
   
    <div id="wrap">
        
        <section class="blogue">
            <div class="container">
               <div class="row">
                <div class="content col-md-9">
                    
                  
                <?php if ( have_posts() ) : ?>
                    
                    <?php

                    // The Loop
                    while ( have_posts() ) : the_post(); ?>
                      <div class="row blog-post">
                           <div class="col-sm-2"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('thumbnail');} ?></div>
                        
                            <div class="col-sm-10">
                                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                <small><span class="author"><?php the_author(); ?></span> | <span class="date"><?php the_time( 'j F, Y' ); ?></span> | <span class="postmetadata"><?php
                                  comments_popup_link( 'Pas encore de commentaires', '1 commentaire', '% commenttaires', 'comments-link', 'Commentaires fermés');
                                ?></span></small>

                                <div class="entry">
                                <?php the_content(); ?>


                                </div>
                            </div>
                            <hr>
                        </div>
    
                        <hr>
                        <?php endwhile; 

                        else: ?>
                        <p>Sorry, no posts matched your criteria.</p>


                        <?php endif; ?>
                 
                 </div><!--.content-->
                
                <div id="sidebar" class="col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                </div>
            </div>
        </section>
    </div><!--.wrap>
<?php wp_footer(); ?>
<?php get_footer(); ?>