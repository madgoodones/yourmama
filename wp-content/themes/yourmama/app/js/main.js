$( document ).ready(function() {
    $(".menu-active").hide();

    //$(".not-first").hide();
    // $(".not-first").slideDown(2000, function() {
    //     //$(".wow-diretores").addClass('wow fadeInUp animated');
    // });

    var altura = $('html').height();
    $(".diretor-iframe").height(altura);

    $('#fullpage').fullpage();

    var wow = new WOW(
    {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       50,          // distance to the element when triggering the animation (default is 0)
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
$(".data-img").hover(function(){
    // Variaveis
    var img = $(this).attr("data-img");
    var con = $("#img-show");
    // Troca a imagem
    con.css({
        'background': 'url('+ img +') no-repeat center center',
        'background-size': 'cover'
    });
});

$('.owl-diretores').owlCarousel({
    navigation : true, 
    slideSpeed : 800,
    paginationSpeed : 800,
    singleItem: true,
    pagination: false,
    rewindSpeed: 500,
    loop: false,
    autoplay:true,
    autoplayTimeout:4000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

var owl = $('.owl-diretores');
owl.owlCarousel();
// Listen to owl events:
owl.on('translate.owl.carousel', function(event) {
    $(".wow-home").addClass('wow fadeInUp animated');
    $(".wow-home").on(
        "webkitAnimationEnd oanimationend msAnimationEnd animationend",
        function() {
            $(".wow-home").removeClass('wow fadeInUp animated');
        }
    );
});



// Inserir efeitos na página de diretores

$('.wow-diretores').addClass('wow fadeInUp');

// Hover da página interna de diretores

// Hover de elementos da página diretores
$(".diretor-title").on('mouseover',function(){
    // Variaveis
    var img = $(this).attr("data-img");
    var con = $("#page-diretores");
    // Troca a imagem
    con.css({
        'background': 'url('+ img +') no-repeat center center',
        'background-size': 'cover',
        'transition': '.2s'
    });

    $('.diretor-title').not(this).css('color', 'transparent');
});

$(".diretor-title").on('mouseleave', function(event) {
    $('.diretor-title').css('color', '#fff');
});


// Animação da página de Video


$(".projeto").on('click', function(event) {
    var titulo = $(this).find('.title').text();
    var id = $(this).attr("id");
    
    $('html, body').animate({
        scrollTop: '0px'
    }, function(){
        $('#subtitle').text(titulo).show('slow');
        $('#diretor-text').slideUp(500);

        $(".video-"+id).slideDown(500, function(){
            $(".not-first").slideUp(500);
            console.log(".video-"+id);
            $('html, body').animate({
                scrollTop: $("#video-top").offset().top
            }, 750);
        });
    });
});
});

// Mostra conteudo novamente

$("#diretor-title").on('click', function(event) {
    $("#subtitle").text("");
    $('#diretor-text').slideDown(500);
    $(".diretor-video").slideUp(500, function(){
        $('.not-first').slideDown(500, function() {

        });
    });
});