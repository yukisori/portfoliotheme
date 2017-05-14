<?php
 
require_once("../../../wp-config.php");
 
$now_post_num = $_POST['now_post_num'];
$get_post_num = $_POST['get_post_num'];
$get_cat_num  = $_POST['get_cat_num'];

if(empty($get_cat_num)){
$sql = "SELECT
        $wpdb->posts.ID, 
        $wpdb->posts.post_title,
        $wpdb->posts.post_date,
        $wpdb->posts.post_excerpt,
        $wpdb->terms.name
    FROM
        $wpdb->posts 
        LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
        LEFT JOIN $wpdb->terms  ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->terms.term_id)
    WHERE 
        $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish'
    ORDER BY 
        $wpdb->posts.post_date DESC 
    LIMIT $now_post_num, $get_post_num";

}else{
$sql = "SELECT
        $wpdb->posts.ID, 
        $wpdb->posts.post_title, 
        $wpdb->posts.post_excerpt,
        $wpdb->posts.post_date,
        $wpdb->term_relationships.term_taxonomy_id
    FROM 
        $wpdb->posts LEFT JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id
    WHERE 
        $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish'
        AND $wpdb->term_relationships.term_taxonomy_id = $get_cat_num
    ORDER BY 
        $wpdb->posts.post_date DESC 
    LIMIT $now_post_num, $get_post_num";

}

$results = $wpdb->get_results($sql);


foreach ($results as $result) {
    $html .= '<a class="product_url" href="">';
    $html .= '<li class="product">';
    $html .= '<img class="product_image" src="'.get_stylesheet_directory_uri().'/images/sample5.png" />';
    $html .= '<dl class="rotate_info">';
    $html .= '<dt class="title"><a href="'.get_permalink($result->ID).'">'.apply_filters('the_title', $result->post_title).'</a></dt>';
    $time = date("Y.m.d", strtotime($result->post_date));
    $html .= '<dd class="date">'.$time.'</dd>';
    $html .= '<dd class="creator">created by '.$result->name.'</dd>';
    $html .= '</dl>';
    $html .= '</li>';
    $html .= '</a>';
}


echo $html;

?>