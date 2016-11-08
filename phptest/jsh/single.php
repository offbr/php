<?php get_header(); ?>
<div id=tempMain>
            <div class=tempMainContent>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
                <br/>
                <a href="<?php the_permalink(); ?>"><!-- 포스트의 경로 -->
                    <h4><?php the_title(); ?></h4></a> <!-- 포스트의 제목 -->
                <br/>
                    
		    <?php the_content(); ?>
                    <?php echo get_the_date(); ?> <!-- 작성 시간 -->
                    <?php echo get_the_time(); ?> | 카테고리명 : <?php the_category(', '); ?><!-- 카테고리 콤마구별 -->
                    
                <br/>
                    <?php comments_template(); ?><!-- 댓글 -->
                    <?php echo get_edit_post_link( $id, $context ); ?> <!-- 포스트 경로 -->
                
                   <?php edit_post_link('[수정하기]'); ?> <!-- 편집 기능 -->
                <?php endwhile; else: ?>
                
                <h2>Sorry!</h2> 
                <?php endif; ?>                
            </div>
       </div>

<?php get_footer(); ?>


