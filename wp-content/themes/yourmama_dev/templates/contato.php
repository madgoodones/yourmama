<?php /* Template Name: Contato */ ?>
<?php get_header(); ?>

	<?php if(have_rows('bloco')): ?>
		<div class="contato">
		<?php $i; ?>
		<?php while( have_rows('bloco') ): the_row(); ?>
			<div class="box wow fadeInUp" data-wow-delay="<?php echo $i/5 ?>s">
				<div class="title">
					<?php the_sub_field('titulo') ?>
				</div>
					<?php while( have_rows('informação') ): the_row(); ?>
					<div class="subtitle">
						<?php the_sub_field('texto') ?>
					</div>
					<?php endwhile; ?>
			</div>
			<?php $i++ ?>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>