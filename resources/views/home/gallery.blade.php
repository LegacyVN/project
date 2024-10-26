<!-- Section Title -->
<section id="gallery" class="gallery section light-background">
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
                @if (isset($gallery))
                @foreach ($gallery as $photo)
                <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"><img src="{{asset('gallery')}}/{{$photo->photo_name}}" class="img-fluid" alt=""></a></div>                
                @endforeach  
                @endif
                              
                           
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>