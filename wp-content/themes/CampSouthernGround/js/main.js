$(function () {
    $('.full_height').each(function (idx, thing) {
        $(thing).css('height', $(thing).parent().height());
    });


    $('.video_clicker').on('click', function () {
        $(this).hide();
        $(this).next().attr('src', "http://player.vimeo.com/video/97166629?autoplay=1").show();
    });

    $('.modal_toggle_img').on('click', function () {
        $(this).parents('.modal').find('.modal_img').attr('src', $(this).attr('src'));
        $(this).parents('.modal').find('.modal_toggle_img.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.next_image').on('click', function (e) {
        e.preventDefault();

        var active = $(this).parents('.modal').find('.modal_toggle_img.active');

        if (active.length == 0) {
            $(this).parents('.modal').find('.modal_toggle_img:first-child').next().click();
            return false;
        }

        var next = active.next('.modal_toggle_img');

        if (next.length == 0) {
            $(this).parents('.modal').find('.modal_toggle_img:first-child').click();
            return false;
        } else {
            next.click();
        }
    });

    $('.prev_image').on('click', function (e) {
        e.preventDefault();

        var active = $(this).parents('.modal').find('.modal_toggle_img.active');

        if (active.length == 0) {
            $(this).parents('.modal').find('.modal_toggle_img:last-child').click();
            return false;
        }

        var prev = active.prev('.modal_toggle_img');

        if (prev.length == 0) {
            $(this).parents('.modal').find('.modal_toggle_img:last-child').click();
            return false;
        } else {
            prev.click();
        }
    });

    $('.phase_tab').on('click', function (e) {
        e.preventDefault();

        var phase = $(this).attr('data-phase');
        $('.phase_tab').removeClass('active');
        $(this).addClass('active');

        $('.phase').hide();
        $('.phase_' + phase).show();

        $('.progress_map').attr('class', 'progress_map phase_' + phase);
    });


    $('#hamburger').unbind('click').on('click', function (e) {
        $('#menu-header').toggleClass('xs-show');
        $('#hamburger').toggleClass('open');
    });
});