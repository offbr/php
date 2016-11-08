<?php
  /*
    Template Name: 전체영역 레이아웃 템플릿
  */
?>
<?php get_header(); ?>
        <div id=tempMain>
            <div class= tempMainCon>

    <?php while ( have_posts() ) : the_post(); ?>      
    <?php the_content(); ?>  
    <?php edit_post_link('[편집하기]'); ?>
    <?php endwhile; ?>
    
    <!-- //게시글 출력 --> 
            </div>
        </div>
<?php get_footer(); ?>