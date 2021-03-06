<article class="vacancy vacancy--frontpage">

	<div class="vacancy__text">

		<?php
			$company = get_field('company');
		?>
		<p class="vacancy__intro vacancy__intro--frontpage">
			<span class="vacancy__company"><?=$company?></span> <?php echo esc_attr_x('is looking for a', 'vacancy <company> is looking for string', 'svid-theme-domain');?>
		</p>

		<h3 class="vacancy__title">
			<a href="<?php the_permalink(); ?>" class="vacancy__link vacancy__link--frontpage">
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

		<p class="vacancy__details vacancy__details--frontpage">
			<?php
				$location = get_field('location');
				if ( !empty($location) ) { ?>
					<span class="vacancy__tag  vacancy__location">
			    	<i class="fas fa-map-marker-alt"></i> <?=$location?>
					</span>
			<?php	} ?>

			&bull;

			<?php
				$categories = get_the_category();
				if ( !empty($categories) ) {
					$category = esc_html( $categories[0]->name ); ?>
					<span class="vacancy__tag  vacancy__type">
			    	<?=$category?>
					</span>
			<?php	} ?>
		</p>

	</div>

</article>
