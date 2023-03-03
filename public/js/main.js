(function ($) {
  'use strict';

  $.ajaxChimp = {
      responses: {
          'We have sent you a confirmation email'                                             : 0,
          'Please enter a valid email'                                                        : 1,
          'An email address must contain a single @'                                          : 2,
          'The domain portion of the email address is invalid (the portion after the @: )'    : 3,
          'The username portion of the email address is invalid (the portion before the @: )' : 4,
          'This email address looks fake or invalid. Please enter a real email address'       : 5
      },
      translations: {
          'en': null
      },
      init: function (selector, options) {
          $(selector).ajaxChimp(options);
      }
  };

  $.fn.ajaxChimp = function (options) {
      $(this).each(function(i, elem) {
          var form = $(elem);
          var email = form.find('input[type=email]');
          var label = form.find('.info');

          var settings = $.extend({
              'url': form.attr('action'),
              'language': 'en'
          }, options);

          var url = settings.url.replace('/post?', '/post-json?').concat('&c=?');

          form.attr('novalidate', 'true');
          email.attr('name', 'EMAIL');

          form.submit(function () {
              var msg;
              function successCallback(resp) {
                  if (resp.result === 'success') {
                      msg = 'We have sent you a confirmation email';
                      label.removeClass('error').addClass('valid');
                      email.removeClass('error').addClass('valid');
                  } else {
                      email.removeClass('valid').addClass('error');
                      label.removeClass('valid').addClass('error');
                      var index = -1;
                      try {
                          var parts = resp.msg.split(' - ', 2);
                          if (parts[1] === undefined) {
                              msg = resp.msg;
                          } else {
                              var i = parseInt(parts[0], 10);
                              if (i.toString() === parts[0]) {
                                  index = parts[0];
                                  msg = parts[1];
                              } else {
                                  index = -1;
                                  msg = resp.msg;
                              }
                          }
                      }
                      catch (e) {
                          index = -1;
                          msg = resp.msg;
                      }
                  }

                  // Translate and display message
                  if (
                      settings.language !== 'en'
                      && $.ajaxChimp.responses[msg] !== undefined
                      && $.ajaxChimp.translations
                      && $.ajaxChimp.translations[settings.language]
                      && $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]]
                  ) {
                      msg = $.ajaxChimp.translations[settings.language][$.ajaxChimp.responses[msg]];
                  }
                  label.html(msg);

                  label.show(2000);
                  if (settings.callback) {
                      settings.callback(resp);
                  }
              }

              var data = {};
              var dataArray = form.serializeArray();
              $.each(dataArray, function (index, item) {
                  data[item.name] = item.value;
              });

              $.ajax({
                  url: url,
                  data: data,
                  success: successCallback,
                  dataType: 'jsonp',
                  error: function (resp, text) {
                      console.log('mailchimp ajax submit error: ' + text);
                  }
              });

              // Translate and display submit message
              var submitMsg = 'Submitting...';
              if(
                  settings.language !== 'en'
                  && $.ajaxChimp.translations
                  && $.ajaxChimp.translations[settings.language]
                  && $.ajaxChimp.translations[settings.language]['submit']
              ) {
                  submitMsg = $.ajaxChimp.translations[settings.language]['submit'];
              }
              label.html(submitMsg).show(2000);

              return false;
          });
      });
      return this;
  };
})(jQuery);



    // -------   Mail Send ajax

    $(document).ready(function() {
      var form = $('#myForm'); // contact form
      var submit = $('.submit-btn'); // submit button
      var alert = $('.alert-msg'); // alert div for show alert message

      // form submit event
      form.on('submit', function(e) {
          e.preventDefault(); // prevent default form submit

          $.ajax({
              url: 'mail.php', // form action url
              type: 'POST', // form submit method get/post
              dataType: 'html', // request type html/json/xml
              data: form.serialize(), // serialize form data
              beforeSend: function() {
                  alert.fadeOut();
                  submit.html('Sending....'); // change submit button text
              },
              success: function(data) {
                  alert.html(data).fadeIn(); // fade in response data
                  form.trigger('reset'); // reset form
                  submit.attr("style", "display: none !important");; // reset submit button text
              },
              error: function(e) {
                  console.log(e)
              }
          });
      });
  });

$(function() {
  "use strict";





  // //------- Sticky Header -------//
  // $(".sticky-header").sticky();

  // //------- video popup -------//
  // $(".hero-banner__video, .video-play-button").magnificPopup({
  //   disableOn: 700,
  //   type: "iframe",
  //   mainClass: "mfp-fade",
  //   removalDelay: 160,
  //   preloader: false,
  //   fixedContentPos: false
  // });

  // //------- mailchimp --------//  
	// function mailChimp() {
	// 	$('#mc_embed_signup').find('form').ajaxChimp();
  // }
  // mailChimp();

  var nav_offset_top = $('header').height() + 50; 
    /*-------------------------------------------------------------------------------
	  Navbar 
	-------------------------------------------------------------------------------*/

	//* Navbar Fixed  
    function navbarFixed(){
        if ( $('.header_area').length ){ 
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();   
                if (scroll >= nav_offset_top ) {
                    $(".header_area").addClass("navbar_fixed");
                } else {
                    $(".header_area").removeClass("navbar_fixed");
                }
            });
        };
    };
    navbarFixed();


  if ($('.blog-slider').length) {
    $('.blog-slider').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        nav: true,
        autoplay: 2500,
        smartSpeed: 1500,
        dots: false,
        responsiveClass: true,
        navText : ["<div class='blog-slider__leftArrow'><img src='img/home/left-arrow.png'></div>","<div class='blog-slider__rightArrow'><img src='img/home/right-arrow.png'></div>"],
        responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:3
          }
      }
    })
  }

  //------- mailchimp --------//  
	function mailChimp() {
		$('#mc_embed_signup').find('form').ajaxChimp();
	}
  mailChimp();
  
});


