<?php
/**
 * The Template for displaying Archive pages.
 */

    get_header();
?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'flat-material' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: %s', 'flat-material' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'flat-material' ) ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: %s', 'flat-material' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'flat-material' ) ) . '</span>' ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'flat-material' ); ?>
				<?php endif; ?>
			</h1>
		</header>

		<?php flat_material_content_nav( 'nav-above' ); ?>

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/* Include the Post-Format-specific template for the content.
					* If you want to overload this in a child theme then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'content', 'index' );

				endwhile;
			?>

		<?php flat_material_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php
			// 404
			get_template_part( 'content', 'none' );
		?>

	<?php endif; wp_reset_query(); // end of the loop. ?>


<?php get_footer(); ?>
