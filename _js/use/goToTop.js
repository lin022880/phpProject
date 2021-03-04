        var ml = {
            timelines: {}
        };

        $(function() {
            // Amount of scrolling before button is shown/hidden.
            var offset = 100;

            // Fade duration
            var duration = 500;

            // Toggle view of button when scrolling.
            $(window).scroll(function() {
                if ($(this).scrollTop() > offset) {
                    $('#goToTop').fadeIn(duration);
                } else {
                    $('#goToTop').fadeOut(duration);
                }
            });

            // Scroll to top when button is clicked.
            $('#goToTop').click(function(event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, duration);
                return false;
            });
        });

         
        
   
