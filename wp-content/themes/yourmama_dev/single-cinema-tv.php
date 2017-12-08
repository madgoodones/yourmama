<?php require_once('inc/protect-abspath.php') ?>
<?php get_header(); ?>
<div id="fullpage" class="fullpage-fix">
	<div class="section fp-auto-height">
		<div class="single-header">
			<div class="content wow fadeInUp" data-wow-duration="1.5s">
				<div id="diretor-title" class="title close-frame"><?php the_title(); ?> / <span class="pos"><?php the_field('subtitulo') ?></span>
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
			<?php if( have_rows('projetos') ): $i=0; ?>
				<ul id="assistir-tambem" class="assistir-tambem">
				<li><?php _e(do_shortcode('<!--:en-->WATCH ALSO:<!--:--><!--:pb-->ASSISTA TAMBÉM:<!--:-->'));?></li>
				<?php while ( have_rows('projetos') ) : the_row(); ?>
				<li class="assistir-tambem-item" data-film="<?php the_sub_field('titulo'); ?><?= $i ?>"><?php the_sub_field('titulo'); ?></li>
				<?php $i++; endwhile ?>
				</ul>
			<?php endif ?>
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
				<label class="label-project" for="read-more-<?= $i ?>">
					<div id="<?= "$i"; ?>" class="projeto" style="
						background: url('<?= $img['url'] ?>') no-repeat center center;
						-webkit-background-size: cover;
						background-size: cover;
						background-color: #313131;
						">
						<div class="content">
							<div class="wow-cinema-tv wow fadeInDown animated" data-wow-duration="1.5s">
								<div class="title">
									<?php the_sub_field('titulo'); ?> <span> > </span>
								</div>
								<label for="read-more-<?= $i ?>" class="read-more-label"><?php _e(do_shortcode('<!--:en-->READ MORE<!--:--><!--:pb-->SAIBA MAIS<!--:-->'));?></label>
							</div> 
							
							<input id="read-more-<?= $i ?>" type="checkbox" class="read-more-check">
							<div class="read-more">
								<?php the_sub_field('prologo'); ?>
								<div class="clearfix">
								<div class="title" style="height: 0; overflow: hidden; opacity:0;"><?php the_sub_field('titulo'); ?></div>
								<?php $iframe = get_sub_field('video'); ?>
								<?php if ($iframe): ?>
								<?php preg_match('/src="(.+?)"/', $iframe, $matches); ?>
								<?php $src = $matches[1]; ?>
								<input class="video-src" type="hidden" data-film="<?php the_sub_field('titulo'); ?><?= $i ?>" data-src="<?= $src ?>">
								<label class="read-more-label projeto-open"><?php _e(do_shortcode('<!--:en-->WATCH<!--:--><!--:pb-->ASSISTIR<!--:-->'));?> <i class="fa fa-play"></i></label>
								<?php endif ?>
								<label for="read-more-<?= $i ?>" class="read-more-label"><?php _e(do_shortcode('<!--:en-->CLOSE<!--:--><!--:pb-->FECHAR<!--:-->'));?></label>
								</div>
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