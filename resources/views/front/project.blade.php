@extends('layouts.front')
@section('header')
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
@endsection
@section('body')
    <!-- Project Start -->
    <div class="container-fluid project py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Our Project</h5>
                <h1>Our Recently Completed Projects</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="img/project-1.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">Web design</h4>
                                    <p class="m-0 text-white">Web Analysis</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="img/project-2.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">Cyber Security</h4>
                                    <p class="m-0 text-white">Cyber Security Core</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="img/project-3.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">Mobile Info</h4>
                                    <p class="m-0 text-white">Upcomming Phone</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="img/project-4.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">Web Development</h4>
                                    <p class="m-0 text-white">Web Analysis</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="img/project-5.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">Digital Marketing</h4>
                                    <p class="m-0 text-white">Marketing Analysis</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="img/project-6.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">keyword Research</h4>
                                    <p class="m-0 text-white">keyword Analysis</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection
