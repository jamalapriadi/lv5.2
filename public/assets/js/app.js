$(function(){
     		wow = new WOW({
                    boxClass:     'wow',      // default
                    animateClass: 'animated', // default
                    offset:       0,          // default
                    mobile:       true,       // default
                    live:         true        // default
               	})
            wow.init();

            var navpos = $('#mainnav').offset();
            console.log(navpos.top);
              $(window).bind('scroll', function() {
                if ($(window).scrollTop() > navpos.top) {
                  $('#mainnav').addClass('navbar-fixed-top transparant');
                 }
                 else {
                   $('#mainnav').removeClass('navbar-fixed-top transparant');
                 }
              });

        $('#listitems').paginate({itemsPerPage: 4});

        $('#listitems2').paginate({itemsPerPage: 12});

        $('.bxslider').bxSlider({
          mode: 'fade',
          captions: true
        });
     	});