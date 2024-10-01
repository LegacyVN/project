<!-- Section Title -->
<!-- <div class="container section-title" data-aos="fade-up">
    <h1 class="display-5 mb-3">Gallery</h1>
    <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
</div>
 -->
<div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-5 mb-3">Gallery</h1>
        <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
</div>

<!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
            {
                "loop": true,
                "speed": 600,
                "autoplay": {
                    "delay": 5000
                },
                "slidesPerView": "auto",
                "centeredSlides": true,
                "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "breakpoints": {
                    "320": {
                        "slidesPerView": 1,
                        "spaceBetween": 0
                    },
                    "768": {
                        "slidesPerView": 3,
                        "spaceBetween": 20
                    },
                    "1200": {
                        "slidesPerView": 5,
                        "spaceBetween": 20
                    }
                }
            }
        </script>
        <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('user')}}/img/gallery/gallery-1.jpg"><img src="{{asset('user')}}/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('user')}}/img/gallery/gallery-2.jpg"><img src="{{asset('user')}}/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('user')}}/img/gallery/gallery-3.jpg"><img src="{{asset('user')}}/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('user')}}/img/gallery/gallery-4.jpg"><img src="{{asset('user')}}/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('user')}}/img/gallery/gallery-5.jpg"><img src="{{asset('user')}}/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('user')}}/img/gallery/gallery-6.jpg"><img src="{{asset('user')}}/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('user')}}/img/gallery/gallery-7.jpg"><img src="{{asset('user')}}/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="{{asset('user')}}/img/gallery/gallery-8.jpg"><img src="{{asset('user')}}/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

</div>
