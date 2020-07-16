<?php get_header(); ?>
    <div class="contenu">
        <main>
            <section class="section">
            <h2>Résultats de votre recherche : " <?php echo get_search_query(); ?> "</h2>
                <?php if(have_posts() ): ?>
            
                <p>Il y a <?php echo$wp_query->post_count; ?> Resultat(s)</p>
                <ul class="list-group">
                    <?php while( have_posts() ): the_post(); ?>
                    <li <?php post_class(); ?> class="list-group-item">
                        <h2 class="title"><?php the_title(); ?></h2>
                        <?php 
                        if( has_post_thumbnail()):
                            $args =array(
                                'class'=> 'vignettes',
                                'title'=> get_the_title()
                            );
                            the_post_thumbnail('thumbnail', $args);
                        endif;   
                        ?>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="read-more button is-light">Lire la suite</a>
                        <hr>
                    </li>
                    <?php endwhile; ?> 
                </ul>
                <?php endif; ?>
            </section>     
        </main>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>