<?php 

add_theme_support('post-thumbnails');

if (function_exists('register_sidebar')) {
 
register_sidebar(array(
 'name' => 'footerWeg',
 'id' => 'footer1',
 'description' => 'フッターの追加要素',
 // 'before_widget' => 'ウィジェットを囲む開始タグ',
 // 'after_widget' => 'ウィジェットを囲む終了タグ',
 // 'before_title' => 'ウィジェットのタイトルを囲む開始タグ',
 // 'after_title' => 'ウィジェットのタイトルを囲む終了タグ'
 ));
 
}