<?php /* Template Name: Cinema/TV */ ?>
<div id="fullpage">
<div class="section fp-auto-height fp-noscroll">
<div class="diretores-header"><?php get_header(); ?></div>
</div>
<div class="section">
<?php 
	$args = array(
	'post_type' => 'cinema-tv',
	'orderby'=> 'title',
	'order' => 'ASC',
	'posts_per_page' => -1
	);
	?>
	<?php $the_query = new WP_Query( $args ); ?>
	<?php if ( $the_query->have_posts() ) : ?>
	<div id="page-diretores" class="diretores" style="
	background: url('<?php the_post_thumbnail_url('full'); ?>') no-repeat center center;
	-webkit-background-size: cover;
	background-size: cover;
	background-color: #000;
	">
		<div class="diretores-content">
			<?php $i = 0; ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php while ( have_rows('projetos') ) : the_row(); ?>
				<?php $img = get_sub_field('imagem'); ?>
				<div style="display: none" class="diretor-thumb"></div>
				<?php break; ?>
			<?php endwhile; ?>
			
			<a class="title diretor-title wow fadeInUp" data-wow-delay="<?= $i/5 ?>s" href="<?php the_permalink(); ?>" data-img="<?= $img['url'] ?>">
				<?php the_title(); ?>
			</a>
			<?php $i++; ?>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
</div>