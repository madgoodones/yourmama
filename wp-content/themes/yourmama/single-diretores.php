<?php require_once('inc/protect-abspath.php') ?>

<?php get_header(); ?>
<div class="single-header">
	<div class="content wow fadeInUp" data-wow-duration="1.5s">
		
		
		<div id="diretor-title" class="title"><?php the_title(); ?>

			<div id="subtitle" class="subtitle"></div>

		</div>
		<div id="diretor-text" class="text">
			<?php the_field('bio_do_diretor') ?>
		</div>
	</div>
</div>
<div class="projetos">
	<?php if( have_rows('projetos') ): ?>
		<?php $i = 0; ?>
		<?php $video_id = 0; ?>
		<div id="video-top"></div>
		<div class="iframe-holder">
			<iframe class="page-iframe" width="100%" frameborder="0" src="" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>


		<?php while ( have_rows('projetos') ) : the_row(); ?>
			<?php $img = get_sub_field('imagem_do_projeto'); ?>
			

			<?php if($i == 0):?> <div class="not-first"> <?php endif; ?>
			<div id="<?php echo "$i"; ?>" class="projeto" style="
				background: url('<?php echo $img['url'] ?>');
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
			
			
			<?php $i++ ?>
		<?php endwhile; ?>

	<?php endif; ?>
</div>
<?php get_footer(); ?>