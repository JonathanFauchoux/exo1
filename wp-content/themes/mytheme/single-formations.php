<?php get_header(); ?>
  <div class="contenu">
    <main>
      <?php if(have_posts() ): ?>
        <?php while( have_posts() ): the_post(); ?>
        <section <?php post_class('section'); ?>>
          <div class="card">
            <div class="card-image">
              <figure class="image is-4by3">
                <img src="<?php the_field('formations-photo');?>" alt="image">
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                <div class="media-content">
                  <p class="title is-4"><?php echo ucfirst(the_field('formations-nom'));?></p>
                  <p class="title is-6">type de formation : <?php echo ucfirst(the_field('formations-type'));?></p>
                  <p class="title is-6">durée de formation : 
       <?php $duree =get_the_terms(get_the_ID(),'duree'); ?>
                <?php foreach($duree as $value) :?>
                    <a href="<?php bloginfo('url')?>/<?php echo $value->taxonomy;?>/<?php echo $value->slug;?>">#<?php echo $value->name;?></a>&nbsp;                      
                <?php endforeach;?></p>
                </div>
              </div>

              <div class="content">
              <p><?php the_field('formations-description');?></p>
             <p><strong>debut formation : </strong><time><?php the_field('formations-date_debut');?></time></p> 
             <p><strong>fin de formation : </strong> <time><?php the_field('formations-date_fin');?></time></p> 
              </div>
            </div>
          </div>
          <?php the_content(); ?> 
        </section>                
        <?php endwhile; ?> 
      <?php endif; ?>
    </main>
  </div>
<?php get_footer(); ?>

