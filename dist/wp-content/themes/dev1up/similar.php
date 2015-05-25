<h3 class="bg-primary">You Might Also Enjoy:</h3>

<div class="jumbotron">
	<div class="row">
		<?php
		$current = get_the_permalink();
		$posts = array();
		$tags = get_the_tags();
		$tags = $tags ?: array();

		foreach( $tags AS $tag ) {
			$settings = array(
				'tag' => $tag->name,
				'showposts' => 3,
				'caller_get_posts' => 1
			);

			$query = new WP_Query( $settings );
			if( ! $query->have_posts() ) {
				continue;
			}

			while( count( $posts ) < 3 && $query->have_posts() ) {
				$query->the_post();
				$link = get_the_permalink();
				if( $link == $current || in_array( $link, $posts ) ) {
					continue;
				}
		?>

		<div class="similar col-xs-6 col-md-4">
			<h3><?php echo $tag->name; ?></h3>

			<a href="<?php echo $link; ?>" class="thumbnail">
				<h4><?php the_title(); ?></h4>

				<small><?php the_author() ?></small>
				<small><?php the_time( 'm/d/Y' ) ?> | <?php comments_number( '0 Comments', '1 Comment', '% Comments' ) ?></small>
			</a>
		</div>

		<?php
				$posts[] = $link;
			}
		}

		if( ! $posts ) {
		?>

		<p class="col-xs-12">
			<i>Sorry, there aren't any other posts quite like this one!</i>
		</p>

		<?php } ?>

		<div class="pull-right">

		<?php foreach( $tags AS $tag ) { ?>

		<a href="/tag/<?php echo $tag->slug ?>/#blog" class="btn btn-default btn-lg"><?php echo $tag->name ?></a>

		<?php } ?>

		</div>

		<?php wp_reset_query(); ?>
	</div>
</div>