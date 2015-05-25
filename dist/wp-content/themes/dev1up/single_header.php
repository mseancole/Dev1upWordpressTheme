<?php
$date = get_the_time( 'm/d/Y' );
$author = get_the_author();
$badge = '<span class="badge">';

the_title( '<h2>', '</h2>' );
?>

<p>
	<span class="btn btn-default"><?php echo $date; ?></span>
	<span class="btn btn-default"><?php echo $author; ?></span>

	<a href="#respond">
		<span class="btn btn-primary">

			<?php
			comments_number(
				"Comments {$badge}0</span>",
				"Comment {$badge}1</span>",
				"Comments $badge%</span>"
			);
			?>

		</span>
	</a>
</p>

<br />

<?php
the_content();
wp_link_pages();