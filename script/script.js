$(window).scroll(function() {
    var wScroll = $(this).scrollTop();
    var home = $('.home').offset().top;
    var dbd = $('.dashboard').offset().top - 50;
    var backgroundImage = $('.home');
    
    if(wScroll > home) {
        $('.wave1').css({
            'transform' : 'translate(0px, ' + wScroll/25 + '%)'
        });

        $('.wave2').css({
            'transform' : 'translate(0px, ' + wScroll/15 + '%)'
        });

        $('.wave3').css({
            'transform' : 'translate(0px, ' + wScroll/10 + '%)'
        });

        backgroundImage.css({
            'background-position' : '0 ' + wScroll/15 + '%'
        });

    };

    if(wScroll > dbd) {
        
    };

});