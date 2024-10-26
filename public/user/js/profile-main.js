(function ($) {
    "use strict";
    // $('.check-details-btn.inact').each(function() {
    //     $(this).on("click", function() {
    //         console.log("click");
    //         var collapElements = $(this).closest('tr').next('tr').find('.collap');
    //         collapElements.addClass('visible').removeClass('collap');
    //         $(this).addClass('act').removeClass('inact');
    //     });
    // });

    // $('.check-details-btn.act').each(function() {
    //     $(this).on("click", function() {
    //         console.log("click2");
    //         var collapElements = $(this).closest('tr').next('tr').find('.collap');
    //         collapElements.addClass('collap').removeClass('visible');
    //         $(this).addClass('inact').removeClass('act');
    //     });
    // });
    $(document).ready(function() {
        $('.check-details-btn').on("click", function() {
            console.log("click");
            // Check if the button has the class 'inact'
            if ($(this).hasClass('inact')) {
                // Handle the case when the button is 'inact'
                console.log("inact click");
                var collapElements = $(this).closest('tr').next('tr');
                collapElements.addClass('visible').removeClass('collap');
                $(this).addClass('act').removeClass('inact');
            } 
            // Check if the button has the class 'act'
            else if ($(this).hasClass('act')) {
                // Handle the case when the button is 'act'
                console.log("act click");
                var collapElements = $(this).closest('tr').next('tr');
                collapElements.addClass('collap').removeClass('visible');
                $(this).addClass('inact').removeClass('act');
            }
        });

        
    });
    

})(jQuery);
