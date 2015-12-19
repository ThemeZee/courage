		
	<article id="post-<?php the_ID(); ?>" <?php post_class('content-full'); ?>>
		
		<?php courage_display_thumbnail_index(); ?>
		
		<?php the_title( sprintf( '<h1 class="entry-title post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
		<div class="entry-meta postmeta"><?php courage_display_postmeta(); ?></div>

		<div class="entry clearfix">
			<?php the_content( esc_html__( 'Read more', 'courage' ) ); ?>
			<div class="page-links"><?php wp_link_pages(); ?></div>
		</div>
		
		<?php courage_display_postinfo(); ?>

	</article>