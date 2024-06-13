<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hotelier </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!--Template style -->
    <!--Fav icon-->
    <link rel="icon" type="image/png" sizes="16x16" href="images/10.png">
    <!-- datepikar plugin -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!--animate css-->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <!--bootstrap css-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <!--fonts css-->
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <!--font-awesome css-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <!-- carousal css -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <!-- custom css-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <!--favicon-->
	
	<link rel="stylesheet" type="text/css" href="css/style_index.css" />

</head>

<style>
    .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 10px;
            padding: 20px;
            /*max-width: 1000px;*/
            margin: auto;
			margin: auto;
			max-width: 100%;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .gallery-item.large {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-item-title {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            text-align: center;
            padding: 10px;
            box-sizing: border-box;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-item-title {
            opacity: 1;
        }

        /* เพิ่ม media query เพื่อปรับแสดงผลในโหมดมือถือ */
        @media (max-width: 600px) {
            .gallery-item.large {
                grid-column: auto; /* คืนค่าเป็น auto สำหรับรูปขนาดใหญ่ */
                grid-row: auto;
            }

            .gallery-container {
                grid-template-columns: 1fr; /* แสดงรูปตามคอลัมน์เดียว */
            }
        }
</style>

<body>
    <!-- return-to-top start-->
    <a href="javascript:" id="return-to-top"><i class="fas fa-sort-up"></i></a>
    <!-- return-to-top-end -->
    <!-- HEADER START-->


    <!--<div class="main_wrapper sign-up-header">
        <div class="main_menu_wrapper header-color">-->
	<div class="main_wrapper">
		<div class="main_menu_wrapper">
            <!-- main_menu_navbar start -->
            <div class="main_menu_navbar ">
                <? include('includes/topbar.php'); ?>
            </div>
        </div>

    <!-- mobile_menu_main start -->

    <!-- mobile_menu_main end -->

    
</div>
    <!-- sidebar end -->

    <!--HEADER END-->
    <!-- sign up banner start-->
    <div class="gallery-container">
        <div class="gallery-item large">
            <img src="images/Home_1/Home_5.jpg" alt="Image 1">
            <div class="gallery-item-title">Image 1</div>
        </div>
        <div class="gallery-item">
            <img src="images/Home_1/Home_6.jpg" alt="Image 2">
            <div class="gallery-item-title">Image 2</div>
        </div>
        <div class="gallery-item">
            <img src="images/Home_1/Home_7.jpg" alt="Image 3">
            <div class="gallery-item-title">Image 3</div>
        </div>
        <div class="gallery-item">
            <img src="images/Home_1/Home_9.jpg" alt="Image 4">
            <div class="gallery-item-title">Image 4</div>
        </div>
        <div class="gallery-item">
            <img src="images/Home_1/Home_10.jpg" alt="Image 5">
            <div class="gallery-item-title">Image 5</div>
        </div>
    </div>
    <div class="hs-banner-wrapper ">
        <div class="owl-carousel owl-theme p-rel">
            <div class="item">
                <div>
                    <img src="images/slider-1.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div>
                    <img src="images/slider-2.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div>
                    <img src="images/slider-3.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div>
                    <img src="images/slider-2.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div>
                    <img src="images/slider-3.jpg" alt="">
                </div>
            </div>
            <div class="item">
                <div>
                    <img src="images/slider-1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="hs-blog-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="hs-blog-content">
                        <h3><a href="">Hotel Sayaji indore</a></h3>
                        <div class="pt-20">
                            <a href="" class="text-color"><span><i class="fas fa-map-marker-alt text-color"></i></span>
                                50 Vijay Nagar, Indore, INDIA</a>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <span class="res-block">
                                <a href="javascript:;"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i>
                                    <i class="far fa-star"></i><i class="far fa-star"></i> <span>| 251 + Review</span>
                                </a>
                            </span>
                        </div>
                        <div class="pt-20">
                            Start From- <span class="text-design">$50 / Night</span>
                        </div>
                        <p class="pt-20">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis
                            bibendum auctor, nisi elit consequat as sum, nec sagittis sem nibh id elit. Duis sed odio
                            sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsn sum velit. Nam nec tellus a
                            odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor e in elit.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                            Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. </p>
                        <div id="hs-list-items">
                            <ul>
                                <li><a href="">-Hotel Timmings</a></li>
                                <li><a href="">-Term & Condition</a></li>
                                <li><a href="">-What kind of foowear is most suitable ? </a></li>
                                <li><a href="">-Can i bring Alcohol top this trip?</a></li>
                            </ul>
                            <ul>
                                <li><a href="">-Hotel Timmings</a></li>
                                <li><a href="">-Term & Condition</a></li>
                                <li><a href="">-What kind of foowear is most suitable ? </a></li>
                                <li><a href="">-Can i bring Alcohol top this trip?</a></li>
                            </ul>
                        </div>
                        <p class="pt-20">
                            This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                            nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan
                            ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat
                            consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia
                            nostra, per inceptos himenaeos. Mauris in erat justo.
                        </p>
                    </div>
                    <div class="bs-social-content mt-30">
                        <ul>
                            <li><a href="javascript:;"><i class="fas fa-tags"></i></a></li>
                            <li><a href="javascript:;">family</a></li>
                            <li><a href="javascript:;">fun</a></li>
                            <li><a href="javascript:;">holiday</a></li>
                            <li><a href="javascript:;">island</a></li>
                            <li><a href="javascript:;">package</a></li>
                        </ul>
                        <ul class="social-icon ">
                            <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="hs-servicer-sec">
                        <h4><a href="">The Best Service</a></h4>
                        <ul>
                            <li class="t-center text-color">
                                <span><i class="fas fa-car"></i></span>
                                <h5><a href="">Convenient<br>
                                        Transport</a></h5>
                            </li>
                            <li class="t-center text-color">

                                <span><i class="fas fa-utensils"></i></span>
                                <h5><a href="">Best<br>
                                        Gastronomy</a></h5>
                            </li>
                            <li class="t-center text-color">
                                <span><i class="fas fa-camera"></i></span>
                                <h5><a href="">Wildlife<br>
                                        Viewing</a></h5>
                            </li>
                            <li class="t-center text-color">
                                <span><i class="fas fa-coffee"></i></span>
                                <h5><a href="">Good<br>
                                        Drinks</a></h5>
                            </li>
                            <li class="t-center ">
                                <span><i class="fas fa-star text-color"></i></span>
                                <h5><a href="">Nice<br>
                                        Interior</a></h5>
                            </li>

                        </ul>
                    </div>
                    <div class="hs-tour-sec">
                        <h4><a href="">Take a Tour</a></h4>
                        <!-- Button trigger modal -->
                        <div id="video-popup" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <a href="javascript:;"><img src="images/Play-Icon.png" alt=""></a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" >
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="https://www.youtube.com/embed/f0zlUPpuNNw"
                                            title="YouTube video player" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hs-pricing-table page-content p-30">
                        <h4><a href="">Pricing-plan</a></h4>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="card">
                                    <h5><a href="">comfort room</a></h5>
                                    <img src="images/table-image.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="">Free Wifi Zone</a></li>
                                            <li><a href="">Morning Tea</a></li>
                                            <li><a href="">Free Lunch</a></li>
                                            <li><a href="">Swmming Pool</a></li>
                                            <li><a href="">Free Spa</a></li>
                                        </ul>
                                        <a href="" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="card">
                                    <h5><a href="">Luxury Room</a></h5>
                                    <img src="images/table-image-2.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="">Free Wifi Zone</a></li>
                                            <li><a href="">Morning Tea</a></li>
                                            <li><a href="">Free Lunch</a></li>
                                            <li><a href="">Swmming Pool</a></li>
                                            <li><a href="">Free Spa</a></li>
                                        </ul>
                                        <a href="" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="card">
                                    <h5><a href="">deluxe Room</a></h5>
                                    <img src="images/table-image-3.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="">Free Wifi Zone</a></li>
                                            <li><a href="">Morning Tea</a></li>
                                            <li><a href="">Free Lunch</a></li>
                                            <li><a href="">Swmming Pool</a></li>
                                            <li><a href="">Free Spa</a></li>
                                        </ul>
                                        <a href="" class="btn btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hs-map-sec">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4><a href="">Hotel Location</a></h4>
                                <div style="width: 100%; height: 500px;">
                                    <div class="with-amp">
                                        <div class="map-view">
                                              <div class="google-map" id="google_map"></div>
                                        </div>  
                                      </div>
                                </div>
                                <div class="hs-box">
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">


                                            <span><i class="fas fa-phone-alt"></i></span>
                                            <div class="f-right">
                                                <a href="">Toll free</a>
                                                <h6><a href="">808 111 9999</a>
                                                </h6>
                                            </div>


                                        </div>

                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">


                                            <span><i class="far fa-envelope"></i></span>
                                            <div class="f-right n-border">
                                                <a href="">Email Us</a>
                                                <h6><a href="">listing@example.com</a>
                                                </h6>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hs-rating-section">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4><a href="">Rating</a></h4>
                                <div class="total-rating">
                                    <div class="overall-score">4.5</div>
                                    <div class="overall-info">Overall Rating of 251 guest rating</div>
                                </div>
                                <div class="rating-progress-items">
                                    <div class="rating-progress-item">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 80%"></div>
                                        </div>
                                        <div class="number">03</div>
                                    </div>
                                    <div class="rating-progress-item">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width:92%"></div>
                                        </div>
                                        <div class="number">05</div>
                                    </div>
                                    <div class="rating-progress-item">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width:40%"></div>
                                        </div>
                                        <div class="number">02</div>
                                    </div>
                                    <div class="rating-progress-item">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width:20%"></div>
                                        </div>
                                        <div class="number">01</div>
                                    </div>
                                    <div class="rating-progress-item">
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width:0"></div>
                                        </div>
                                        <div class="number">00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li>
                                        <h4 class="p-0">
                                            <a href="">Your Review</a>
                                        </h4>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </li>
                                </ul>
                                <form  class="contact-form">
                                    <input type="text" name="fname" id="fname" placeholder="Name" class="w-50">
                                    <input type="email" name="mail" id="mail" placeholder="Email" class="w-50">
                                    <input type="text" name="title" id="title" placeholder="Title" class="w-100">
                                    <textarea name="message" rows="3" class="w-100">Comments</textarea>
                                    <a href="" class="btn btn-primary">Submit</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bs-comment-text p-30 mt-30">

                        <div class="bs-cont-wrapper p-30">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                    <a href=""> <img src="images/blog-005.jpg" alt=""></a>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                    <div class="sb-commment-text">
                                        <ul>
                                            <li>
                                                <h6><a href="javascript:;">Liza D'souza</a><span>&nbsp; 10:45
                                                        AM</span></h6>
                                            </li>
                                            <li class="left-side">
                                                April 25, 2020&nbsp; &nbsp; <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> </a>
                                                </span>
                                            </li>
                                        </ul>
                                        <p class="p-0">“Nulla facilisi. Nulla ornare condimentum dui, sit amet
                                            condimentum elit rhoncus sit amet. uspendis ctus leo nisi. This is
                                            Photoshop's version of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bs-cont-wrapper p-30">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                    <a href=""> <img src="images/blog-006.jpg" alt=""></a>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                    <div class="sb-commment-text">
                                        <ul>
                                            <li>
                                                <h6><a href="javascript:;">Liza D'souza</a><span>&nbsp; 10:45
                                                        AM</span></h6>
                                            </li>
                                            <li class="left-side">
                                                April 25, 2020&nbsp; &nbsp; <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> </a>
                                                </span>
                                            </li>
                                        </ul>
                                        <p class="p-0">“Nulla facilisi. Nulla ornare condimentum dui, sit amet
                                            condimentum elit rhoncus sit amet. uspendis ctus leo nisi. This is
                                            Photoshop's version of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bs-cont-wrapper p-30">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                    <a href=""><img src="images/blog-007.jpg" alt=""></a>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                    <div class="sb-commment-text">
                                        <ul>
                                            <li>
                                                <h6><a href="javascript:;">Liza D'souza</a><span>&nbsp; 10:45
                                                        AM</span></h6>
                                            </li>
                                            <li class="left-side">
                                                April 25, 2020&nbsp; &nbsp; <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> </a>
                                                </span>
                                            </li>
                                        </ul>
                                        <p class="p-0">“Nulla facilisi. Nulla ornare condimentum dui, sit amet
                                            condimentum elit rhoncus sit amet. uspendis ctus leo nisi. This is
                                            Photoshop's version of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bs-cont-wrapper p-30 pb-0 ">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                    <a href=""><img src="images/blog-008.jpg" alt=""></a>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                    <div class="sb-commment-text">
                                        <ul>
                                            <li>
                                                <h6><a href="javascript:;">Liza D'souza</a><span>&nbsp; 10:45
                                                        AM</span></h6>
                                            </li>
                                            <li class="left-side">
                                                April 25, 2020&nbsp; &nbsp; <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> </a>
                                                </span>
                                            </li>
                                        </ul>
                                        <p class="p-0">“Nulla facilisi. Nulla ornare condimentum dui, sit amet
                                            condimentum elit rhoncus sit amet. uspendis ctus leo nisi. This is
                                            Photoshop's version of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="hs-slidebar sb-grid-main-wrapper p-0">
                        <div class="find-us-wrapper pb-0">
                            <h4 class="pb-20"><a href="javascript:;">Check Availability</a></h4>
                            <ul>
                                <li>
                                    <input type="text" placeholder="Name">
                               
                                </li>
                                <li>
                                    <input type="text" placeholder="Email">
                                   
                                </li>
                                <li>
                                    <input type="text" placeholder="Number">
                                 
                                </li>
                                <li>
                                    <input type="text" name="picker" class="datepicker" placeholder="09-04-2020">
                                    <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 19 20" width="19" height="20">
                                        <title>Icon </title>
                                        <style>
                                            tspan {
                                                white-space: pre
                                            }

                                            .shp0 {
                                                fill: #1b72ea
                                            }
                                        </style>
                                        <path id="Icon" class="shp0"
                                            d="M17.94 5.32C17.83 4.78 17.57 4.3 17.2 3.93C17.08 3.82 16.95 3.7 16.8 3.61L16.78 3.59C16.77 3.57 16.75 3.57 16.73 3.56C16.67 3.52 16.62 3.48 16.56 3.46L16.54 3.46C16.15 3.26 15.72 3.15 15.23 3.15L14.07 3.15L14.07 2.35C14.07 2.17 13.93 2 13.72 2C13.53 2 13.36 2.15 13.36 2.35L13.36 3.11L6.65 3.11L6.65 2.35C6.65 2.17 6.49 2 6.3 2C6.11 2 5.94 2.15 5.94 2.35L5.94 3.11L4.78 3.11C4.43 3.11 4.07 3.18 3.76 3.31C3.4 3.46 3.08 3.67 2.82 3.93C2.67 4.08 2.54 4.24 2.43 4.41C2.32 4.59 2.22 4.78 2.15 4.98C2.11 5.09 2.07 5.21 2.06 5.32C2.02 5.5 2 5.69 2 5.87L2 7.73L2 16.27C2 17.03 2.32 17.72 2.8 18.2C3.31 18.7 4 19 4.75 19L15.25 19C16.02 19 16.71 18.68 17.2 18.2C17.7 17.7 18 17.01 18 16.27L18 7.73L18 5.87C18 5.69 17.98 5.5 17.94 5.32ZM2.73 5.85C2.73 5.71 2.75 5.58 2.77 5.45C2.78 5.32 2.84 5.19 2.88 5.06C2.95 4.89 3.05 4.74 3.14 4.61C3.2 4.54 3.25 4.48 3.31 4.41C3.42 4.3 3.55 4.2 3.68 4.11C4 3.93 4.35 3.82 4.75 3.82L5.91 3.82L5.91 4.57C5.91 4.76 6.06 4.93 6.26 4.93C6.45 4.93 6.62 4.78 6.62 4.57L6.62 3.82L13.42 3.82L13.42 4.57C13.42 4.76 13.57 4.93 13.78 4.93C13.96 4.93 14.13 4.78 14.13 4.57L14.13 3.82L15.29 3.82C15.68 3.82 16.06 3.93 16.36 4.11C16.49 4.2 16.62 4.3 16.73 4.41C17.01 4.69 17.21 5.04 17.29 5.45C17.31 5.58 17.33 5.72 17.33 5.85L17.33 7.37L2.73 7.37L2.73 5.85ZM17.35 16.25C17.35 16.83 17.12 17.35 16.75 17.72C16.37 18.09 15.85 18.31 15.29 18.31L4.78 18.31C4.22 18.31 3.7 18.09 3.33 17.72C2.95 17.35 2.73 16.83 2.73 16.27L2.73 8.06L17.35 8.06L17.35 16.25L17.35 16.25Z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <input type="text" name="picker" class="datepicker" placeholder="09-04-2020">
                                    <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 19 20" width="19" height="20">
                                        <title>Icon </title>
                                        <style>
                                            tspan {
                                                white-space: pre
                                            }

                                            .shp0 {
                                                fill: #1b72ea
                                            }
                                        </style>
                                        <path id="Icon1" class="shp0"
                                            d="M17.94 5.32C17.83 4.78 17.57 4.3 17.2 3.93C17.08 3.82 16.95 3.7 16.8 3.61L16.78 3.59C16.77 3.57 16.75 3.57 16.73 3.56C16.67 3.52 16.62 3.48 16.56 3.46L16.54 3.46C16.15 3.26 15.72 3.15 15.23 3.15L14.07 3.15L14.07 2.35C14.07 2.17 13.93 2 13.72 2C13.53 2 13.36 2.15 13.36 2.35L13.36 3.11L6.65 3.11L6.65 2.35C6.65 2.17 6.49 2 6.3 2C6.11 2 5.94 2.15 5.94 2.35L5.94 3.11L4.78 3.11C4.43 3.11 4.07 3.18 3.76 3.31C3.4 3.46 3.08 3.67 2.82 3.93C2.67 4.08 2.54 4.24 2.43 4.41C2.32 4.59 2.22 4.78 2.15 4.98C2.11 5.09 2.07 5.21 2.06 5.32C2.02 5.5 2 5.69 2 5.87L2 7.73L2 16.27C2 17.03 2.32 17.72 2.8 18.2C3.31 18.7 4 19 4.75 19L15.25 19C16.02 19 16.71 18.68 17.2 18.2C17.7 17.7 18 17.01 18 16.27L18 7.73L18 5.87C18 5.69 17.98 5.5 17.94 5.32ZM2.73 5.85C2.73 5.71 2.75 5.58 2.77 5.45C2.78 5.32 2.84 5.19 2.88 5.06C2.95 4.89 3.05 4.74 3.14 4.61C3.2 4.54 3.25 4.48 3.31 4.41C3.42 4.3 3.55 4.2 3.68 4.11C4 3.93 4.35 3.82 4.75 3.82L5.91 3.82L5.91 4.57C5.91 4.76 6.06 4.93 6.26 4.93C6.45 4.93 6.62 4.78 6.62 4.57L6.62 3.82L13.42 3.82L13.42 4.57C13.42 4.76 13.57 4.93 13.78 4.93C13.96 4.93 14.13 4.78 14.13 4.57L14.13 3.82L15.29 3.82C15.68 3.82 16.06 3.93 16.36 4.11C16.49 4.2 16.62 4.3 16.73 4.41C17.01 4.69 17.21 5.04 17.29 5.45C17.31 5.58 17.33 5.72 17.33 5.85L17.33 7.37L2.73 7.37L2.73 5.85ZM17.35 16.25C17.35 16.83 17.12 17.35 16.75 17.72C16.37 18.09 15.85 18.31 15.29 18.31L4.78 18.31C4.22 18.31 3.7 18.09 3.33 17.72C2.95 17.35 2.73 16.83 2.73 16.27L2.73 8.06L17.35 8.06L17.35 16.25L17.35 16.25Z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <select name="SelectChild" id="SelectChild">
                                        <option value="">1 Adult</option>
                                        <option value="">1 Adult</option>
                                        <option value="">2 Adult</option>
                                        <option value="">1 Adult</option>
                                        <option value="">1 Adult</option>
                                    </select>
                                </li>
                                <li>
                                    <select name="SelectChild1" id="SelectChild1">
                                        <option value=""> 0 Child</option>
                                        <option value=""> 1 Child</option>
                                        <option value=""> 0 Child</option>
                                        <option value=""> 0 Child</option>
                                        <option value=""> 0 Child</option>
                                    </select>
                                </li>
                                <li>
                                    <select name="SelectChild2" id="SelectChild2">
                                        <option value="" disabled selected>Room Type</option>
                                        <option value="">Room Type</option>
                                        <option value="">Room Type</option>
                                        <option value="">Room Type</option>
                                        <option value="">Room Type</option>
                                    </select>
                                </li>

                                <li class="rating-wrapper p-30">
                                    <ul>
                                        <li class="p-rel">

                                            <label >Amount</label>
                                            <span>$350</span>
                                        </li>
                                        <li class="p-rel">

                                            <label >service charges</label>
                                            <span >$15</span>
                                        </li>
                                        <li class="p-rel">

                                            <label >Tex-paid</label>
                                            <span >$3</span>
                                        </li>
                                       <li><hr></li>
                                        <li class="p-rel">

                                            <label >Total Amount</label>
                                            <span  class="color">$368</span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="btn btn-primary w-100">Book Now</a>
                                </li>
                            </ul>

                        </div>
                        <div class="feed-wrapper">
                            <h4><a href="javascript:;">Instagram</a></h4>
                            <ul class="footer-feed">
                                <li>
                                    <a href="javascript:;" class="p-rel"><img src="images/f-image-1.jpg" class="p-rel"
                                            alt="">
                                        <span><i class="fab fa-instagram"></i></span>
                                    </a>
                                    <a href="javascript:;" class="p-rel"><img src="images/f-image-2.jpg" class="p-rel"
                                            alt="">
                                        <span> <i class="fab fa-instagram"></i></span>
                                    </a>
                                    <a href="javascript:;" class="p-rel"><img src="images/f-image-3.jpg" class="p-rel"
                                            alt="">
                                        <span> <i class="fab fa-instagram"></i></span>
                                    </a>
                                    <a href="javascript:;" class="p-rel"><img src="images/f-image-4.jpg" class="p-rel"
                                            alt="">
                                        <span><i class="fab fa-instagram"></i></span>
                                    </a>
                                    <a href="javascript:;" class="p-rel"><img src="images/f-image-5.jpg" class="p-rel"
                                            alt="">
                                        <span> <i class="fab fa-instagram"></i></span>
                                    </a>
                                    <a href="javascript:;" class="p-rel"><img src="images/f-image-6.jpg" class="p-rel"
                                            alt="">
                                        <span> <i class="fab fa-instagram"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="holiday-section p-rel">
                            <img src="images/l-sidebar.jpg" alt="" class="">
                            <div>
                                <h3><a href="javascript:;">Summar<br>Holiday<br>20% OFF</a></h3>
                                <button type="button" class="btn btn-light">get code</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- page slider -->
    <div class="hs-slider">
        <div class="slider-wrapper slider1-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <h4><a href="javascript:;">Most Popular Hotels</a></h4>
                        <div class="owl-carousel owl-theme owl-loaded owl-drag">

                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-2672px, 0px, 0px); transition: all 0.25s ease 0s; width: 5345px;">
                                    <div class="owl-item cloned" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-1.jpg" alt=""></a>


                                                </div>
                                                <span>$65 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 48+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;"> Hotel New Sunder</a></h5>
                                                <a href="javascript:;"><span class="clr-text"><i
                                                            class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                        USA</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-2.jpg" alt=""></a>


                                                </div>
                                                <span>$52 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 58+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;">hotel sayaji indore</a></h5>
                                                <span class="clr-text"><i class="fas fa-map-marker-alt"></i> Republic of
                                                    Cuba,
                                                    USA</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-3.jpg" alt=""></a>

                                                </div>
                                                <span>$55 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 88+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;">Hotel New Sunder</a></h5>
                                                <a href="javascript:;"> <span class="clr-text"><i
                                                            class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                        USA</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="sub-main">
                                                <div class="img-sec p-rel">
                                                    <div class="hover-img p-rel">

                                                        <a href="javascript:;"> <img src="images/blog-1.jpg" alt=""></a>

                                                    </div>
                                                    <span>$77 / Night</span>
                                                </div>
                                                <div class="slider-content">
                                                    <span>
                                                        <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i><i class="far fa-star"></i>
                                                            &nbsp; | &nbsp; 88+
                                                            Review</a>
                                                    </span>
                                                    <h5><a href="javascript:;">hotel sayaji indore</a></h5>
                                                    <a href="javascript:;"> <span class="clr-text"><i
                                                                class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                            USA</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-2.jpg" alt=""></a>


                                                </div>
                                                <span>$50 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"><i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 83+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;">Guru kripa indore</a></h5>
                                                <a href="javascript:;"><span class="clr-text"><i
                                                            class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                        USA</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-3.jpg" alt=""></a>

                                                </div>
                                                <span>$72 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 68+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;"> The Ashoka Hotel</a></h5>
                                                <a href="javascript:;"> <span class="clr-text"><i
                                                            class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                        USA</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-1.jpg" alt=""></a>


                                                </div>
                                                <span>$65 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 48+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;"> Hotel New Sunder</a></h5>
                                                <a href="javascript:;"><span class="clr-text"><i
                                                            class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                        USA</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-2.jpg" alt=""></a>


                                                </div>
                                                <span>$52 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 58+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;">hotel sayaji indore</a></h5>
                                                <span class="clr-text"><i class="fas fa-map-marker-alt"></i> Republic of
                                                    Cuba,
                                                    USA</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-3.jpg" alt=""></a>

                                                </div>
                                                <span>$55 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 88+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;">Hotel New Sunder</a></h5>
                                                <a href="javascript:;"> <span class="clr-text"><i
                                                            class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                        USA</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="sub-main">
                                                <div class="img-sec p-rel">
                                                    <div class="hover-img p-rel">

                                                        <a href="javascript:;"> <img src="images/blog-1.jpg" alt=""></a>

                                                    </div>
                                                    <span>$77 / Night</span>
                                                </div>
                                                <div class="slider-content">
                                                    <span>
                                                        <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i><i class="far fa-star"></i>
                                                            &nbsp; | &nbsp; 88+
                                                            Review</a>
                                                    </span>
                                                    <h5><a href="javascript:;">hotel sayaji indore</a></h5>
                                                    <a href="javascript:;"> <span class="clr-text"><i
                                                                class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                            USA</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-2.jpg" alt=""></a>


                                                </div>
                                                <span>$50 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"><i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 83+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;">Guru kripa indore</a></h5>
                                                <a href="javascript:;"><span class="clr-text"><i
                                                            class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                        USA</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 405.34px; margin-right: 40px;">
                                        <div class="item">
                                            <div class="img-sec p-rel">
                                                <div class="hover-img p-rel">

                                                    <a href="javascript:;"> <img src="images/blog-3.jpg" alt=""></a>

                                                </div>
                                                <span>$72 / Night</span>
                                            </div>
                                            <div class="slider-content">
                                                <span>
                                                    <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; |
                                                        &nbsp; 68+ Review</a>
                                                </span>
                                                <h5><a href="javascript:;"> The Ashoka Hotel</a></h5>
                                                <a href="javascript:;"> <span class="clr-text"><i
                                                            class="fas fa-map-marker-alt"></i> Republic of Cuba,
                                                        USA</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav"><button  class="owl-prev"><i
                                        class="fas fa-long-arrow-alt-left"></i></button><button type="button"
                                    class="owl-next"><i
                                        class="fas fa-long-arrow-alt-right"></i></button></div>
                            <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
                                    role="button" class="owl-dot active"><span></span></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <div class="contact-main-wrapper">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0">
                <div class="form">
                    <h5><a href="javascript:;">sign up for newsletter</a></h5>
                    <p>Sign up for our mailing list to get latest updates and offers</p>
                    <form >
                        <div class="input-box p-rel">
                            <span><i class="far fa-envelope"></i></span>
                            <input type="text" placeholder="type your email address">
                            <button>subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0">
                <div class="offer-tag">
                    <h5><a href="javascript:;">Summer Holidays 20% OFF</a></h5>
                    <p>Offer valid for stays now through December 2021</p>
                    <button type="button" class="btn btn-light">Get code</button>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section start -->
    <footer class="footer-main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="sb-footer-logo">
                        <a href="javascript:;" class="f-pd"><img src="images/f-logo-.png" alt=""></a>
                        <p>Travelers are always discoverers,<br> esy those who travel by air. </p>
                        <ul class="footer-social-icon">
                            <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                        <p><a href="javascript:;"><span><i class="fas fa-phone-alt"></i></span> &nbsp; Toll free <br>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;808 111 9999</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-menu">
                        <h5><a href="javascript:;" class="f-pd">Our company</a></h5>
                        <ul>
                            <li><i class="fas fa-caret-right"></i><a href="javascript:;">&nbsp; About</a></li>
                            <li><i class="fas fa-caret-right"></i><a href="javascript:;"> &nbsp;Services</a></li>
                            <li><i class="fas fa-caret-right"></i><a href="javascript:;">&nbsp; Terms</a></li>
                            <li><i class="fas fa-caret-right"></i><a href="javascript:;">&nbsp; FAQ</a></li>

                            <li><i class="fas fa-caret-right"></i><a href="contact-form.html">&nbsp; Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-feed">
                        <h5><a href="javascript:;" class="f-pd">Instagram feed</a></h5>
                        <div class="row gutter">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-0">
                                <a href="javascript:;" class="p-rel"><img src="images/f-image-1.jpg" class="p-rel"
                                        alt="">
                                    <span><i class="fab fa-instagram"></i></span>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-0">
                                <a href="javascript:;" class="p-rel"><img src="images/f-image-2.jpg" class="p-rel"
                                        alt="">
                                    <span> <i class="fab fa-instagram"></i></span>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-0">
                                <a href="javascript:;" class="p-rel"><img src="images/f-image-3.jpg" class="p-rel"
                                        alt="">
                                    <span> <i class="fab fa-instagram"></i></span>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-0">
                                <a href="javascript:;" class="p-rel"><img src="images/f-image-4.jpg" class="p-rel"
                                        alt="">
                                    <span><i class="fab fa-instagram"></i></span>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-0">
                                <a href="javascript:;" class="p-rel"><img src="images/f-image-5.jpg" class="p-rel"
                                        alt="">
                                    <span> <i class="fab fa-instagram"></i></span>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 p-0">
                                <a href="javascript:;" class="p-rel"><img src="images/f-image-6.jpg" class="p-rel"
                                        alt="">
                                    <span> <i class="fab fa-instagram"></i></span>
                                </a>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 col-12">
                                <a href="javascript:;" class="more-feed">view all</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-menu">
                        <h5><a href="javascript:;" class="f-pd">Download App</a></h5>
                        <p>Free App Download for best<br>
                            Tour Experience</p>
                        <a href="javascript:;"><img src="images/play-store.jpg" alt=""></a>
                        <a href="javascript:;"><img src="images/app-store-1.jpg" alt=""></a>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- bottom footer -->
    <div class="bottom-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <p>© 2021-22 Webstrot | All Rights Reserved. Design by <a href="http://www.webstrot.com/">Webstrot</a></p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <ul>
                        <li>
                           <a href=""> <img src="images/icon-logo-1.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="images/icon-logo-2.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="images/icon-logo-3.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="images/icon-logo-4.jpg" alt=""></a>
                        </li>
                        <li>
                          <a href="">  <img src="images/icon-logo-5.jpg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/shortcode.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/functions.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBctr8WYTfFDi_oGbPEolSDzn4VZaAKVK0&amp;callback=googleMap"></script>
</body>

</html>