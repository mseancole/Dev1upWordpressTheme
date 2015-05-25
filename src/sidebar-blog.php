<div class="row blog_widget">
	<div class="col-xs-12">

		<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'blog' ) ) : ?>

		<h3 class="bg-primary">Posts</h3>

		<ul>
			<?php while( have_posts() ) : the_post() ?>

			<li>
				<a href="<?php echo get_permalink() ?>"><?php the_title() ?></a>
				<span class="post-date"><?php the_time( 'm/d/Y' ) ?></span>
			</li>

			<?php endwhile ?>
		</ul>

		<?php endif; ?>

	</div>
</div>