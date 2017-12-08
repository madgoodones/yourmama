$( document ).ready(function() {
    $(".menu-active").hide();
    
    $('#fullpage').fullpage({
        scrollBar: true,
        afterRender: true,
        scrollingSpeed: 590,
        offsetSections:false,
        loopBottom: true
    });

    var wow = new WOW(
    {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
          // the callback is fired every time an animation is started
          // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
    }
    );
    wow.init();

    var menu = $(".menu");
    var menu_active =  $(".menu-active");
    var button = $(".nav-toggle");
    var icon = $("#data-icon");
    var data_img = $(".data-img");

    if (menu.hasClass('not_home')) {
        icon.addClass('toggle-button-black');
    }

    // Ativa o menu
    $(".toggle-button").click(function() {
        $(".menu-active").slideToggle();
        var logo = $("#site-logo");
        var swap = logo.attr("data-swap");
        var current = logo.attr("src");
        var data_img = $(".data-img");

        $(".menu").toggleClass('fixed');
            // Troca a imagem
            logo.attr('src', swap).attr("data-swap", current);
            // Troca a cor do icone se for a home do site
            if (!menu.hasClass('not_home')) {
                icon.toggleClass('toggle-button-black');
            }
            // Troca o icone
            if(icon.hasClass('fa-bars')){
                icon.removeClass('fa-bars').addClass('fa-close');
            } else {
                icon.addClass('fa-bars').removeClass('fa-close');
            }
            // Adiciona Efeitos
            data_img.toggleClass('wow fadeInUp animated').attr("data-wow-duration", "3s");
        });


    // Hover de elementos do menu
    $menuItens = $('.menu-items-list .item > a');
    $menuBackground = $('.menu-item-background');
    $menuItens.each(function(index, el) {
        $(this).on('mouseover', function(event) {
            event.preventDefault();
            $menuBackground.removeClass('active');
            $($(this).data('item')).addClass('active');
        });
    });

    var $owlDiretores = $('.owl-diretores'),
        $owlWow = $(".wow-home");
    $owlDiretores.owlCarousel({
        items: 1,
        loop: true,
        autoplay:true,
        autoplayTimeout:5000,
        smartSpeed: 1300
    });
    // Listen to owl events:
    $owlDiretores.on('translate.owl.carousel', function(event) {
        $owlWow.addClass('wow fadeInUp animated');
        $owlWow.on("webkitAnimationEnd oanimationend msAnimationEnd animationend",
            function() {
                $owlWow.removeClass('wow fadeInUp animated');
            }
        );
    });

    // Inserir efeitos na página de diretores

    $('.wow-diretores').addClass('wow fadeInUp');
    $('.wow-cinema-tv').addClass('wow fadeInDown');
    $('.wow-diretores').css('color', '#fff');

    // Hover da página interna de diretores

    // Hover de elementos da página diretores
    var $diretorTitle = $(".diretor-title");
    $diretorTitle.on('mouseover',function(){
        // Variaveis
        var img = $(this).attr("data-img");
        var con = $("#page-diretores");
        // Troca a imagem

        con.fadeIn('slow', function(){
            con.css({
                'background': 'url('+ img +') no-repeat center center',
                'background-size': 'cover',
                'transition': '.7s'
            });
        });

        $diretorTitle.not(this).css('color', 'transparent');
    });

    $diretorTitle.on('mouseleave', function(event) {
        $diretorTitle.css('color', '#fff').fadeIn('slow', function() {});;
    });


    // Animação da página de Video
    $(".projeto-open").on('click', function(event) {
        $this = $(this).parent();
        var titulo = $this.find('.title').text();
        var prologo = $this.find('.read-more').text();
        var id = $this.attr("id");
        var src = $this.find('.video-src').attr('data-src');
        var iframe = $('.page-iframe');
        $("#subtitle").hide();
        $('#diretor-text .prologo').hide();
        iframe.attr('src', src);
        $('.project-section').css('display', 'none');
        $('html, body').animate({
            scrollTop: '0px'
        }, function(){
            $('#diretor-text .description-all').slideUp(500); // Bio
            $('.pos').fadeOut(500, function(){ // Diretor(a)
                $('#subtitle').text(titulo).fadeIn(500); // Nome do video
                $('#diretor-text .prologo').text(prologo).fadeIn(500); // Nome do video
            });

            $(".iframe-holder").slideDown(500, function(){
                $(".project-section").fadeOut(500);
            });
        });
        $.fn.fullpage.destroy('all');
    });



    // Finds all iframes from youtubes and gives them a unique class
    $('iframe[src*="https://www.youtube.com/embed/"]').addClass("youtube-iframe");
    
        $(".modal-close").click(function() {
            // changes the iframe src to prevent playback or stop the video playback in our case
            $('.youtube-iframe').each(function(index) {
            $(this).attr('src', $(this).attr('src'));
            return false;
            });
    });

});
    
/**
* Owl directions
*/
var $owl_direction = $('.owl-direction');
$owl_direction.on('click', function(event) {
    var direction = $(this).data('direction'),
            owl = $(this).data('owl');
    $(owl).trigger(direction + '.owl.carousel');
});

// Mostra conteudo novamente
$(".close-frame").on('click', function(event) {
    $('.project-section').css('display', 'block');
    $("#subtitle").text("").hide('slow');
    $("#diretor-text .prologo").text("").hide('slow');
    $('#diretor-text .description-all').slideDown(500);
    $('.pos').fadeIn(500);
    $(".iframe-holder").slideUp(500, function(){
        $(".page-iframe").attr('src', '');
    });
    setTimeout(function(){
        $('#fullpage').fullpage({
            scrollBar: true,
            afterRender: true,
            scrollingSpeed: 590,
            offsetSections:false,
            loopBottom: true
        });
    }, 500);
});

// Assistir Também 
var $btnAssistirTambem = $('#assistir-tambem'),
    $videos = $('.project-section .video-src'),
    $iframe = $(".page-iframe");

$btnAssistirTambem.on('click', '.assistir-tambem-item', function() {
    var dataFilm = $(this).data('film');
    $iframe.slideUp('slow');
    $videos.each(function(el) {
        $this = $(this);
        if($this.data('film') === dataFilm) {
            $iframe.attr('src', $this.data('src'));
            $iframe.on('load', function (event) {
                $iframe.slideDown('fast');
            });
        }
    });
});