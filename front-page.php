<?php get_header(); ?>
<div class="jumbotron img-header">
       <div class="container enregistrement">
            
           <div class="col-sm-4">
                <a href="/candidate-panel/enregistrement/"class="candidats">
                    <i class="flaticon-male226"></i>
                    <h2>Candidat(e)</h2>
                    <p>Déposez votre CV. </p>
               </a>
                <a href="/forfaits-et-tarifs/" class="employeurs">
                    <i class="flaticon-business121"></i>
                    <h2>Recruiteur</h2>
                    <p>Voir les tarifs. </p>
               </a>
           </div> 
            
        
        
            <div class="container header-search">
                <h4>Recherchez un emploi par un ou plusieurs des critères suivants:</h4>
                
                <div id="recherche"></div>
                
                
                
                
            </div>
           
           </div>
        
    </div>
</header><!--header-->
   
    <div id="wrap">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
            
                                <?php dynamic_sidebar( 'jobs' ); ?>
                                
                    </div>
                    <div class="col-md-4 sidebar-1"><?php dynamic_sidebar('sidebar2'); ?></div>
                </div>
            </div>
        </section>
        
        <section class="blogue">
            <div class="container">
                <div class="content col-md-12">
                <div class="row row-eq-height">
                <?php if ( have_posts() ) : ?>
                <h2 class="text-center">Articles récents du Blogue<br>
                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
                </h2>
                <?php while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-4'); ?>>

                    <div class="post-wrapper" data-mh="col">
                        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('medium');} ?>
                        <div class="category"><?php the_category(', '); ?></div>
                        <div class="post-header">
                            <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                            <span class="author"><?php the_author(); ?></span> | <span class="date"><?php the_time( 'j F, Y' ); ?></span>
                        </div><!--.post-header-->
                        <div class="entry clearfix">
                             <?php the_content(); ?>
                             <?php edit_post_link(); ?>
                             <?php wp_link_pages('Lire la suite'); ?>
                        </div><!--. entry-->
                        <footer class="post-footer">
                             <div class="comments"><?php //comments_popup_link( 'Leave a Comment', '1 Comment', '% Comments' ); ?></div>
                        </footer><!--.post-footer-->
                    </div><!-- .post-->
                 </div>

                 <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
                 <nav class="navigation index">
                     <div class="alignleft"><?php next_posts_link( 'Older Entries' ); ?></div>
                     <div class="alignright"><?php previous_posts_link( 'Newer Entries' ); ?></div>
                 </nav><!--.navigation-->
                 <?php else : ?>
                 <?php endif; ?>
                 </div>
                 </div><!--.content-->

            </div>
        </section>
        <section class="content-bottom">
               <?php dynamic_sidebar( 'content-bottom' ); ?>
        </section>
    </div><!--.wrap>
<?php wp_footer(); ?>
<?php get_footer(); ?>