<?php get_header(); ?>

<div id="primary" role="main" class="content-area">

	<header class="page-header">
		<h1 class="page-title">
		<?php
		if ( eo_is_event_archive( 'day' ) ) {
			//Viewing date archive
			echo __( 'Events: ','eventorganiser' ) . ' ' . eo_get_event_archive_date( 'jS F Y' );
		} elseif ( eo_is_event_archive( 'month' ) ) {
			//Viewing month archive
			echo __( 'Events: ','eventorganiser' ) . ' ' . eo_get_event_archive_date( 'F Y' );
		} elseif ( eo_is_event_archive( 'year' ) ) {
			//Viewing year archive
			echo __( 'Events: ','eventorganiser' ) . ' ' . eo_get_event_archive_date( 'Y' );
		} else {
			_e( 'Events', 'eventorganiser' );
		}
		?>
		</h1>
	</header>

	<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>

</div>

<?php get_footer();
