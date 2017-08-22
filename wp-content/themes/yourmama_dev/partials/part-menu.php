<?php $logo_1 = 'http://madknow.com.br/yourmama/wp-content/uploads/2017/07/logo-black.png' ?>
<?php $logo_2 = 'http://madknow.com.br/yourmama/wp-content/uploads/2017/07/logo.png' ?>

<?php if (!is_home()) {
	$logo_2 = $logo_1;
} ?>


<div class="menu <?php if(!is_home()): echo "not_home"; endif; ?>" style="z-index: 999">
	<a href="<?php echo site_url() ?>">
	<img id="site-logo" class="logo" src="<?php echo "$logo_2"; ?>" data-swap="<?php echo "$logo_1"; ?>">
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
	<ul class="items-ul">
		<a href="<?php echo site_url( 'diretores', null ); ?>"><li class="data-img" data-img="http://madknow.com.br/yourmama/wp-content/uploads/2017/07/2.png">Diretores</li></a>
		<li class="data-img" data-img="http://madknow.com.br/yourmama/wp-content/uploads/2017/07/6.png">Brand & content</li>
		<li class="data-img" data-img="http://madknow.com.br/yourmama/wp-content/uploads/2017/07/5.png">Cinema/TV</li>
		<a href="<?php echo site_url( 'produtora', null ); ?>">
		<li class="data-img" data-img="http://madknow.com.br/yourmama/wp-content/uploads/2017/07/4.png">Produtora</li>
		</a>
		<a href="<?php echo site_url( 'contato', null ); ?>">
		<li class="data-img" data-img="http://madknow.com.br/yourmama/wp-content/uploads/2017/07/3.png">Contato</li>
		</a>
	</ul>
	<ul class="social-ul">
		<li><i class="fa fa-facebook" aria-hidden="true"></i></li>
		<li><i class="fa fa-twitter" aria-hidden="true"></i></li>
		<li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
		<li><i class="fa fa-instagram" aria-hidden="true"></i></li>
	</ul>
	</div>
	<div id="img-show" class="content">
		
	</div>
</div>