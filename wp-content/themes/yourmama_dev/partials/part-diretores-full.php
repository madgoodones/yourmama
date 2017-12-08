<?php
// the query
$i = 0;
$args = array(
	'post_type' => 'diretores',
	'posts_per_page' => -1,
	'orderby' => 'rand',
	'meta_query' => array(
		array(
			'key' => 'is-home',
			'compare' => '==',
			'value' => '1'
		)
	)
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) : ?>
<div style="height: 100vh; overflow: hidden; position: relative;">
	<div class="owl-carousel owl-diretores">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<a href="<?php the_permalink() ?>" class="owl-diretores-item">
			<?php if( have_rows('projetos') ): ?>
				<?php while ( have_rows('projetos') ) : the_row(); ?>
					<?php $img = get_sub_field('imagem_do_projeto'); ?>
					<div>
  						<div
						class="img-background"
						style="
						background: url('<?php echo $img['url'] ?>') no-repeat center center;
						background-size: cover;
						">
						</div>
							<div id="wow<?php echo $i; ?>" class="item-content">
								<div class="wow-home animated-medium">
									<div class="item-title">
							   			<?php the_title() ?>
									</div>
									<div class="item-project">
										<div class="item-prod">
											<?php the_sub_field('subtitulo_do_projeto') ?>
										</div>
										<?php the_sub_field('nome_do_projeto') ?>
									</div>
								</div>
							</div>
						</div>
					<?php $i++ ?>
					<?php break; ?>
				<?php endwhile; ?>
			</a>
			<?php endif; ?>
	    <?php endwhile ?><?php wp_reset_postdata(); ?>
    </div>
    <div class="owl-diretores-controllers right">
    	<button class="owl-direction owl-direction--next" data-owl=".owl-diretores" data-direction="next"><i class="fa fa-angle-right"></i></button>
	</div>
    <div class="owl-diretores-controllers">
    	<button class="owl-direction" data-owl=".owl-diretores" data-direction="prev"><i class="fa fa-angle-left"></i></button>
    </div>
</div>
<?php endif ?>