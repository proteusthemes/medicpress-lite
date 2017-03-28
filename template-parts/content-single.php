<?php
/**
 * Template part for displaying single posts.
 *
 * @package medicpress-lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article__content  e-content">
		<!-- Featured Image -->
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid  article__featured-image  u-photo' ) ); ?>
		<?php endif; ?>
		<div class="article__meta  meta">
			<!-- Categories -->
			<?php if ( has_category() ) : ?>
				<span class="meta__item  meta__item--categories"><?php the_category( ', ' ); ?></span>
			<?php endif; ?>
			<!-- Author -->
			<span class="meta__item  meta__item--author"><span class="p-author"><?php the_author(); ?></span></span>
			<!-- Date -->
			<a class="meta__item  meta__item--date" href="<?php the_permalink(); ?>"><time class="dt-published" datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></a>
		</div>
		<!-- Content -->
		<?php the_title( sprintf( '<h2 class="article__title  p-name">', esc_url( get_permalink() ) ), '</h2>' ); ?>

		<?php the_content(); ?>

		<!-- Multi Page in One Post -->
		<?php
			$medicpress_args = array(
				'before'      => '<div class="multi-page  clearfix">' . /* translators: after that comes pagination like 1, 2, 3 ... 10 */ esc_html__( 'Pages:', 'medicpress-lite' ) . ' &nbsp; ',
				'after'       => '</div>',
				'link_before' => '<span class="btn  btn-primary">',
				'link_after'  => '</span>',
				'echo'        => 1,
			);
			wp_link_pages( $medicpress_args );
		?>
		<!-- Tags -->
		<?php if ( has_tag() ) : ?>
			<div class="article__tags"><?php the_tags( '', '' ); ?></div>
		<?php endif; ?>
	</div><!-- .article__content -->
</article><!-- .article -->
