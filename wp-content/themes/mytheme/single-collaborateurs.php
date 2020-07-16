<?php get_header(); ?>
  <div class="contenu">
    <main>
      <?php if(have_posts() ): ?>
        <?php while( have_posts() ): the_post(); ?>
        <section <?php post_class('section'); ?>>
          <div class="card">
            <div class="card-image">
              <figure class="image is-4by3">
                <img src="<?php the_field('collaborateurs-photo');?>" alt="image">
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                <div class="media-content">
                  <p class="title is-4"><?php echo ucfirst(the_field('collaborateurs-nom_et_prenom'));?></p>
                  <p class="subtitle is-6"><?php echo ucfirst(the_field('collaborateurs-email'));?></p>
                </div>
              </div>

              <div class="content">
              <p><?php the_field('collaborateurs-description');?></p>
                <p>Ses Skills : <?php the_field('collaborateurs-formations');?></p>
                <br>
                Compétences :<?php $competences = get_the_terms(get_the_ID(),'secteurs'); ?>
                <?php foreach($competences as $value) :?>
                  <a href="<?php bloginfo('url')?>/<?php echo $value->taxonomy;?>/<?php echo $value->slug;?>">#<?php echo $value->name;?></a>&nbsp;                      
                  <?php endforeach;?>
                <time> inscrit le : <?php the_time("d/m/Y"); ?></time>
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

