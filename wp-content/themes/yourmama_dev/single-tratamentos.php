<?php require_once('inc/protect-abspath.php') ?>
<?php get_header('tratamentos'); ?>

<div id="tratamento-<?php the_ID(); ?>" class="dark-bg">

<?php if ( ! post_password_required() ) : ?>
    <div class="private-content-public">
    
    <?php 
        if( have_rows( 'images' ) ) {

        while ( have_rows('images') ) : the_row(); 
        
        $img = get_sub_field( 'image' );
        $video  = get_sub_field( 'video' );
        
        /**
         * Carrega imagem e video
         * ou apenas imagem
         * tem que pegar o alt e title das imagens.
         */
        if ( $img && $video ) {
    ?>
        <a href="#" data-toggle="modal" data-target=".video-modal"><img src="<?php echo $img; ?>" alt="Video" /></a>
        <div class="video-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="videoModal" data-backdrop="false">
            <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="video-container">
                        <?php echo $video; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
        } else {
            echo '<img src="'. $img .'" />';
        }
    ?> 

    <?php 
        endwhile; 
        } // end if have_rows
    ?>
    </div>
<?php else : ?>
    <img class="fixed-logo" width="210" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-black.png" alt="Yourmama">
    <div class="private-content-blocked">
        <p class="vertical-text title text-uppercase">
            <div class="post-password-form">
            <?php             
                if( post_password_required() ) {
                    echo get_the_password_form();
                }
            ?>
            </div>
        </p>
    </div>
<?php endif; ?>

</div>

<?php get_footer(); ?>
