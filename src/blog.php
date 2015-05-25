<div class="section row" id="blog">
	<div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-4">
		<?php
		if( have_posts() ) {
			while( have_posts() ) {
				the_post();
				get_template_part( 'content', get_post_format() );
			}
		} else {
			get_template_part( 'content', 'none' );
		}
		?>
	</div>
</div>