<?php
  /*
    Template Name: 2단 레이아웃 템플릿
  */
?>
<?php get_header(); ?>
        <div id=tempMain>
            <div class=tempMainCon>
                <?php echo do_shortcode("[kboard id=2]"); ?>
                 <?php edit_post_link('[편집하기]'); ?> <!-- 편집 기능 -->
            </div>
        </div>
<?php get_footer(); ?>