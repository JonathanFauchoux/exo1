<?php /* Template Name: home */ ?>
<?php get_header(); ?>
    <div class="contenu">
        <main>       
        <section class="section section-log animate__animated animate__bounceInRight">

        <div class="title-form">
            <h2 class="title"> Etes-vous présent !?</h2>
            <button class="button is-warning" id="form-qr">Scan</button>
        </div>
           
            <div class="content-form">
                <div class="left-form">
                    <video class="video"></video>
                    <canvas id="image" class="canvas"></canvas>
                    <button class="button is-warning snap">Photo</button>
                    
                </div>
            
            <div class="form">
            <div class="field">
                <label class="label">Nom</label>
                
                <div class="control has-icons-left has-icons-right">
                    <input class="input" id="nom" type="text" placeholder="Votre nom..." >
                    <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                    </span>
                </div>
            
            </div>

            <div class="field">
                <label class="label ">Prenom</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" id="prenom" type="text" placeholder="Votre prénom...">
                    <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                    </span>
                </div>
            
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" id="email" type="email" placeholder="Votre email" value="">
                    <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>
            
            </div>
            
            <div class="field control-log">
                <div class="control">
                    <button class="button is-warning " id="envoyer" type="submit">Envoyer</button>
                    <div class="rgpd-check">
                        <input type="checkbox" class="checkbox" id="check" value="check">
                        <label class="checkbox-grp">
                        j'accepte les <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>

        <section class="section-scan section hidden">
            <h2>San QR code (en cour de développement)</h2>
            <p>placer votre QRcode au centre de l'écran</p>
        <video id="preview"></video>
        </section>

        <section class="section section-activite animate__animated animate__bounceInRight hidden">
            <div class="field">
                <h2 class="title">Quelle Formation OU quel formateur ?</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error magnam, 
                    saepe incidunt iste repudiandae facere, aut aspernatur praesentium 
                    asperiores distinctio dicta accusantium! Blanditiis dolorum reprehenderit 
                    officiis beatae explicabo. Molestiae, totam!</p>
                
                <div class="activite check2">
                    <div class="formations ">
                        <h2>Formations</h2>
                        <?php  $args = array(
                        'post_type' => 'Formations'
                    );
                    $formations = new WP_Query( $args );
                        if($formations->have_posts()):
                            while($formations->have_posts()) : $formations->the_post(); ?>
                            <div class="list-item"> 
                                <input class="checkbox-choix" type="radio" name="radio" id=" <?php echo get_the_ID(); ?>">
                                <a href="<?php the_permalink();?>"> <?php the_title();?> </a>
                            </div>   
                        <?php
                        endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="collaborateur">
                        <h2>Collaborateurs</h2>
                      <?php  $args = array(
                        'post_type' => 'Collaborateurs'
                    );
                    $collaborateurs = new WP_Query( $args );
                        if($collaborateurs->have_posts()):
                            while($collaborateurs->have_posts()) : $collaborateurs->the_post(); ?>
                            <div class="list-item"> 
                                <input class="checkbox-choix" type="radio" name="radio" id=" <?php echo get_the_ID(); ?>">
                                <a href="<?php the_permalink();?>"> <?php the_title();?> </a>
                            </div>  
                        <?php
                        endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                
            </div>
            <button class="button is-warning " id="fin" type="submit">Envoyer</button>
        </section>               
        <section class="section section-resultat hidden animate__animated animate__bounceInRight hidden">
            <div class="field output-grp" >
                <div id="qrcode"></div>
                <div class="output">
                <img src="" id="the-image"alt="">
                    <h3 class="output-titre"></h3>
                    
                    <p class=output-date></p>
                    <br>
                    <p class="output-choix"></p>
                    <p class="output-salle"></p>
                    <button class="button is-warning imprim" onclick="window.print()">Imprimer</button>
                </div>   
            </div>
                        
        </section>      
        </main>
       
    </div>
<?php get_footer(); ?>