<div class="section row" id="about">
	<div class="col-xs-6 col-md-4">
		<div id="affixed" class="row"
			data-spy="affix"
			data-offset-top="0">
			<h1 id="scrollspy" class="row">
				<div class="col-xs-12">
					<ul class="nav nav-pills">
						<li role="presentation" class="always">
							<a class="gray"><?php echo $_SPLIT[ 'first' ]; ?>/</a>
						</li>
						<li role="presentation" class="active">
							<a href="#about"><?php echo $_SPLIT[ 'last' ]; ?></a>
						</li>
						<li role="presentation">
							<a href="#blog">LOG</a>
						</li>
						<li role="presentation">
							<a href="#frontend">FRONT-END</a>
						</li>
						<li role="presentation">
							<a href="#backend">BACK-END</a>
						</li>
					</ul>
				</div>
			</h1>

			<?php get_sidebar(  'about' ); ?>

			<?php get_sidebar( 'blog' ); ?>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-8">
		<div class="row">
			<div class="col-xs-12">

				<?php get_sidebar(  'jumbotron' ); ?>

			</div>
		</div>
	</div>
</div>