<?php get_header( vichax_template_base() ); ?>

	<?php vichax_site_breadcrumbs(); ?>

	<div <?php vichax_content_wrap_class(); ?>>

		<div class="row">

			<div id="primary" <?php vichax_primary_content_class(); ?>>

				<main id="main" class="site-main" role="main">

					<?php include vichax_template_path(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- .container -->

<?php get_footer( vichax_template_base() ); ?>
