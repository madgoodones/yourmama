<?php require_once('inc/protect-abspath.php') ?>
<?php get_header(); ?>
<div id="fullpage">
	<div class="section fp-auto-height">
		<div class="single-header">
			<div class="content wow fadeInUp" data-wow-duration="1.5s">
				<div id="diretor-title" class="title"><?php the_title(); ?> / <span class="pos"><?php the_field('subtitulo') ?></span>
					<div id="subtitle" class="subtitle"></div>
				</div>
				<div id="diretor-text" class="text">
					<?php if($descricao = get_field('descricao')): ?>
						<span class="description-all"><?= $descricao ?></span>
					<?php endif ?>
					<span class="prologo"></span>
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
			<?php $img = get_sub_field('imagem'); ?>
			<div class="section project-section">
				<?php if (get_sub_field('video')) $class = 'projeto-open'; else $class = ''; ?>
				<label class="label-project" for="read-more-<?= $i ?>">
				<div id="<?= "$i"; ?>" class="projeto <?= $class ?>" style="
					background: url('<?= $img['url'] ?>') no-repeat center center;
					-webkit-background-size: cover;
					background-size: cover;
					background-color: #313131;
					">
					<div class="content wow-cinema-tv wow fadeInDown animated" data-wow-duration="1.5s">
						<div class="title">
							<?php the_sub_field('titulo'); ?> <span> > </span>
						</div>
						<?php $iframe = get_sub_field('video'); ?>
						<?php preg_match('/src="(.+?)"/', $iframe, $matches); ?>
						<?php $src = $matches[1]; ?>
						<input class="video-src" type="hidden" data-src="<?= "$src" ?>">
					</div>
					<div class="content">
						<?php if (!get_sub_field('video')): ?>
						<label for="read-more-<?= $i ?>" class="read-more-label">Saiba mais</label>
						<input id="read-more-<?= $i ?>" type="checkbox" class="read-more-check">
						<?php endif ?>
						<div class="read-more">
							<?php the_sub_field('prologo'); ?>
							<?php if (!get_sub_field('video')): ?>
							<div class="clearfix">
							<label for="read-more-<?= $i ?>" class="read-more-label">FECHAR</label>
							</div>
							<?php endif ?>
						</div>
					</div>
				</div>
				</label>
			</div> <!-- End Section -->
			<?php $i++ ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>