<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')

</head>

<body>
    

    <!-- Navbar Start -->
    @include('home.header')
    <!-- Navbar End -->

    <!-- Carousel Start -->
    @include('home.carousel')
    <!-- Carousel End -->

    <!-- About Start -->
    @include('home.aboutUs')
    <!-- About End -->

    <!-- Best sellers, Hot Deal Start -->
    @include('home.deal')
    <!-- Best sellers, Hot Deal End -->

    <!-- Gallery Start -->
    @include('home.gallery')
    <!-- Gallery End -->

    <!-- Review Start -->
    @if (isset($reviews))
    @include('home.review')
    @endif
    <!-- Review End -->

    <!-- Contact Us Start -->
    @include('home.contactUs')
    <!-- Contact Us End -->

    <!-- Footer Start -->
    @include('home.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    @include('home.js')
</body>

</html>