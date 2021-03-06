
        $('.ml2').each(function() {
            $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
        });

        ml.timelines["ml2"] = anime.timeline({
                loop: 3
            })
            .add({
                targets: '.ml2 .letter',
                scale: [4, 1],
                opacity: [0, 1],
                translateZ: 0,
                easing: "easeOutExpo",
                duration: 950,
                delay: function(el, i) {
                    return 70 * i;
                }
            })
        // .add({
        //     targets: '.ml2',
        //     opacity: 0,
        //     duration: 1000,
        //     easing: "easeOutExpo",
        //     delay: 1000
        // })
        // ;
