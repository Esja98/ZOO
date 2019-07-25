posicionarMenu();

$(window).scroll(function() {    
    posicionarMenu();
});

function posicionarMenu() {
    var altura_del_header = $('.cabecera').outerHeight(true);
    var altura_del_menu = $('.contenedormenu').outerHeight(true);

    if ($(window).scrollTop() >= altura_del_header){
        $('.contenedormenu').addClass('fixed');
        $('main').css('margin-top', (altura_del_menu) + 'px');
    } else {
        $('.contenedormenu').removeClass('fixed');
        $('main').css('margin-top', '0');
    }
}