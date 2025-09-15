<!DOCTYPE html>
<html lang="en">


<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Learna - Education HTML Template">

    <!-- ========== Page Title ========== -->
    <title>Learna - Education HTML Template</title>

    <!-- ========== Favicon Icon ========== -->
    @include('frontend.partials.head')
    <!-- ========== End Stylesheet ========== -->

</head>

<body>

    <!-- Start Preloader
    ============================================= -->
    <div id="preloader">
        <div id="edufix-preloader" class="edufix-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    <span data-text-preloader="U" class="letters-loading">
                        U
                    </span>
                    <span data-text-preloader="F" class="letters-loading">
                        F
                    </span>
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    <span data-text-preloader="X" class="letters-loading">
                        X
                    </span>
                </div>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->


   <!-- Start Header Top
    ============================================= -->
    @include('frontend.partials.header-top')
    <!-- End Header Top -->

    <!-- Header
    ============================================= -->
    @include('frontend.partials.header')
    <!-- End Header -->

    <!-- Start Banner Area
    ============================================= -->
    <div class="banner-style-four-area overflow-hidden dark-optional text-light">
        <div class="banner-shape-style-four">
            <img src="{{asset('frontend/assets/img/shape/19.png')}}" alt="Image Not Found">
            <img src="{{asset('frontend/assets/img/shape/16.png')}}" alt="Image Not Found">
            <img src="{{asset('frontend/assets/img/shape/17.png')}}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner-style-four-info">
                        <h2 class="split-text">Build The Skills <br> To Drive Your Career</h2>
                        <p class="wow fadeInUp" data-wow-delay="200ms">
                            Education is a key to success and freedom from all the forces is a power and makes a person powerful.
                        </p>
                        <div class="wow fadeInUp" data-wow-delay="400ms">
                            <form class="search-style-two" action="#">
                                <input type="text" placeholder="Enter Courses name" class="form-control" name="text">
                                <button type="submit">Search Courses</button>
                            </form>
                            <p class="form-notice">
                                <strong>Popular Topic:</strong> Business , Data Science , Digital Program , Finance
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="thumb-style-one wow fadeInUp" data-wow-delay="400ms">
                        <img src="{{asset('frontend/assets/img/thumb/2.jpg')}}" alt="Image Not Found">
                        <img src="{{asset('frontend/assets/img/shape/18.png')}}" alt="Image Not Found">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Category
    ============================================= -->
    <div class="category-style-three-area default-padding bg-gray-gradient-secondary bg-cover" style="background-image: url('{{ asset('frontend/assets/img/shape/banner-9.jpg') }}');">
        <div class="shape">
            <img src="{{asset('frontend/assets/img/shape/50.png')}}" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h2 class="title split-text">Most demanding category to learn&nbsp;from today</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gutter-sm">
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 mb-10">
                    <div class="category-style-three-item wow fadeInUp">
                        <a href="course-filter.html">
                            <div class="icon">
                                <img src="{{asset('frontend/assets/img/icon/41.png')}}" alt="Image Not Found">
                            </div>
                            <span>28 Courses</span>
                            <h4>Web Design <br> Development </h4>
                            <div class="bottom">
                                <div class="right">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/team/m3.jpg')}}" alt="Image Not Found">
                                        <img src="{{asset('frontend/assets/img/team/m4.jpg')}}" alt="Image Not Found">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    18K students
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 mb-10">
                    <div class="category-style-three-item wow fadeInUp" data-wow-delay="100ms">
                        <a href="course-filter.html">
                            <div class="icon">
                                <img src="{{asset('frontend/assets/img/icon/42.png')}}" alt="Image Not Found">
                            </div>
                            <span>45 Courses</span>
                            <h4>Arts & Design <br> Diagram</h4>
                            <div class="bottom">
                                <div class="right">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/team/m1.jpg')}}" alt="Image Not Found">
                                        <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    36K students
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 mb-10">
                    <div class="category-style-three-item wow fadeInUp" data-wow-delay="200ms">
                        <a href="course-filter.html">
                            <div class="icon">
                                <img src="{{asset('frontend/assets/img/icon/43.png')}}" alt="Image Not Found">
                            </div>
                            <span>14 Courses</span>
                            <h4>Business Guide <br> & Finance </h4>
                            <div class="bottom">
                                <div class="right">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/team/m5.jpg')}}" alt="Image Not Found">
                                        <img src="{{asset('frontend/assets/img/team/m6.jpg')}}" alt="Image Not Found">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    56K students
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 mb-10">
                    <div class="category-style-three-item wow fadeInUp" data-wow-delay="300ms">
                        <a href="course-filter.html">
                            <div class="icon">
                                <img src="{{asset('frontend/assets/img/icon/44.png')}}" alt="Image Not Found">
                            </div>
                            <span>32 Courses</span>
                            <h4>Programming <br> interface  </h4>
                            <div class="bottom">
                                <div class="right">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/team/m6.jpg')}}" alt="Image Not Found">
                                        <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    27K students
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 mb-10">
                    <div class="category-style-three-item wow fadeInUp" data-wow-delay="400ms">
                        <a href="course-filter.html">
                            <div class="icon">
                                <img src="{{asset('frontend/assets/img/icon/45.png')}}" alt="Image Not Found">
                            </div>
                            <span>67 Courses</span>
                            <h4>Digital Marketing <br> & Ads Solutions </h4>
                            <div class="bottom">
                                <div class="right">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/team/m5.jpg')}}" alt="Image Not Found">
                                        <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    23.9K students
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-lg-4 col-md-6 mb-10">
                    <div class="category-style-three-item wow fadeInUp" data-wow-delay="500ms">
                        <a href="course-filter.html">
                            <div class="icon">
                                <img src="{{asset('frontend/assets/img/icon/46.png')}}" alt="Image Not Found">
                            </div>
                            <span>19 Courses</span>
                            <h4>Graphics Design <br> Profession </h4>
                            <div class="bottom">
                                <div class="right">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                        <img src="{{asset('frontend/assets/img/team/m3.jpg')}}" alt="Image Not Found">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    5.7K students
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Category -->

    <!-- Start Crouse
    ============================================= -->
    <div class="course-tabs-area default-padding">
        <div class="container">
            <div class="heading-left">
                <div class="row align-center">
                    <div class="col-lg-5">
                        <h2 class="title split-text">Most Popular and demanding courses</h2>
                    </div>
                    <div class="col-lg-7">
                        <p class="wow fadeInUp" data-wow-delay="300ms">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="course-tab-style-one">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <ul class="nav nav-tabs category-tabs wow fadeInUp" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tabs_1" data-bs-toggle="tab" data-bs-target="#tab_1" type="button" role="tab" aria-controls="tab_1" aria-selected="true">
                                    <img src="{{asset('frontend/assets/img/icon/29.png')}}" alt="Image Not Fond"> <strong>Programming</strong>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tabs_2" data-bs-toggle="tab" data-bs-target="#tab_2" type="button" role="tab" aria-controls="tab_2" aria-selected="false">
                                    <img src="{{asset('frontend/assets/img/icon/47.png')}}" alt="Image Not Fond"> <strong>Business Finance</strong>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tabs_3" data-bs-toggle="tab" data-bs-target="#tab_3" type="button" role="tab" aria-controls="tab_3" aria-selected="false">
                                    <img src="{{asset('frontend/assets/img/icon/48.png')}}" alt="Image Not Fond"> <strong>Teaching Online</strong>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tabs_4" data-bs-toggle="tab" data-bs-target="#tab_4" type="button" role="tab" aria-controls="tab_4" aria-selected="false">
                                    <img src="{{asset('frontend/assets/img/icon/26.png')}}" alt="Image Not Fond"> <strong>Arts & Design</strong>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tabs_5" data-bs-toggle="tab" data-bs-target="#tab_5" type="button" role="tab" aria-controls="tab_5" aria-selected="false">
                                    <img src="{{asset('frontend/assets/img/icon/28.png')}}" alt="Image Not Fond"> <strong>Language Learning</strong>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-7 offset-xl-1 col-lg-7">
                        <div class="tab-content category-tab-content wow fadeInUp" data-wow-delay="400ms" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tabs_1">

                                <!-- Single Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/1.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                            <a href="#">Aleesha Brown</a>
                                        </div>
                                        <h4><a href="course-single-2.html">WordPress website complete development.</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(2.8k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$46.00</del> $35.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->

                                 <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/3.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m4.jpg')}}" alt="Image Not Found">
                                            <a href="#">Amaul Joey</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Complete React Front-end developer course</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(3.4k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$42.00</del> $29.00</h2>
                                        </div>
                                    </div>
                                </div>
                                 <!-- End Item -->

                                <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/6.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m3.jpg')}}" alt="Image Not Found">
                                            <a href="#">Sarah Albert</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Dynamic website development to make money from online</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <span>(1k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 244 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$35.00</del> $27.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->

                            </div>
                            <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tabs_2">
                                <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/6.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m3.jpg')}}" alt="Image Not Found">
                                            <a href="#">Sarah Albert</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Dynamic website development to make money from online</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <span>(1k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 244 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$36.00</del> $27.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                                <!-- Single Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/8.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                            By <a href="#">Aleesha Brown</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Complete React Front-end developer course</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(2.8k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$47.00</del> $35.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->

                                 <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/9.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m4.jpg')}}" alt="Image Not Found">
                                            <a href="#">Amaul Joey</a>
                                        </div>
                                        <h4><a href="course-single-2.html">How to create a dyanmic app by using Flutter development</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(3.4k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$28.00</del> $15.00</h2>
                                        </div>
                                    </div>
                                </div>
                                 <!-- End Item -->

                            </div>
                            <div class="tab-pane fade" id="tab_3" role="tabpanel" aria-labelledby="tabs_3">
                                <!-- Single Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/11.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                            By <a href="#">Aleesha Brown</a>
                                        </div>
                                        <h4><a href="course-single-2.html">WordPress website complete development.</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(2.8k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$36.00</del> $22.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->

                                 <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/4.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m4.jpg')}}" alt="Image Not Found">
                                            <a href="#">Amaul Joey</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Complete React Front-end developer course</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(3.4k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$53.00</del> $45.00</h2>
                                        </div>
                                    </div>
                                </div>
                                 <!-- End Item -->

                                <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/6.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m3.jpg')}}" alt="Image Not Found">
                                            <a href="#">Sarah Albert</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Dynamic website development to make money from online</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <span>(1k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 244 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$26.00</del> $18.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            </div>
                            <div class="tab-pane fade" id="tab_4" role="tabpanel" aria-labelledby="tabs_4">
                                <!-- Single Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/7.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                            By <a href="#">Aleesha Brown</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Best live Figma Courses online with expertise certificates</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(2.8k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$68.00</del> $52.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->

                                 <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/4.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m4.jpg')}}" alt="Image Not Found">
                                            <a href="#">Amaul Joey</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Basic to Advance UX & UI Design and live Training Course</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(3.4k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$34.00</del> $25.00</h2>
                                        </div>
                                    </div>
                                </div>
                                 <!-- End Item -->

                                <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/8.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m3.jpg')}}" alt="Image Not Found">
                                            <a href="#">Sarah Albert</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Dynamic website development to make money from online</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <span>(1k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 244 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$26.00</del> $14.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            </div>
                            <div class="tab-pane fade" id="tab_5" role="tabpanel" aria-labelledby="tabs_5">
                                <!-- Single Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/2.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                            By <a href="#">Aleesha Brown</a>
                                        </div>
                                        <h4><a href="course-single-2.html">English grammar courses online with real certificates</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(2.8k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$49.00</del> $36.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->

                                 <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/6.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m4.jpg')}}" alt="Image Not Found">
                                            <a href="#">Amaul Joey</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Dynamic website development to make money from online</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(3.4k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 12 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$35.00</del> $27.00</h2>
                                        </div>
                                    </div>
                                </div>
                                 <!-- End Item -->

                                <!-- Start Item -->
                                <div class="course-style-one-item hover-less list-layout">
                                    <div class="thumb">
                                        <img src="{{asset('frontend/assets/img/courses/5.jpg')}}" alt="Image Not Found">
                                    </div>
                                    <div class="info">
                                        <div class="author">
                                            <img src="{{asset('frontend/assets/img/team/m3.jpg')}}" alt="Image Not Found">
                                            <a href="#">Sarah Albert</a>
                                        </div>
                                        <h4><a href="course-single-2.html">Online learning management system & learn dash course</a></h4>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <div class="course-rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <span>(1k)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user"></i> 244 Students
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottom-meta">
                                            <a href="course-single-2.html">Enroll Now <i class="fas fa-long-arrow-right"></i></a>
                                            <h2 class="price"><del>$25.00</del> $14.00</h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Crouse -->

    <!-- Start Brand Area
    ============================================= -->
    <div class="brand-style-two-area dark-optional text-light relative overflow-hidden">
        <div class="brand-style-two">
            <div class="container-fill">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-items">
                            <div class="brand-conetnt">
                                <div class="item">
                                    <h2>University</h2>
                                </div>
                                <div class="item">
                                    <h2>Online&nbsp;Course</h2>
                                </div>
                                <div class="item">
                                    <h2>Teaching</h2>
                                </div>
                                <div class="item">
                                    <h2>Students</h2>
                                </div>
                            </div>
                            <div class="brand-conetnt">
                                <div class="item">
                                    <h2>University</h2>
                                </div>
                                <div class="item">
                                    <h2>Online&nbsp;Course</h2>
                                </div>
                                <div class="item">
                                    <h2>Teaching</h2>
                                </div>
                                <div class="item">
                                    <h2>Students</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand Area -->

    <!-- Start Join Us
    ============================================= -->
    <div class="join-us-style-two-area default-padding bg-gray-gradient-secondary">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-7 pr-60 pr-md-15 pr-xs-15">
                    <div class="thumb-style-four">
                        <div class="left wow fadeInUp">
                            <img src="{{asset('frontend/assets/img/thumb/17.jpg')}}" alt="Image Not Found">
                        </div>
                        <div class="right">
                            <div class="fun-fact wow fadeInUp" data-wow-delay="200ms">
                                <div class="icon">
                                    <img src="{{asset('frontend/assets/img/icon/53.png')}}" alt="Image Not Found">
                                </div>
                                <div class="info">
                                    <div class="counter">
                                        <div class="timer" data-to="56" data-speed="2000">56</div>
                                        <div class="operator">K</div>
                                    </div>
                                    <span class="medium">Students Enrolled</span>
                                </div>
                            </div>
                            <div class="thumb wow fadeInUp" data-wow-delay="400ms">
                                <img src="{{asset('frontend/assets/img/thumb/18.jpg')}}" alt="Image Not Found">
                                <a href="https://www.youtube.com/watch?v=pv648_qOz94" class="popup-youtube video-play-button"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="info-style-one">
                        <h4 class="sub-title">Join with us</h4>
                        <h2 class="title split-text">Our commitment to diversity leadership</h2>
                        <ul class="list-style-five wow fadeInUp" data-wow-delay="300ms">
                            <li>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info">
                                    <h4>Learn from Anywhere</h4>
                                    <p>
                                        Education is a key to success and freedom from all the forces is a power and makes a person powerful.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <div class="info">
                                    <h4>Flexible Classes</h4>
                                    <p>
                                        Career is a key to success and freedom from all the forces is a power and makes a person powerful.
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <a class="btn btn-md btn-gradient animation mt-30" href="contact-us.html">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Join Us -->

    <!-- Start Pricing
    ============================================= -->
    <div class="pricing-style-one-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Pricing Plan</h4>
                        <h2 class="title split-text">Select your best plan from our pricing list</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="pricing-style-one-items wow fadeInUp">
                <div class="row">
                    <div class="col-xl-4 col-lg-12">
                        <ul class="nav nav-tabs pricing-tab-navs" id="myTab_2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tabs_11" data-bs-toggle="tab" data-bs-target="#tab_11" type="button" role="tab" aria-controls="tab_11" aria-selected="true">
                                    Monthly
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tabs_22" data-bs-toggle="tab" data-bs-target="#tab_22" type="button" role="tab" aria-controls="tab_22" aria-selected="false">
                                    Annually
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-8 col-lg-12 pl-50 pl-md-15 pl-xs-15">
                        <div class="tab-content pricing-tab-content" id="myTabContent_2">
                            <div class="tab-pane fade show active" id="tab_11" role="tabpanel" aria-labelledby="tabs_11">
                                <ul class="pricing-list">
                                    <li>Resources Limit (180) <i class="fas fa-check-circle"></i></li>
                                    <li>Lifetime course access <i class="fas fa-check-circle"></i></li>
                                    <li>Instructor Interaction <i class="fas fa-check-circle"></i></li>
                                    <li>Verified certificate <i class="fas fa-check-circle"></i></li>
                                    <li>Real-time interaction <i class="fas fa-times-circle"></i></li>
                                    <li>24/7 System monitoring <i class="fas fa-times-circle"></i></li>
                                </ul>
                                <!-- Single item -->
                                <div class="pricing-style-one-item">
                                    <div class="info">
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/54.html')}}" alt="Image Not Found">
                                        </div>
                                        <div class="content">
                                            <h4>Basic Plan</h4>
                                            <p>
                                                Bundle for beginner
                                            </p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <h2>$29 <strong>Per Month</strong></h2>
                                    </div>
                                    <div class="button">
                                        <a class="btn circle btn-sm btn-dark animation" href="contact-us.html">Enroll Now</a>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <!-- Single item -->
                                <div class="pricing-style-one-item active">
                                    <div class="info">
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/55.html')}}" alt="Image Not Found">
                                        </div>
                                        <div class="content">
                                            <h4>Advanced Plan</h4>
                                            <p>
                                                Bundle for Mid-Level
                                            </p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <h2>$56 <strong>Per Month</strong></h2>
                                    </div>
                                    <div class="button">
                                        <a class="btn circle btn-sm btn-dark animation" href="contact-us.html">Enroll Now</a>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <!-- Single item -->
                                <div class="pricing-style-one-item">
                                    <div class="info">
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/56.html')}}" alt="Image Not Found">
                                        </div>
                                        <div class="content">
                                            <h4>Premium Plan</h4>
                                            <p>
                                                Bundle for Expert
                                            </p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <h2>$75 <strong>Per Month</strong></h2>
                                    </div>
                                    <div class="button">
                                        <a class="btn circle btn-sm btn-dark animation" href="contact-us.html">Enroll Now</a>
                                    </div>
                                </div>
                                <!-- End Single item -->
                            </div>
                            <div class="tab-pane fade" id="tab_22" role="tabpanel" aria-labelledby="tabs_22">
                                <ul class="pricing-list">
                                    <li>Resources Unlimited <i class="fas fa-check-circle"></i></li>
                                    <li>Lifetime course access <i class="fas fa-check-circle"></i></li>
                                    <li>Instructor Interaction <i class="fas fa-check-circle"></i></li>
                                    <li>Verified certificate <i class="fas fa-check-circle"></i></li>
                                    <li>Real-time interaction <i class="fas fa-times-circle"></i></li>
                                    <li>24/7 System monitoring <i class="fas fa-times-circle"></i></li>
                                </ul>
                                <!-- Single item -->
                                <div class="pricing-style-one-item">
                                    <div class="info">
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/54.html')}}" alt="Image Not Found">
                                        </div>
                                        <div class="content">
                                            <h4>Basic Plan</h4>
                                            <p>
                                                Bundle for beginner
                                            </p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <h2>$65 <strong>Per Month</strong></h2>
                                    </div>
                                    <div class="button">
                                        <a class="btn circle btn-sm btn-dark animation" href="contact-us.html">Enroll Now</a>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <!-- Single item -->
                                <div class="pricing-style-one-item active">
                                    <div class="info">
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/55.html')}}" alt="Image Not Found">
                                        </div>
                                        <div class="content">
                                            <h4>Advanced Plan</h4>
                                            <p>
                                                Bundle for Mid-Level
                                            </p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <h2>$98 <strong>Per Month</strong></h2>
                                    </div>
                                    <div class="button">
                                        <a class="btn circle btn-sm btn-dark animation" href="contact-us.html">Enroll Now</a>
                                    </div>
                                </div>
                                <!-- End Single item -->
                                <!-- Single item -->
                                <div class="pricing-style-one-item">
                                    <div class="info">
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/56.html')}}" alt="Image Not Found">
                                        </div>
                                        <div class="content">
                                            <h4>Premium Plan</h4>
                                            <p>
                                                Bundle for Expert
                                            </p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <h2>$350 <strong>Per Month</strong></h2>
                                    </div>
                                    <div class="button">
                                        <a class="btn circle btn-sm btn-dark animation" href="contact-us.html">Enroll Now</a>
                                    </div>
                                </div>
                                <!-- End Single item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing -->

    <!-- Start Testimonial
    ============================================= -->
    <div class="testimonial-style-three-area default-padding bg-gray-gradient-secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-style-three-info wow fadeInUp">
                        <div class="shape">
                            <img src="{{asset('frontend/assets/img/illustration/10.html')}}" alt="Image Not Found">
                        </div>
                        <div class="top-info">
                            <h4 class="sub-title">Testimonials</h4>
                            <h2 class="title split-text">Latest reviews from our satisfied students</h2>
                        </div>
                        <div class="review-cards">
                            <div class="top">
                                <h5>Reviews On</h5>
                                <div class="ratings">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="review-provider">
                                <img src="{{asset('frontend/assets/img/brand/7.html')}}" alt="Image Not Found">
                                <span>4.9/ 60 Reviews</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-40 pl-md-15 pl-xs-15">
                    <div class="testimonial-style-three-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">

                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="testimonial-style-three">
                                    <div class="d-flex">
                                        <div class="top-info">
                                            <h4>Awesome Courses</h4>
                                            <div class="ratings">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/quote.html')}}" alt="Image Not Found">
                                        </div>
                                    </div>
                                    <p>
                                        Education is the most powerful tool to change the world One thing that can’t be taken from you. A mind is a terrible thing to waste. Education is a key to succes.
                                    </p>
                                    <div class="provider">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/assets/img/team/m5.jpg')}}" alt="Image Not Found">
                                        </div>
                                        <div class="info">
                                            <h4>Amanulla Joey</h4>
                                            <span>React Batch - 35</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->

                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="testimonial-style-three">
                                    <div class="d-flex">
                                        <div class="top-info">
                                            <h4>Best Course Ever</h4>
                                            <div class="ratings">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/quote.html')}}" alt="Image Not Found">
                                        </div>
                                    </div>
                                    <p>
                                        Perfect Course is the most powerful tool to change the world One thing that can’t be taken from you. A mind is a terrible thing to waste. Education is a key to succes.
                                    </p>
                                    <div class="provider">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/assets/img/team/m2.jpg')}}" alt="Image Not Found">
                                        </div>
                                        <div class="info">
                                            <h4>Kennsual Martin</h4>
                                            <span>Laravel Batch - 28</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->

                            <!-- Single Item -->
                            <div class="swiper-slide">
                                <div class="testimonial-style-three">
                                    <div class="d-flex">
                                        <div class="top-info">
                                            <h4>Great Quality</h4>
                                            <div class="ratings">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <img src="{{asset('frontend/assets/img/icon/quote.html')}}" alt="Image Not Found">
                                        </div>
                                    </div>
                                    <p>
                                        I love this course is the most powerful tool to change the world One thing that can’t be taken from you. A mind is a terrible thing to waste. Education is a key to succes.
                                    </p>
                                    <div class="provider">
                                        <div class="thumb">
                                            <img src="{{asset('frontend/assets/img/team/m3.jpg')}}" alt="Image Not Found">
                                        </div>
                                        <div class="info">
                                            <h4>Kamal Abraham</h4>
                                            <span>PHP Course</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial -->

    <!-- Start Join Us
    ============================================= -->
    <div class="join-us-style-one-area text-light default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="join-us-style-one-item bg-gradient wow fadeInUp">
                        <div class="shape">
                            <img src="{{asset('frontend/assets/img/shape/52.html')}}" alt="Image Not Found">
                        </div>
                        <div class="info">
                            <span>Join us today</span>
                            <h2>Become an expert Instructor</h2>
                            <p>
                                Learn at your own pace, move the between multiple courses.
                            </p>
                            <a class="btn circle btn-sm btn-light animation" href="contact-us.html">Apply Now</a>
                        </div>
                        <div class="thumb">
                            <img src="{{asset('frontend/assets/img/illustration/7.html')}}" alt="Image Not Found">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="join-us-style-one-item bg-dark active wow fadeInUp" data-wow-delay="300ms">
                        <div class="shape">
                            <img src="{{asset('frontend/assets/img/shape/52.html')}}" alt="Image Not Found">
                        </div>
                        <div class="info">
                            <span>Start learning</span>
                            <h2>Become a skilled pro learner</h2>
                            <p>
                                Learn at your own pace, move the between multiple courses.
                            </p>
                            <a class="btn btn-sm btn-theme circle animation" href="contact-us.html">Apply Now</a>
                        </div>
                        <div class="thumb">
                            <img src="{{asset('frontend/assets/img/illustration/8.html')}}" alt="Image Not Found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Join Us -->

    <!-- Start Faq
    ============================================= -->
    <div class="faq-style-one-area default-padding bg-gray-gradient-secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="faq-style-one-info">
                        <h4 class="sub-title">Frequently asked question</h4>
                        <h2 class="title split-text">General Asked Questions</h2>
                        <div class="question-card wow fadeInUp">
                            <h4>Do you still have any question?</h4>
                            <p>
                                Quick answers to questions you may have. Can't find what you're looking for? Get in touch with us.
                            </p>
                            <a class="btn circle btn-sm btn-theme animation" href="contact-us.html">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="faq-style-one-items wow fadeInUp" data-wow-delay="300ms">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item faq-style-one">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How do I enroll in a course?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item faq-style-one">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Can I access my courses on mobile devices?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Always had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item faq-style-one">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        What benefits does online education offer?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>
                                            Perfect happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq  -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area home-blog-style-two default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="sub-title">Blog Insight</h4>
                        <h2 class="title split-text">Valuable insights to change your startup idea</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-two-item wow fadeInUp">
                        <div class="thumb">
                            <img src="{{asset('frontend/assets/img/blog/5.jpg')}}" alt="Image not Found">
                            <ul class="blog-meta">
                                <li><a href="#">Courses</a></li>
                                <li><i class="fas fa-calendar-alt"></i> October 18, 2025</li>
                            </ul>
                        </div>
                        <div class="info">
                            <h3 class="blog-title">
                                <a href="blog-single-with-sidebar.html">Prefabrice passive are house most memorable</a>
                            </h3>
                            <p>
                                Plan upon yet way get cold spot its week almost do am or limits hearts resolve parties.
                            </p>
                            <a href="blog-single-with-sidebar.html" class="btn-read-more">Read More <i class="fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-two-item wow fadeInUp" data-wow-delay="200ms">
                        <div class="thumb">
                            <img src="{{asset('frontend/assets/img/blog/3.jpg')}}" alt="Image not Found">
                            <ul class="blog-meta">
                                <li><a href="#">Laravel</a></li>
                                <li><i class="fas fa-calendar-alt"></i> November 15, 2025</li>
                            </ul>
                        </div>
                        <div class="info">
                            <h3 class="blog-title">
                                <a href="blog-single-with-sidebar.html">Announcing attachment resolution perform</a>
                            </h3>
                            <p>
                                Taking upon yet way get cold spot its week almost do am or limits hearts resolve parties.
                            </p>
                            <a href="blog-single-with-sidebar.html" class="btn-read-more">Read More <i class="fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 col-lg-6 mb-30">
                    <div class="home-blog-style-two-item wow fadeInUp" data-wow-delay="400ms">
                        <div class="thumb">
                            <img src="{{asset('frontend/assets/img/blog/4.jpg')}}" alt="Image not Found">
                            <ul class="blog-meta">
                                <li><a href="#">WordPress</a></li>
                                <li><i class="fas fa-calendar-alt"></i> December 13, 2025</li>
                            </ul>
                        </div>
                        <div class="info">
                            <h3 class="blog-title">
                                <a href="blog-single-with-sidebar.html">Resolution performing the regular sentim.</a>
                            </h3>
                            <p>
                                Media upon yet way get cold spot its week almost do am or limits hearts resolve parties.
                            </p>
                            <a href="blog-single-with-sidebar.html" class="btn-read-more">Read More <i class="fas fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- End Blog -->

    <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    @include('frontend.partials.script')

</body>

</html>
