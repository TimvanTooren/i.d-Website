<?php

/**
 * Template Name: Member Page
 */
if (!is_user_logged_in()) {
  login_first_redirect();
} else {
	get_header();
?>

<header id="site-content" class="news-item__header
  <?php if ( !has_post_thumbnail() ) echo 'news-item__header--short-header'; ?>">

  <h1 class="news-item__title--large"><?php the_title(); ?></h1>

  <div class="news-item__meta--large">
    <?php if ( is_page() && $post->post_parent ): ?>
      <a href="<?php echo get_permalink($post->post_parent); ?>"
        class="news-item__category">
        ⬉ to <?php echo get_the_title($post->post_parent); ?>
      </a>
    <?php endif; ?>
  </div>

  <?php if ( has_post_thumbnail() ) : ?>
    <?php the_post_thumbnail('post-thumbnail',
      array( 'class' => 'news-item__thumb--large')
    ); ?>
  <?php endif; ?>

</header>

<main class="primary-content">

  <?php the_content(); ?>
  <?php include('inc/file-list.php'); ?>

</main>

<?php
  comments_template();
	get_footer();
}
?>
