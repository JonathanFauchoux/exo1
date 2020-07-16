<?php
##chargement libs

function required_enqueues () {
wp_enqueue_style('bulma', "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css");
wp_enqueue_style('animate', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css");
wp_enqueue_script('axios', "https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js", null, null, true );
wp_enqueue_script('qrcode', get_bloginfo('template_url').'/qrcode.js','axios','1.0',true);
wp_enqueue_script('instascan', get_bloginfo('template_url').'/instascan.min.js','axios','1.0',true);
wp_enqueue_script('main', get_bloginfo('template_url').'/main.js',['axios','qrcode', 'instascan'],'1.0',true);

}
add_action('wp_enqueue_scripts', 'required_enqueues');


wp_enqueue_script('axios');
##NAV
//déclaration des menus
register_nav_menus( array(
    "nav" => "Menu principal",
    "footer" => "Menu Footer"
));
// filtre pour ajouter des classes sur li
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// add class on link nav_menu
function add_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="navbar-item"', $ulclass);
 }
 add_filter('wp_nav_menu','add_menuclass');
##END NAV

##IMAGEs
// add image à la une
add_theme_support('post-thumbnails');
set_post_thumbnail_size(200,300);
// tailles images
add_image_size( 'fullscreen', 600, 600);
##ENDIMAGES


##DIVERS
// activer le title de yoast
add_theme_support('title-tag');

// add les formats d'articles
add_theme_support('post-formats', array(
    'video', 'gallery'
));
add_post_type_support( 'page', 'post-formats' );

//html5
add_theme_support('html5', array(
    'search-form',
    'caption',
    'gallery'
));
##WIDGET

//desactivation widget
add_action('widgets_init', 'remove_default_widget');
function remove_default_widget(){
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_RSS');
}

//creation des sidebars
register_sidebar(array(
    "name" => "sidebar",
    "id" => "sidebar-right",
    "description" => "Zone de sidebar",
    "before_widget" => '<div class="widget">',
    "after_widget" => '</div>',
    'before_title' => '<h4 class="widget-title">',
    "after_title" => '</h4>',
    "class" => "sidebar-right"
));

//footerleft

register_sidebar(array(
    "name" => "footer-left",
    "id" => "footer-left",
    "before_widget" => '<div class="widget">',
    "after_widget" => '</div>',
    'before_title' => '<h4 class="widget-title">',
    "after_title" => '</h4>',
    "class" => "footer-left"
));
//right
register_sidebar(array(
    "name" => "footer-right",
    "id" => "footer-right",
    "before_widget" => '<div class="widget">',
    "after_widget" => '</div>',
    'before_title' => '<h4 class="widget-title">',
    "after_title" => '</h4>',
    "class" => "footer-right"
));
##ENDWIDGET

##Gestion des abonnés
require get_template_directory().'/inc/new_user.php';
require get_template_directory().'/inc/my_functions.php';
require get_template_directory().'/inc/customs.php';
//limiter le nombre de mots dans prev articles à 25
function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

##activer css classic editor
add_theme_support("editor-styles");
add_editor_style("editor-styles.css");

##pallette de couleurs new editor
add_theme_support('editor-color-palette', array(
    array(
        'name' => 'Silver',
        'slug' => 'dark-gray',
        'color' => 'rgba(0,0,0,.5)'
    ),
    array(
        'name' => 'vert',
        'slug' => 'badass',
        'color' => '#BADA55'
    )
 ));

/* ## Font-size
add_theme_support( 'disable-custom-font-sizes');
add_theme_support('editor-font-sizes', array(
    array(
        'name' => 'small',
        'size' => 12,
        'slug' => 'small'

    )
    )); */