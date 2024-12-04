// (function($) {
// "use strict";
// 	var wow_init = {
// 		init: function() {
// 			$('.grid').isotope({
// 				itemSelector: '.grid-item'
// 			});
// 			new WOW().init();
// 		}
// 	};
//     wow_init.init()
// })(jQuery);
  (function($) {
        "use strict";
        var wow_init = {
            init: function() {
                // Initialize Isotope
                $('.grid').isotope({
                    itemSelector: '.grid-item'
                });

                // Initialize WOW.js
                new WOW().init();
            }
        };
        wow_init.init();
    })(jQuery);