/*----------------------------------------
    SCROLLING ANIMATIONS
----------------------------------------*/
$('.scrollimation').waypoint(function(){
        $(this).addClass('in');
        },{offset:'80%'}
);

/*----------------------------------------
    SCROLL TO TOP
----------------------------------------*/
$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
});

/*----------------------------------------
    CONTACT FORM
----------------------------------------*/
$('.contact-form form input[type="text"], .contact-form form input[type="email"]').on('focus', function() {
    $('.contact-form form input[type="text"], .contact-form form input[type="email"]').removeClass('contact-error');
});
    $('.contact-form form').submit(function(e) {
        e.preventDefault();
    $('.contact-form form input[type="text"], .contact-form form input[type="email"]').removeClass('contact-error');
    var postdata = $('.contact-form form').serialize();
    $.ajax({
        type: 'POST',
        url: 'php/contact.php',
        data: postdata,
        dataType: 'json',
        success: function(json) {
            if(json.emailMessage != '') {
                $('.contact-form form .contact-email').addClass('contact-error');
            }
            if(json.firstnameMessage != '') {
                $('.contact-form form .contact-firstname').addClass('contact-error');
            }
            if(json.lastnameMessage != '') {
                $('.contact-form form .contact-lastname').addClass('contact-error');
            }
            if(json.emailMessage == '' && json.firstnameMessage == '' && json.lastnameMessage == '') {
                $('.contact-form form').fadeOut('fast', function() {
                    $('.contact-form').append('<p>Thanks for contacting us!<br>We will get back to you very soon.</p>');
                });
            }
        }
    });
});
/*----------------------------------------
    RESIZE FUNCTION
----------------------------------------*/
$(window).resize(function(){
        //scrollSpyRefresh();
        //waypointsRefresh();
});