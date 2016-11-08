<?php 

//메뉴 만들기
register_nav_menus(
    array(
        'menu' => 'Main Menu',
         'fallback_cb' => false,
    )
);

//로그아웃/인 후 메인페이지로 이동
function go_home() {
    wp_redirect(home_url());
    exit();
}
    add_action('wp_logout', 'go_home');


// isset = 값이 있는지 체크, empty= 값이 비는지 체크
function redirect_to_front_page() {
    global $redirect_to;
        if(!isset($_GET['redirect_to'])){
            $redirect_to = get_option('siteurl');
        }
}
    add_action('login_form', 'redirect_to_front_page');

//관리자 메뉴바 hide
function fn_admin_bar() { 
    return true;
}
add_filter('show_admin_bar', 'fn_admin_bar');




// Thumbnails
  add_theme_support( 'post-thumbnails' );















?> 