/* Variables */
var toggle_responsive = false;

/* Smooth Scroll*/

$(function () {
    "use strict";
    $('a[href*=#]:not([href=#])').click(function () {
        
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

/*----- END SMOOTH SCROLL ------*/

/*----- CHANGE NAVBAR STYLES ON SCROLL ----*/
$(document).scroll(function(){
    if ( $(window).scrollTop() > 150 ){
        $('#topNavbar').addClass('setSmaller');
    }else{
        $('#topNavbar').removeClass('setSmaller');
    }
});

window.onload = function () {
    "use strict";
    var navbar = $("#topNavbar");
    navbar.on('show.bs.collapse', function () {
        $(this)
            .addClass('shownOpen');
        $('.icon-bar')
            .css('background-color', '#232323');
    })
        .on('hidden.bs.collapse', function () {
        $(this)
            .toggleClass('shownOpen');
        $('.icon-bar')
            .css('background-color', '#ffffff');
    });
}

// Bootstrap Clickable navbar menu item
/*$('li.dropdown').on('click', function () {
    "use strict";
    var $el = $(this);
    var $a = $el.children('a.dropdown-toggle');
    if ($a.length && $a.attr('href')) {
        location.href = $a.attr('href');
    }
});*/

/*(function () {
    "use strict";

    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
        var toggle = toggles[i];
        toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
        toggle.addEventListener( "click", function(e) {
          e.preventDefault();
          (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
        });
    }

})();*/

$(document).ready( function() {
    
    //change navbar item color
    var location = window.location.href;
    if ( location.indexOf('category') > -1 ){
        $("#menu-main-navigation li a[title='Projects']").css('color','#4AB9FF');
        $("#menu-footer-navigation li a[title='Projects']").css('color','#4AB9FF');
    }
    
    // Owlslider
    $('#sliderTestimonial').owlCarousel({
        items:1, // if you want a slider, not a carousel, specify "1" here
        loop:true,
        autoPlay:true,
        autoplayHoverPause:true, // if slider is autoplaying, pause on mouse hover
        autoplayTimeout:380,
        autoplaySpeed:800,
        navSpeed:500,
        dots:true, // dots navigation below the slider
        nav:false // left and right navigation
        //navText:['<','>'],
    });
    $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
    $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
    
    
    // Sending mial via ajax
    $('#contact-form').submit( function(e) {
        // Prevenir que se envie el formulario
        e.preventDefault();
        var name = $('input[name=name]');
        var email = $('input[name=email]');
        var subject = $('input[name=subject]');
        var message = $('textarea[name=message]');
        
        $.ajax({
            type        : 'POST', 
            url         : iconilluminationAjax.ajaxurl, 
            data        : 
            {
                'action': 'ajaxConversion',
                'action': 'send_mail_via_ajax',
                //'g-recaptcha-response': grecaptcha.getResponse(),
                'name' : name.val(),
                'email' : email.val(),
                'subject' : subject.val(),
                'message' : message.val()
            },
            dataType: 'text',
            beforeSend  : function(){
                $('#submit-btn').val('Sending');    
            },
            error       : function(data){
                console.log(data);
            },
            success     : function(data){
                $('#form-submit-wrapper').html(data);
                console.log(data);
                if( data == 0 ){
                    //show error
                    $('#form-submit-wrapper').html(
                        '<p class="form-message error">' +
                        'The field below is required.' +
                        '</p>'
                    ).css('display','block');
                    $('#submit-btn').val('Send your message');
                }else{
                    $('#form-submit-wrapper').html(
                        '<p class="form-message success">' +
                        'Thank you for your message. We will be in touch shortly' +
                        '</p>'
                    ).css('display','block');
                    //clean inputs
                    name.val('');
                    email.val('');
                    subject.val('');
                    message.val('');
                    $('#submit-btn').val('Send your message');
                    //grecaptcha.reset();
                }
            }
        });
        
    });
});
/*----- END READY FUNCTION -------*/


