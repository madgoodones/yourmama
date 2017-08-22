<?php require_once('inc/protect-abspath.php') ?>

<?php get_header(); ?>

<div id="fullpage">


	<div class="section fp-auto-height">
	<div class="single-header">
		<div class="content wow fadeInUp" data-wow-duration="1.5s">

			<div id="diretor-title" class="title"><?php the_title(); ?><span class="pos"> / <?php the_field('pos') ?></span>
				<div id="subtitle" class="subtitle"></div>
			</div>

			<div id="diretor-text" class="text">
				<?php if(get_field('bio_do_diretor')): ?>
					<?php the_field('bio_do_diretor') ?>
				<?php else: ?>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quae voluptatum neque dolorum, vero reiciendis laudantium eos minima cumque nam nulla eaque alias obcaecati velit facere animi aspernatur architecto qui! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit fuga, consequatur veritatis iste magnam ea esse expedita cupiditate rerum, qui libero dolorum quod provident, incidunt tempore fugit! Magnam, magni ex! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis nemo eveniet cupiditate voluptates voluptas excepturi quibusdam officia nulla asperiores quae quidem, porro? Quae rem nulla impedit, debitis quod in corporis.
				<?php endif ?>
			</div>

		</div>
	</div>
	
		<div class="iframe-holder">
			<!-- <div id="video-top"></div> -->
			<iframe class="page-iframe" width="100%" frameborder="0" src="" webkitallowfullscreen mozallowfullscreen allowfullscreen>
			</iframe>
		</div>
	</div>
	

	<!-- Variable -->
	<?php $i = 0; ?>
	<?php $video_id = 0; ?>

	<!-- <div class="projetos"> -->
	<?php if( have_rows('projetos') ): ?>


		<?php while ( have_rows('projetos') ) : the_row(); ?>
			<?php $img = get_sub_field('imagem_do_projeto'); ?>


			<div class="section project-section">
				<div id="<?php echo "$i"; ?>" class="projeto" style="
					background: url('<?php echo $img['url'] ?>') no-repeat center center;
					-webkit-background-size: cover;
					background-size: cover;
					">

					<div class="content wow-diretores wow fadeInUp animated" data-wow-duration="1.5s">

						<div class="title ">
							<?php the_sub_field('nome_do_projeto'); ?> <span> > </span>
						</div>

						<div class="subtitle ">
							<?php the_sub_field('subtitulo_do_projeto'); ?>
						</div>

						<?php $iframe = get_sub_field('video_do_projeto'); ?>
						<?php preg_match('/src="(.+?)"/', $iframe, $matches); ?>
						<?php $src = $matches[1]; ?>
						<input class="video-src" type="hidden" data-src="<?php echo "$src" ?>">
					</div>

				</div>
			</div> <!-- End Section -->

			<?php $i++ ?>

		<?php endwhile; ?>

	<?php endif; ?>
	
</div>
<?php get_footer(); ?>