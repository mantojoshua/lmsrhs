$( document ).ready(function() {
    var $body = $(document.body);
    var _SCROLL_FIXED_CUTOFF = _SCROLL_FIXED_CUTOFF || ($(window).height() >= 825 ? 300 : 600),
    _HEADER_HEIGHT = _HEADER_HEIGHT || 825;
                
            $(window).scroll(function(e) {
          if ($('nav.top[data-no-scroll]').length)
                    return;
            if (this.pageYOffset >= _SCROLL_FIXED_CUTOFF && !$body.hasClass('scrolled')) {
                $body.addClass('scrolled');
            } else if (this.pageYOffset < _SCROLL_FIXED_CUTOFF && $body.hasClass('scrolled')) {
                    $body.removeClass('scrolled');
                 }
            if (this.pageYOffset >= _HEADER_HEIGHT) {
                    _header_carousel_active = false;
            } else {
                    _header_carousel_active = true;
            }
    });
  });