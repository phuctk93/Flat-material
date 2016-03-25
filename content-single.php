<?php
/**
 * The template for displaying content in the single.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<p class="entry-meta">
			<?php flat_material_article_posted_on(); ?>
		</p><!-- /.entry-meta -->
		<?php endif; ?>
	</header><!-- /.entry-header -->

	<div class="entry-content">
        <?php
            if ( has_post_thumbnail() ) :
                echo '<p class="post-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'large' ) . '</p>';
            endif;
        ?>

		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'flat-material' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- /.entry-content -->

	<footer class="entry-meta">
		<hr>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'flat-material' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'flat-material' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'flat-material' );
			} elseif ( '' != $category_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'flat-material' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'flat-material' );
			}

			printf(
				$utility_text,
				$category_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'flat-material' ), '<span class="edit-link">', '</span>' ); ?>

		<hr>

		<?php get_template_part( 'author', 'bio' ); ?>

	</footer><!-- /.entry-meta -->

</article><!-- /#post-<?php the_ID(); ?> -->
