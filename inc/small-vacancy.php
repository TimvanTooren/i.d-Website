<?php
$categories = get_the_category();
?>
<article class="vacancy vacancy--archive <?php echo $categories[0]->slug ?>"
	data-visible="1">

	<p class="vacancy__details vacancy__details--archive">
		<?php
			$location = get_field('location');
			$duration = get_field('duration');
			$company = get_field('company');

			if ( !empty($location) ) { ?>
				<span class="vacancy__tag  vacancy__location">
					<i class="fas fa-map-marker-alt"></i> <?=$location?>
				</span>
		<?php	} ?>

		<?php if ( !empty($location) && !empty($duration || $categories || $company) ): ?>
			<span class="vacancy__separator">
				&bull;</span>
		<?php endif; ?>

		<?php if ( !empty($duration) ) { ?>
			<span class="vacancy__tag  vacancy__duration">
				<i class="fas fa-calendar"></i> <?=$duration?>
			</span>
		<?php	} ?>


		<?php if ( !empty($duration) && !empty($categories || $company) ): ?>
			<span class="vacancy__separator">
				&bull;</span>
		<?php endif; ?>

		<?php
			if ( !empty($categories) ) {
				$category = esc_html( $categories[0]->name ); ?>
				<span class="vacancy__tag  vacancy__type">
					<?=$category?>
				</span>
		<?php	} ?>

		<span class="vacancy__separator">
			&bull;</span>

		Published: <?php the_date('F jS'); ?>

	</p>

	<?php
		if ( has_post_thumbnail() ) { ?>
		<div class="vacancy__thumb">
			<?php
				the_post_thumbnail('thumb',
					array( 'class' => 'vacancy__logo')
				);
			?>
		</div>
	<?php } ?>

	<div class="vacancy__text">

		<p class="vacancy__intro vacancy__intro--small">
			<span class="vacancy__company"><?=$company?></span> <?php echo esc_attr_x('is looking for a', 'vacancy <company> is looking for string', 'svid-theme-domain');?>
		</p>

		<h3 class="vacancy__title">
			<a href="<?php the_permalink(); ?>" class="vacancy__link">
				<?php
					$title = get_the_title();
					if (strpos($title, "–")) {
						echo substr($title, 0, strpos($title, "–"));
					} else {
						echo $title;
					}
				?>
			</a>
		</h3>

		<?php the_excerpt(); ?>

	</div>

</article>
