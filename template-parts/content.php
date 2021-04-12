
<div class="container toys">
<h2 class="subtitle">
	<?php 
	echo the_title();
	?>
</h2>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php
			$cur = get_the_ID();
			define('CUR',$cur);//присваиваю константе CUR значение переменной $cur

			the_content(//То, что находится в редакторе(Гутетберге) выводится в html страницу
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'uber' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uber' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
