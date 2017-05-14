<?php get_header(); ?>

<div id="contents_wrap">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
  <div class="content">
      <div class="pageTitle">
        <h2><?php the_title(); ?></a></h2>
        <span>カテゴリ：<?php the_category(', ') ?></span>
        <span>投稿日：<?php echo get_the_date(); ?></span>
      </div>
    <?php the_content(); ?>
  </div>
    <?php endwhile; ?>
    <?php else : ?>
　　　　　    記事はありません
    <?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
