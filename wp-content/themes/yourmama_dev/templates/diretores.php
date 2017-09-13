<?php /* Template Name: Diretores */ ?>
<div class="diretores-header"><?php get_header(); ?></div>

<?php 
	$args = array(
	'post_type' => 'diretores',
	'posts_per_page' => -1
	);
	?>


	<?php $the_query = new WP_Query( $args ); ?>
	<div id="page-diretores" class="diretores" style="
	background: url('<?php echo get_the_post_thumbnail_url(); ?>') no-repeat center center;
	-webkit-background-size: cover;
	background-size: cover;
	">
		<div class="diretores-content">
		<?php if ( $the_query->have_posts() ) : ?>
			<?php $i = 0; ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php while ( have_rows('projetos') ) : the_row(); ?>
				<?php $img = get_sub_field('imagem_do_projeto'); ?>
				<div style="display: none" class="diretor-thumb"></div>
				<?php break; ?>
			<?php endwhile; ?>
			
			<a class="title diretor-title wow fadeInUp" data-wow-delay="<?php echo $i/5 ?>s" href="<?php the_permalink(); ?>" data-img="<?php echo $img['url'] ?>">
				<?php the_title(); ?>
			</a>
			<?php $i++; ?>
			<?php endwhile; ?>

		<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>