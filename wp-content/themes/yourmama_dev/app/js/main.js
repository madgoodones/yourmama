$( document ).ready(function() {
    $(".menu-active").hide();

    var altura = $('.iframe-holder').height();
    $(".page-iframe").height(altura);

    $('#fullpage').fullpage({
        scrollBar: true,
        scrollOverflow: true,
        scrollOverflowReset: true,
        afterRender: true,
        scrollingSpeed: 590,
        offsetSections:false,
        loopBottom: true,
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
$('.wow-diretores').css('color', '#fff');

// Hover da página interna de diretores

// Hover de elementos da página diretores
$(".diretor-title").on('mouseover',function(){
    // Variaveis
    var img = $(this).attr("data-img");
    var con = $("#page-diretores");
    // Troca a imagem

    con.fadeIn('slow', function(){
         con.css({
            'background': 'url('+ img +') no-repeat center center',
            'background-size': 'cover',
            'transition': '.2s'
        });
    });

    $('.diretor-title').not(this).css('color', 'transparent');
});

$(".diretor-title").on('mouseleave', function(event) {
    $('.diretor-title').css('color', '#fff').fadeIn('slow', function() {
        
    });;
});


// Animação da página de Video


$(".projeto").on('click', function(event) {
    var titulo = $(this).find('.title').text();
    var id = $(this).attr("id");
    var src = $(this).find('.video-src').attr('data-src');
    var iframe = $('.page-iframe');
    $("#subtitle").hide();
    iframe.attr('src', src);
    
    $('html, body').animate({
        scrollTop: '0px'
    }, function(){
        $('#diretor-text').slideUp(500); // Bio
        $('.pos').fadeOut(500, function(){ // Diretor(a)
            $('#subtitle').text(titulo).fadeIn(500); // Nome do video
        });

        $(".iframe-holder").slideDown(500, function(){
            $(".project-section").fadeOut(500);
            console.log(".video-"+id);
        });
    });
});
});

// Mostra conteudo novamente

$("#diretor-title").on('click', function(event) {
    $("#subtitle").text("").hide('slow');
    $('#diretor-text').slideDown(500);
    $('.pos').fadeIn(500);
    $(".iframe-holder").slideUp(500, function(){
        $(".page-iframe").attr('src', '');
        $('.project-section').fadeIn(500, function() {

        });
    });
});