<?php
get_header();
$_SPLIT = split_site_name();
?>

<?php while( have_posts() ) : ?>

<div class="section row">
	<div class="col-xs-6 col-md-4">
		<div id="affixed" class="row"
			data-spy="affix"
			data-offset-top="0">
			<h1 class="scrollspy" class="row">
				<div class="col-xs-12">
					<ul class="nav nav-pills">
						<li role="presentation" class="always">
							<a href="/" class="gray"><?php echo $_SPLIT[ 'first']; ?>/</a>
						</li>
						<li role="presentation" class="active">
							<a class="purple"><?php echo $_SPLIT[ 'last' ]; ?></a>
						</li>
					</ul>
				</div>
			</h1>

			<div class="scrollspy">
				<ul class="nav">
					<li role="presentation" class="always">
						<?php get_sidebar(  'about' ); ?>
					</li>
					<li role="presentation" class="active">
						<?php get_sidebar( 'blog' ); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="first col-xs-12 col-sm-6 col-md-8">

		<?php
		the_post();
		get_template_part( 'content', get_post_format() );

		include 'similar.php';
		?>

	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-4">

		<?php if( comments_open() ) { comments_template(); } ?>

	</div>
</div>

<?php endwhile; ?>

<?php get_footer() ?>