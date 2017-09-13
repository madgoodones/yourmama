<?php $logo_1 = 'http://madknow.com.br/yourmama/wp-content/uploads/2017/07/logo-black.png' ?>
<?php $logo_2 = 'http://madknow.com.br/yourmama/wp-content/uploads/2017/07/logo.png' ?>

<?php if (!is_home()) {
	$logo_2 = $logo_1;
} ?>


<div class="menu <?php if(!is_home()): echo "not_home"; endif; ?>" style="z-index: 999">
	<a href="<?= site_url() ?>">
	<img id="site-logo" class="logo" src="<?= "$logo_2"; ?>" data-swap="<?= "$logo_1"; ?>">
	</a>
	<div class="toggle-button" style="z-index: 1000">
		<i id="data-icon" class="fa fa-bars fa-2x nav-toggle" aria-hidden="true"></i>
	</div>
</div>

<?php if(is_singular('diretores')): ?>
	<div class="back" onclick="history.go(-1)";>x</div>
<?php endif ?>

<div class="menu-active" style="z-index: 10">
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
		<ul class="social-ul">
			<li><i class="fa fa-facebook" aria-hidden="true"></i></li>
			<li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
			<li><i class="fa fa-instagram" aria-hidden="true"></i></li>
		</ul>
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