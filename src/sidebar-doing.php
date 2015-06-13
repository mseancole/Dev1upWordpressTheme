<div class="row blog_widget">
	<div class="col-xs-12">

		<?php if( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'doing' ) ) : ?>

		<h3 class="bg-primary">Reading</h3>

		<ul>
			<li>What are you reading?</li>
		</ul>

		<h3 class="bg-primary">Learning</h3>

		<ul>
			<li>What are you learning?</li>
		</ul>

		<?php endif ?>

	</div>
</div>