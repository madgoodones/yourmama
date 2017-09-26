<?php /* Template Name: Produtora */ ?>
<div id="fullpage">
<div class="section fp-auto-height fp-noscroll">
	<div class="produtora-header"><?php get_header(); ?></div>
</div>

<?php if( have_rows('caixa') ): ?>
	<?php $i = 0; ?>
	<?php while ( have_rows('caixa') ) : the_row(); ?>

	<?php $img = get_sub_field('imagem'); ?>
	
	<div class="section produtora" style="
		background: url('<?php echo $img['url'] ?>') no-repeat;
		background-position: center center;
		<?php if($i == 1): ?>
		background-position: 52% center;
		<?php endif; ?>
		<?php if($i == 2): ?>
		background-position: 37% center;
		<?php endif; ?>
		-webkit-background-size: cover;
		background-size: cover;
	">	
		<div class="container">
			<div class="content<?php if(!($i %2 == 0)): echo "-even"; endif; ?> wow fadeInUp animated">
				<div class="title">
					<?php the_sub_field('titulo') ?>
				</div>

				<div class="text">
					<?php the_sub_field('texto') ?>
				</div>
			</div>
		</div>
	</div>
	<?php $i++; ?>
	<?php endwhile; ?>

<?php endif; ?>
</div>
<?php get_footer() ?>