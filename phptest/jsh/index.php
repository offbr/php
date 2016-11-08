
        <!-- get_header(); -->
        <?php get_header(); ?>
        
        <div id=main>
            <div class=postBar>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
                <br/>
                <a href="<?php the_permalink(); ?>"><!-- 포스트의 경로 -->
                    <h4><?php the_title(); ?></h4></a> <!-- 포스트의 제목 -->
                    <?php the_excerpt(); ?> <!-- 글의 일부분을 미리 보여줌 -->
                    <?php echo get_the_date(); ?> <!-- 작성 시간 -->
                    <?php echo get_the_time(); ?> | 카테고리명 : <?php the_category(', '); ?><!-- 카테고리 콤마구별 -->
                <br/>
                <?php edit_post_link('[편집하기]'); ?> <!-- 편집 기능 -->
                <br/>
                
                <?php endwhile; else: ?>
                <br/>
                <h1>게시물이 없습니다.</h1> 
                <?php endif; ?>
                  
                 
                
                   
                
            </div>
            <div class=contents>
           <?php echo do_shortcode("[kboard_latest id=2 url=http://siena.dothome.co.kr/?page_id=27 rpp=5]"); ?><!-- 게시판 숏코드 호출 -->
            </div>
        </div>
        
        <?php get_footer(); ?>
        <!-- get_footer(); -->
        

