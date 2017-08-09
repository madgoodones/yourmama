<?php /* Template Name: Produtora */ ?>
<div class="produtora-header"><?php get_header(); ?></div>

<?php if( have_rows('caixa') ): ?>
	<?php $i = 0; ?>
	<?php while ( have_rows('caixa') ) : the_row(); ?>

	<?php $img = get_sub_field('imagem'); ?>
	
	<div class="produtora" style="
		background: url('<?php echo $img['url'] ?>') no-repeat center center;
		-webkit-background-size: cover;
		background-size: cover;
	">	
		<div class="content<?php if(!($i %2 == 0)): echo "-even"; endif; ?> wow fadeInUp animated">
			<div class="title">
				<?php the_sub_field('titulo') ?>
			</div>

			<div class="text">
				<?php the_sub_field('texto') ?>
			</div>
		</div>
	</div>
	<?php $i++; ?>
	<?php endwhile; ?>

<?php endif; ?>
<?php get_footer() ?>