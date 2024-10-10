(function ($) {
    "use strict";
    //Sale box
    // $("#nav-products").on("load", function(){
    //     console.log("found1");
    //     if($(this).find(".prod-sale").each(function(){
    //         console.log("found");
    //         if($(this).data("discount")<1.00){
    //             $(this).css("visibility", "visible");
    //         }
    //     }))
    //     $(this).find(".prod-sale").css('visibility')

    // });

    $(document).ready(function () {
        $(".prod-sale").each(function () {
            if ($(this).data("discount") < 1.00) {
                $(this).css("visibility", "visible");
            }
        });
        $("li.nav-item#1>a").addClass("active");
       
    });

    $("div#nav-products").on("load", function () {
        console.log("found1");
    });

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    //Initiate the "active" status of tabs
    $("div#cat-tab-1").addClass("active");

    // Initiate the wowjs
    new WOW().init();


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow');
            } else {
                $('.fixed-top').removeClass('bg-white shadow');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow').css('top', -45);
            } else {
                $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
            }
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    // Products carousel
    function initializeCarousel() {
        $(".single-product-carousel").owlCarousel({
            items: 3,
            autoplay: false,
            // smartSpeed: 1000,
            margin: 25,
            loop: true,
            center: true,
            dots: false,
            nav: true,
            navText: [
                '<i class="bi bi-chevron-left"></i>',
                '<i class="bi bi-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    };
    initializeCarousel();
    $("div.owl-item>img").click(function () {
        $("div.single-product-img>img").attr("src", $(this).attr('src'));
    });

    //Cart
    function updateCart(productId, newQuantity) {
        fetch('/update-cart', {
            method: 'POST', // Using POST method
            headers: {
                'Content-Type': 'application/json',
                // 'X-CSRF-TOKEN' : "{{csrf_token}}"
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Add CSRF token for security
            },
            body: JSON.stringify({
                id: productId,
                quantity: newQuantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Cart updated successfully:', data.cart);
            } else {
                console.error('Failed to update cart:', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
       
    }

    $(".table-body-row").each(function () {
        var price = $(this).data("price");
        var prod_id = $(this).data("prodid");
        console.log($(this).find(".cart-quantity").data("comparison"));
        $(this).find(".cart-quantity").on("input", function () {
            var comparison = $(this).data("comparison");
            var quantity = $(this).val();
            if (quantity >= 0) {
                var current_subtotal = Number($(this).closest(".row").find(".event-subtotal").data("subtotal"));
                var total = Number(price * quantity).toFixed(2);
                if (quantity > comparison) {
                    var new_subtotal = (Number(price) + current_subtotal).toFixed(2);
                    updateCart(prod_id,quantity);
                    $(this).data("comparison", quantity);
                }if (quantity < comparison) {
                    var new_subtotal = (current_subtotal - Number(price)).toFixed(2);
                    updateCart(prod_id,quantity);
                    $(this).data("comparison", quantity);
                } else {
                    
                }

                // subtotal += Number(total);
                $(this).closest(".table-body-row").find(".product-total").html("$" + total);
                $(this).closest(".row").find(".event-subtotal").html("$" + new_subtotal);
                $(this).closest(".row").find(".event-subtotal").data("subtotal", new_subtotal);
            } else {
                $(this).val(0);
            }

        });
    });



})(jQuery);

(function () {
    "use strict";
    /**
      * Animation on scroll function and init
      */
    function aosInit() {
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    }
    window.addEventListener('load', aosInit);

    /**
    * Init swiper sliders
    */
    function initSwiper() {
        document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
            let config = JSON.parse(
                swiperElement.querySelector(".swiper-config").innerHTML.trim()
            );

            if (swiperElement.classList.contains("swiper-tab")) {
                initSwiperWithCustomPagination(swiperElement, config);
            } else {
                new Swiper(swiperElement, config);
            }
        });
    }

    window.addEventListener("load", initSwiper);

    /**
     * Initiate glightbox
     */
    // const glightbox = glightbox({
    //     selector: '.glightbox'
    // });


    // Magnifier 
    document.addEventListener("DOMContentLoaded", function() {
        const magnifier = document.getElementById("magnifier");
        const img = document.getElementById("product-image"); 
        const zoomLevel = 2; // Adjust zoom level
        const magnifierSize = 250; // Size of the magnifier
    
        img.addEventListener("mousemove", function(e) {
            const rect = img.getBoundingClientRect();
            const x = e.clientX - rect.left; // X position within the image
            const y = e.clientY - rect.top; // Y position within the image
    
            // Prevent magnifier from going out of bounds
            const offsetX = Math.max(magnifierSize / 2, Math.min(img.width - magnifierSize / 2, x));
            const offsetY = Math.max(magnifierSize / 2, Math.min(img.height - magnifierSize / 2, y));
    
            magnifier.style.left = (offsetX - magnifierSize / 2) + "px";
            magnifier.style.top = (offsetY - magnifierSize / 2) + "px";
            magnifier.style.width = magnifierSize + "px";
            magnifier.style.height = magnifierSize + "px";
            magnifier.style.backgroundImage = `url(${img.src})`;
            magnifier.style.backgroundSize = `${img.width * zoomLevel}px ${img.height * zoomLevel}px`;
            magnifier.style.backgroundPosition = `-${offsetX * zoomLevel - magnifierSize / 2}px -${offsetY * zoomLevel - magnifierSize / 2}px`;
    
            magnifier.style.display = "block"; // Show magnifier on hover
        });
    
        img.addEventListener("mouseleave", function() {
            magnifier.style.display = "none"; // Hide magnifier when not hovering
        });
    });

})();

