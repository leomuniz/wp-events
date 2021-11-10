<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Superb_Landingpage
 */

get_header();

$eventos = new WP_Query(
	array(
		'numberposts' => -1,
		'post_type'   => 'evento',
		'meta_key'    => 'exibir_na_home',
		'meta_value'  => 1,
	) 
);
?>

<div id="primary" class="content-area large-12 medium-12 small-12 cell fp-blog-grid">
		<main id="main" class="site-main">

			<?php if ( $eventos->have_posts() ) : ?>

			<header class="page-header">
				<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				//the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( $eventos->have_posts() ) :
				$eventos->the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'excerpt' );

				endwhile;

				the_posts_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();




