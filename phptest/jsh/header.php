<!doctype html>
<html <?php language_attributes(); ?>> <!-- 워드프레스 기본 언어 -->
<head>
<meta charset="<?php bloginfo('charset'); ?>"> <!-- 워드프레스 기본 Encoding -->
<title>
    <?php bloginfo('name') ?> <?php wp_title('|'); ?> <!-- 사용자 정의하기 => 아이덴티티 설정 값 -->
</title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"> <!-- style.css 설정 호출 -->    

    
<!-- 닫는 head 앞 admin bar 호출-->    
<?php wp_head(); ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.0.min.js"></script>


<script>
$(function(){
    $(".menu li").hover(function(){
        $(this).find("li").stop().slideToggle();
    })
})
</script>

</head>
    
<body <?php body_class(); ?>>
    <div id=wrap>
        <div id=header>
            <div class=headerTitle>
            <h2><a href="<?php echo home_url(); ?>">    <!-- root 회기 함수 -->
                 <?php bloginfo('name'); ?></a> <!-- 사용자 정의 : 사이트 제목 호출 함수 -->
                
                </h2>
                 
                <ul>

                    <li><?php bloginfo('description'); ?> <!-- 사용자 정의 : 태그라인 호출 함수 --></li>
                    <li><?php wp_loginout(); ?><!-- 로그인 아웃 --></li>
                        <?php wp_register(); ?><!-- 관리자 페이지 이동 -->
                </ul>
                
            </div>
            <div class=navMenu>
                <?php wp_nav_menu(array('theme_location' => 'menu',)); ?>
            </div>
        </div>