@extends('greeting-section@home::index')

<!-- Hero Section -->
@section('main-content')
    <section id="hero" class="hero section">
        <div class="hero-bg">
            <img src="{{ asset('storage/img/hero-bg-light.webp') }}" alt="hero-image">
        </div>
        <div class="container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 data-aos="fade-up">Welcome to <span>QuickStart</span></h1>
                <p data-aos="fade-up" data-aos-delay="100">Quickly start your project now and set the stage for
                    success<br></p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="#about" class="btn-get-started">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                       class="glightbox btn-watch-video d-flex align-items-center"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
                <img src="{{ asset('storage/img/hero-services-img.webp') }}" class="img-fluid hero-img" alt=""
                     data-aos="zoom-out"
                     data-aos-delay="300">
            </div>
        </div>

    </section><!-- /Hero Section -->

    <section id="featured-services" class="featured-services section light-background">

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Lorem Ipsum</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Dolor Sitema</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip exa</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Sed ut perspiciatis</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
