;(function($) {
	$.fn.preloadinator = function(options) {
		'use strict';

		var settings = $.extend({
			scroll: false,
			minTime: 0,
			animation: 'fadeOut',
			animationDuration: 400,
			afterDisableScroll: function() {},
			afterEnableScroll: function() {},
			afterRemovePreloader: function() {}
		}, options),
		preloader = this,
		start = new Date().getTime();

		$.fn.preloadinator.disableScroll = function() {
            var current_address = window.location.href.split('/');
            current_address = current_address[current_address.length-1];

            if(current_address == 'kontakt'){
                var elmnt = document.getElementById("kontakt");
                setTimeout(function(){ elmnt.scrollIntoView(); }, 999);
            }
            $('body').css('overflow', 'hidden');

			if(typeof settings.afterDisableScroll == 'function') {
				settings.afterDisableScroll.call(this);
			}
		};

		$.fn.preloadinator.enableScroll = function() {
			$('body').css('overflow', 'auto');
			$('body').css('overflow-x', 'hidden');

			if(typeof settings.afterEnableScroll == 'function') {
				settings.afterEnableScroll.call(this);
			}
		};

		$.fn.preloadinator.removePreloader = function() {
			$(preloader)[settings.animation](settings.animationDuration, function() {
				if(settings.scroll === false) { 
					$.fn.preloadinator.enableScroll(); 
				}
				if(typeof settings.afterRemovePreloader == 'function') {
					settings.afterRemovePreloader.call(this);	
				}
			});
		};

		$.fn.preloadinator.minTimeElapsed = function() {
			var now = new Date().getTime(),
			elapsed = now - start;

			if(elapsed >= settings.minTime) {
				return true;
			}
			else {
				return false;
			}
		};

		if(settings.scroll === false) { $.fn.preloadinator.disableScroll(); }

		$(window).on('load', function() {
			if($.fn.preloadinator.minTimeElapsed()) {
				$.fn.preloadinator.removePreloader();
			}
			else {
				var now = new Date().getTime(),
				elapsed = now - start;

				setTimeout($.fn.preloadinator.removePreloader, settings.minTime - elapsed);
			}
		});

	    return this;
	}
}(jQuery));