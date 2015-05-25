<?php
$date = get_the_time( 'm/d/Y' );
$author = get_the_author();
$badge = '<span class="badge">';
$url = esc_url( get_permalink() );

$label = '';
if( strtotime( $date ) < strtotime( 'next week' ) ) {
	$label = '<span class="label label-success"><small>NEW</small></span>';
}

the_title( '<h2><a href="' . $url . '">', "</a> $label</h2>" );
the_excerpt();
?>

<div class="comments">
	<a href="<?php echo esc_url( get_permalink() ); ?>">
		<span class="btn btn-default">Read More...</span>
	</a>

	<span class="btn btn-default">
		<?php echo $date; ?>
	</span>
	<span class="btn btn-default">
		<?php echo $author; ?>
	</span>

	<a href="<?php echo $url; ?>#respond">
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
</div>