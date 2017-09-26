<?php $logo_1 = get_field('dark-logo', 'option'); ?>
<?php $logo_2 = get_field('light-logo', 'option'); ?>
<?php if (!is_home() && !is_404()) {
	$logo_2 = $logo_1;
} ?>
<div class="menu <?php if(!is_home() && !is_404()): echo "not_home"; endif; ?>" style="z-index: 50">
	<a href="<?= site_url() ?>">
	<img id="site-logo" class="logo" src="<?= "$logo_2"; ?>" data-swap="<?= "$logo_1"; ?>">
	</a>
	<div class="toggle-button" style="z-index: 50">
		<i id="data-icon" class="fa fa-bars fa-2x nav-toggle" aria-hidden="true"></i>
	</div>
</div>
<?php if(is_singular('diretores')): ?>
<a class="back" href="<?php bloginfo('url') ?>/diretores">x</a>
<?php endif ?>
<?php if(is_singular('cinema-tv')): ?>
<a class="back" href="<?php bloginfo('url') ?>/cinema-tv">x</a>
<?php endif ?>
<div class="menu-active" style="z-index: 10; display: none;">
	<div class="menu-items">
		<?php if( have_rows('menu-itens', 'option') ): ?>
		<ul class="menu-items-list">
			<?php $count=0; while( have_rows('menu-itens', 'option') ): the_row(); ?>
			<li class="item">
				<a data-item=".menu-i-<?= $count ?>" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('name'); ?></a>
			</li>
			<?php $count++; endwhile;  ?>
		</ul>
		<?php endif ?>
		<?php if( have_rows('theme-socials', 'option') ): ?>
		<ul class="social-ul">
			<?php while( have_rows('theme-socials', 'option') ): the_row(); ?>
			<li><a href="<?php the_sub_field('url'); ?>" target="_blank"><i class="fa <?php the_sub_field('icon'); ?>" aria-hidden="true"></i></a></li>
			<?php endwhile ?>
		</ul>
		<?php endif ?>
	</div>
	<?php $count=0; while( have_rows('menu-itens', 'option') ): the_row(); ?>
	<?php $image = get_sub_field('image'); ?>
	<?php if ($count==0): ?>
	<div style="background-image: url('<?= $image['url']  ?>')" class="menu-item-background menu-i-<?= $count ?> active"></div>
	<?php else: ?>
	<div style="background-image: url('<?= $image['url']  ?>')" class="menu-item-background menu-i-<?= $count ?>"></div>
	<?php endif ?>
	<?php $count++; endwhile ?>
</div>