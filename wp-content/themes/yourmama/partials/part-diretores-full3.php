
<?php
// the query
$i = 0;
$args = array(
	'post_type' => 'diretores',
	'posts_per_page' => -1
	);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) : ?>
	<div style="height: 100vh; overflow: hidden">
		<div class="owl-carousel owl-diretores">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<a href="<?php the_permalink() ?>">
				<?php if( have_rows('projetos') ): ?>
				
					<?php while ( have_rows('projetos') ) : the_row(); ?>
						<?php $img = get_sub_field('imagem_do_projeto'); ?>
						
						<div>
	  						<div
							class="img-background"
							style="
							background: url('<?php echo $img['url'] ?>') no-repeat center center;
							background-size: cover;
							"
							>
							</div>

							<div id="wow<?php echo $i; ?>" class="item-content wow-home">
								<div class="item-title ">
						   			<?php the_title() ?>
						   			<div class="item-arrow">
						   				<!-- <i class="fa fa-chevron-right" aria-hidden="true"></i> -->
						   				>
						   			</div>
								</div>

								<div class="item-project">
									<?php the_sub_field('nome_do_projeto') ?>
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
    </div>
<?php endif ?>