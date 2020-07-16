<?php get_header(); ?>
    <div class="contenu">
        <main>
        
        <?php 
             if(have_posts() ): ?>
                <?php while( have_posts() ): the_post(); ?>
                    <section <?php post_class('section'); ?>>
                        <h2 class="title"><?php the_title(); ?></h2>
                        <p> <?php echo get_post_meta(get_the_ID(), "Prix", true);?></p>
                        <?php 
                        if( has_post_thumbnail()):
                            the_post_thumbnail('fullscreen');
                        endif;   
                        ?>
                        <?php get_post_meta(get_the_ID()); ?>
                        <?php the_content(); ?>
                        
                    </section>    
                              
                <?php endwhile; ?> 
            <?php endif; ?>
  
            
        </main>
       
    </div>
<?php get_footer(); ?>