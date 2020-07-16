<?php get_header(); ?>
    <div class="contenu">
        <main>
            <?php if(have_posts() ): ?>
                <?php while( have_posts() ): the_post(); ?>
                    <section <?php post_class('section'); ?>>
                        <h2 class="title"><?php the_title(); ?></h2>
                        <?php 
                        if( has_post_thumbnail()):
                            the_post_thumbnail('fullscreen');
                        endif;   
                        ?>
                        <?php the_content(); ?>
                        <?php //get_template_part("template_parts/single",get_post_format());?>
                        <?php //edit_post_link( __('Edit', 'mytheme'), "", "",'', "button is-primary"); ?>
                    </section>                
                <?php endwhile; ?> 
            <?php endif; ?>
        </main>
       
    </div>
<?php get_footer(); ?>