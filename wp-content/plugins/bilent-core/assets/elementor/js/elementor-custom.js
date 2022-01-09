(function($) {

    "use strict";
    

    


    var bilent_faq_js = function($scope, $) {
    

    }


    //Elementor JS Hooks
    $(window).on('elementor/frontend/init', function() {
         elementorFrontend.hooks.addAction('frontend/element_ready/bilent_faq.default', bilent_faq_js);

    });

})(window.jQuery);