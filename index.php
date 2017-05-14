<?php get_header(); ?>

<div id="icon_aria">
	<img class="icon_image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon.png"/>
	<div class="arrow_box">
		<p>書くであろう内容</p>
		<p>PHP、Ruby、Javascript、Objective-C、料理</p>
	</div>
</div>

<div id="contents_wrap">

<?php if( !is_search()):?>
		<ul class="products">
			<?php
				$nowCatId = $_GET['cat'];
				query_posts('cat='.$nowCatId);
				if (have_posts()) : while (have_posts()) : the_post();
			?>
				<a class="product_url" href="<?php the_permalink()?>">
					<li class="product">
						 <?php
							$category = get_the_category();
							$cat_name = $category[0]->cat_name;
						 ;?>
						<?php if ( has_post_thumbnail() ):?>
						 <?php the_post_thumbnail( array('class' => "product_image") ); ?>
						<?php else: ?>
						 <img class="product_image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/noimage.png" />
						<?php endif; ?>
						<dl class="rotate_info">
							<dt class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></dt>
							<dd class="date"><?php the_time('Y.m.d'); ?></dd>
							<dd class="creator">created by <?php echo $cat_name;?></dd>
						</dl>
					</li>
				</a>
		<?php endwhile; endif; ?>
	    <?php wp_reset_query(); ?>

		</ul>
		    <div id="loadDisp">
		    	<div id="loading_image"><img class="ajax_loading" src="<?php echo get_stylesheet_directory_uri(); ?>/images/loading-20.gif" /></div>
		    	<div id="more_disp"><a class="more_link" href="#"><img class="more" src="<?php bloginfo('template_directory'); ?>/images/more.png" /></a></div>
		    </div>
<?php else:?>
	<ul class="products">
		<?php 
				  $allsearch =& new WP_Query("s=$s&showposts=-1");
		          $key = wp_specialchars($s, 1);
		          $count = $allsearch->post_count;
		          echo '<h1>&#8216;'.$key.'&#8217; Search Result '.$count.' Counts</h1>';
		     ?>
		<?php if (have_posts()) :  ?>
			<?php while ($allsearch->have_posts()) : $allsearch->the_post(); ?>
					<li class="product">
						 <?php
							$category = get_the_category();
							$cat_name = $category[0]->cat_name;
						 ;?>
						<?php if ( has_post_thumbnail() ):?>
						 <?php the_post_thumbnail( array('class' => "product_image") ); ?>
						<?php else: ?>
						 <img class="product_image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/noimage.png" />
						<?php endif; ?>
						<dl class="rotate_info">
							<dt class="title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></dt>
							<dd class="date"><?php the_time('Y.m.d'); ?></dd>
							<dd class="creator">created by <?php echo $cat_name;?></dd>
						</dl>
					</li>
				</a>
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>
	</ul>
<?php endif;?>
	
</div>



<?php get_sidebar(); ?>
<?php get_footer(); ?>