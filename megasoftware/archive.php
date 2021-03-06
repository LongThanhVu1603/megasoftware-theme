<?php get_header(); ?>
	<div class="content">
		<div class="main content">
            <div class="archive-title">
                <?php
                    if( is_tag() ):
                        printf(__('Post Taggle: %1$s','mega'), single_tag_title('', false));
                    elseif( is_category() ):
                        printf(__('Post Categorized: %1$s', 'mega'), single_cat_title('', false));
                    elseif( is_day() ):
                        printf(__('Daily Archive: %1$s','mega'), get_the_time('l,F j,Y'));
                    elseif( is_month() ):
                        printf(__('Monthly Archive: %1$s', 'mega'), get_the_time('F Y'));
                    elseif( is_year() ):
                        printf(__('Yearly Archive: %1$s', 'mega'), get_the_time('Y'));
                    endif;
                ?>
            </div>
            
            <?php if(is_tag() || is_category()): ?>
                <div class="archive-desription">
                    <?php echo term_description();?>
                </div>
            <?php endif; ?>

			<?php if (have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
			<?php comments_template(); ?>
			
			<?php endwhile ?>
			<?php else: ?>
				<?php get_template_part('content', 'none'); ?>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>