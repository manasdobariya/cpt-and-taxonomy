<?php 
/**
 * plugin Name:car
 * Description: This is plugin about car.
 * Version:1.0
 * Author:manas dobariya
*/



if(!defined('ABSPATH')){
    header("location: /car");
    die();
}


function register_my_cpt(){
    $labels = array(
        'name' => 'Cars',
        'singular_name' => 'Car'
    );
    $supports = array('title', 'editor', 'thumbnail', 'comments', 'excerpt');
    $options = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug'=> 'cars'),
        'show_in_rest' => true,
        'supports' => $supports,
        'taxonomies' => array('car_types'),
        'publicly_queryable' => true,
        'publicly_queryable'  => true,
    );
    register_post_type('cars', $options);
}
add_action('init', 'register_my_cpt');

function register_car_types(){
    $labels = array(
        'name' => 'Car Type',
        'singular_name' => 'Car Types'
    );
    $options = array(
        'labels' => $labels,
        'hierarchical' => true,
        'rewrite' => array('slug'=> 'car-type'),
        'show_in_rest' => true,
    );
    register_taxonomy('car-type', array('cars'), $options);
}
add_action('init', 'register_car_types');

