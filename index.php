<?php 
include('includes/connect_sql.php');
include('includes/fx_project_facility_db.php');

$project_list   = get_project($conn);
$room_list      = get_room_type($conn);

sqlsrv_close($conn);
?>

<!DOCTYPE html>
<!-- 
Template Name: Hotelier
Version: 1.0.0
Author: 

-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx" dir="ltr">
<!--[endif]-->

<head>
    <meta charset="utf-8" />
    <title>SM Smart Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="css/style_index.css" />
	
	

</head>
<style>
	.btn-search {
		height: 46px !important;
		width: 100px !important;
		text-transform: uppercase !important;
		border-radius: 5px !important;
		margin-left: 0px !important;
	}
	
	
	.slider1-wrapper .owl-theme .owl-nav {
		margin-top: 10px;
		position: absolute;
		top: -65px !important;
		right: 0;
		margin-right: 12px;
	}
	.slider-wrapper .owl-theme .owl-nav button i {
		padding: 0 12px !important;
		font-size: 16px;
	}
	.slider-wrapper .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot {
		border: none !important;
	}
	.gallery_section .sub-main {
		border-radius: 0 !important;
	}
	.gallery_section {
		padding: 0 30px 0 16px !important;
	}
	.slider-content, .gallery_section .slider-content {
		border: none !important;
	}
	.gallery_box {
	  border: none;
	  border-radius: 0;
	  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
	}
	.owl-item {
	  border: none;
	  border-radius: 0;
	  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
	}
	.card {
	  border: none;
	  border-radius: 0;
	  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
	}
	.carousel-inner {
	  padding: 1em;
	}
	.carousel-control-prev,
	.carousel-control-next {
	  background-color: #e1e1e1;
	  width: 6vh;
	  height: 6vh;
	  border-radius: 50%;
	  top: 50%;
	  transform: translateY(-50%);
	}
	.carousel-control-prev span,
	.carousel-control-next span {
	  width: 1.5rem;
	  height: 1.5rem;
	}
	@media screen and (min-width: 577px) {
	  .cards-wrapper {
		display: flex;
	  }
	  .card {
		margin: 0 0.5em;
		width: calc(100% / 2);
	  }
	  .image-wrapper {
		height: 20vw;
		margin: 0 auto;
	  }
	}
	@media screen and (max-width: 576px) {
	  .card:not(:first-child) {
		display: none;
	  }
	}

	.image-wrapper img {
	  max-width: 100%;
	  max-height: 100%;
	}
	
	.package-tx-title {
		color: #0d6efd !important;
		font-size: 18px ;
		font-weight: 600;
		cursor: pointer;
	}
	.package-tx-title:hover {
		color: #000 !important;
		font-size: 18px ;
		font-weight: 600;
		cursor: pointer;
	}
	.package-tx-sub {
		color: #000 !important;
		font-size: 14px ;
		cursor: pointer;
		font-weight: 600;
	}
	.package-tx {
		-webkit-line-clamp: 2;
		color: rgba(249, 109, 1, 1.00);
		font-style: normal;
		font-size: 14px ;
	}
	.package-tx-line {
		color: rgba(143, 143, 143, 1.00);
		font-style: normal;
		text-decoration-line: line-through;
		font-size: 14px ;
	}
	.package-period-tt {
		-webkit-line-clamp: 2;
		font-style: normal;
		font-size: 12px ;
	}
	.package-period {
		-webkit-line-clamp: 2;
		color: #000 !important;
		font-style: normal;
		font-size: 14px ;
	}
	.package-img {
		width: 100%;
		height: 100%;
	}
	.discount {
		position: absolute;
		background-color: #e12d2d;
		top: 16px;
		width: 86px;
		border-radius: 4px;
		text-align: center;
		margin: -16px;
	}
	.discount-no {
		font-size: 16px !important;
		color: #fff !important;
	}
	.discount-title {
		font-size: x-small !important;
		color: #fff !important;
	}
	.btn-more {
		width: auto;
		height: auto;
		text-transform: uppercase;
		line-height: 30px;
		color: #fff !important;
		font-size: small;
		background-color: #839287;
		border-color: #839287;
	}

	.tx-title {
		line-height: 30px !important;
		font-size: 16px;
		font-weight: 400;
		cursor: pointer;
	}
	.tx-map {
		-webkit-line-clamp: 2;
		color: #767777 !important;
		font-style: normal;
		font-size: small !important;
	}
	span .fas.fa-star, .gallery_section span .fas.fa-star {
		font-size: small;
		color: #e0b319;
	}
	.icon-ckinout {
		position: absolute; 
		left: 56px; 
		top: 46%; 
		transform: translateY(-50%); 
		color: #ced4da;
	}
	@media (max-width: 767px) {
		.icon-ckinout {
			left: 26px;;
		}
		.gallery_section {
			padding: 0 20px 0 20px !important;
		}
		.slider-wrapper .owl-theme .owl-nav [class*=owl-] {
			margin-top: 25px;
		}
	}
	
</style>
<body>

    <!-- return-to-top start-->
    <a href="javascript:" id="return-to-top"><i class="fas fa-sort-up"></i></a>
    <!-- return-to-top-end -->
    <!-- HEADER START-->
    <div class="main_wrapper">
        <div class="main_menu_wrapper">
            <!-- main_menu_navbar start -->
            
            <? include('includes/topbar.php'); ?>

            <!-- project_info.php -->
          <!-- <form name="frm_search" id="frm_search" method="post" action="listing-grid-left.html"> -->
        <form name="frm_search" id="frm_search" method="post" action="search.php">

            <div class="sb_banner_content_wrapper animated-row float_left">
                <div class="container" style="width: 90%;">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="sb_banner_cont_iner_wrapper float_left">
                               <!--  <h2>Book & Experience Amazing Places</h2>
                                <h3>Compare 3000+ Hotels at once</h3> -->
                                <ul class="sb-filter">
                                   <!--  <li>
                                        <span><i class="fas fa-street-view"></i></span>
                                        <input type="text" placeholder="Your Destination?">
                                    </li> -->

                                    <li class="s-box" id="project-list" style="border: 1px solid #ced4da; padding: 9px 0; border-radius: 5px; flex-grow: 1; width: 100%;">
                                        <span><i class="fas fa-map-marker-alt"></i></span>
                                        <select style="max-width: 100%; border-bottom: none !important;">
                                            <?php foreach ($project_list as $value) { ?>
                                                <option class="en" value="<? echo $value['id_project_info']; ?>"><? echo $value['project_name_en']; ?></option>
                                            <? } ?>
                                            <?php foreach ($project_list as $value) {?>
                                                <option class="th" value="<? echo $value['id_project_info']; ?>"><? echo $value['project_name_th']; ?></option>
                                            <? } ?>
                                        </select>
                                    </li>
									
									<!--
                                    <li class="s-box" style="border: 1px solid #ced4da; padding: 6px 0; border-radius: 5px; flex-grow: 1; width: 100%;">
										<div class="input-with-icon">
											<span><i class="fas fa-calendar"></i></span>
											<input type="text" style="max-width: 100%; width: 100%; border-bottom: none !important; text-align: center;" id="daterange" name="daterange" class="form-control-calen" placeholder="Check-in - Check-out">
										</div>
									</li>
									-->

									<li class="s-box" id="daterange-container" style="border: 1px solid #ced4da; padding: 6px 0; border-radius: 5px; flex-grow: 1; width: 100%; position: relative;">
										<i class="fas fa-calendar icon-ckinout" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
										<input type="text" style="max-width: 100%; width: 100%; border-bottom: none !important; text-align: center; padding-right: 30px;" id="daterange" name="daterange" class="form-control-calen" placeholder=" Check-in - Check-out Date">
									</li>
									
									<!--<div class="dropdown-container input-with-icon">
										<i class="far fa-calendar"></i>
										<input type="text" style="max-width: 100%; width: 100%;" id="daterange" name="daterange" class="form-control-calen" placeholder="Check-in - Check-out">
									</div>-->

									<div class="dropdown-container" style="width: 100%;">
										<button style="max-width: 100%; width: 100%; text-align: center;" type="button" class="btn btn-light">
											<span><i class="fa fa-user" style="color: #839287 !important;"></i></span>
											ผู้ใหญ่ 2 คน , เด็ก 0 คน , 1 ห้อง
										</button>
										<div class="dropdown-content">
											<div class="counter">
												<label><i class="fas fa-user"></i>ผู้ใหญ่</label>
												<button type="button" class="btn btn-secondary" onclick="updateCount('adults', -1)">-</button>
												<span id="adults">2</span>
												<button type="button" class="btn btn-secondary" onclick="updateCount('adults', 1)">+</button>
											</div>
											<div class="counter">
												<label><i class="fas fa-child"></i>เด็ก</label>
												<button type="button" class="btn btn-secondary" onclick="updateCount('children', -1)">-</button>
												<span id="children">0</span>
												<button type="button" class="btn btn-secondary" onclick="updateCount('children', 1)">+</button>
											</div>
											<div class="counter">
												<label><i class="fas fa-bed"></i>ห้อง</label>
												<button type="button" class="btn btn-secondary" onclick="updateCount('rooms', -1)">-</button>
												<span id="rooms">1</span>
												<button type="button" class="btn btn-secondary" onclick="updateCount('rooms', 1)">+</button>
											</div>
										</div>
									</div>

                                    <li style="flex-grow: 1;">
										<a href="https://smsmartbooking.buildersmart.com/home/search">
											<button type="button" class="btn btn-primary btn-search">Search</button>
										</a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- sidebar end -->


    <!--HEADER END-->
    <!-- Side Panel -->
	<div class="slider-wrapper slider1-wrapper" style="padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12"> 
					<h4 style="text-align: center; padding-bottom: 15px;">
						<a id="package" href="javascript:;">PROMOTION & PACKAGE</a>
					</h4>
					<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					  <div class="carousel-inner">
						<div class="carousel-item active">
						  <div class="cards-wrapper">
							<div class="card">
							  <div class="image-wrapper">
								<img class="package-img" src="https://sharefolder.buildersmart.com/sms_booking/upload/package_photo/8_648ad3a488cab.jpg" alt="...">
							  </div>
							  <div class="card-body">
								<h5 class="package-tx-title">SM Resort Showroom @ Khaoyai</h5>
								<p class="package-tx-sub">Promotion package rent out all rooms for @24 Persons (MAX)</p>
								<p class="package-tx-line mt-2">THB19,800</p>
								<p class="package-tx">THB19,300</p>
								<p class="package-period-tt mt-2">
									<span>Promo period</span>
									<!--<span style="float: right;">Min. transaction</span>-->
								</p>
								<p class="package-period">
									<i class="far fa-calendar"></i> &nbsp;<span>01 AUG 2023 - 31 DEC 2024</span>
									<!--<span style="float: right;">THB19,800</span>-->
								</p>
								<div class="discount">
									<p class="discount-title">Discount</p>
									<p class="discount-no">10%</p>
								</div>
								<a href="#" class="btn mt-2 btn-more" style="float: right;">Read More</a>
							  </div>
							</div>
							<div class="card">
							  <div class="image-wrapper">
								<img class="package-img" src="https://sharefolder.buildersmart.com/sms_booking/upload/package_photo/8_648ad3a488cab.jpg" alt="...">
							  </div>
							  <div class="card-body">
								<h5 class="package-tx-title">SM Resort Showroom @ Khaoyai</h5>
								<p class="package-tx-sub">Promotion package rent out all rooms for @24 Persons (MAX)</p>
								<p class="package-tx-line mt-2">THB19,800</p>
								<p class="package-tx">THB19,300</p>
								<p class="package-period-tt mt-2">
									<span>Promo period</span>
								</p>
								<p class="package-period">
									<i class="far fa-calendar"></i> &nbsp;<span>01 AUG 2023 - 31 DEC 2024</span>
								</p>
								<div class="discount">
									<p class="discount-title">Discount</p>
									<p class="discount-no">10%</p>
								</div>
								<a href="#" class="btn mt-2 btn-more" style="float: right;">Read More</a>
							  </div>
							</div>
							<div class="card">
							  <div class="image-wrapper">
								<img class="package-img" src="https://sharefolder.buildersmart.com/sms_booking/upload/package_photo/8_648ad3a488cab.jpg" alt="...">
							  </div>
							  <div class="card-body">
								<h5 class="package-tx-title">SM Resort Showroom @ Khaoyai</h5>
								<p class="package-tx-sub">Promotion package rent out all rooms for @24 Persons (MAX)</p>
								<p class="package-tx-line mt-2">THB19,800</p>
								<p class="package-tx">THB19,300</p>
								<p class="package-period-tt mt-2">
									<span>Promo period</span>
								</p>
								<p class="package-period">
									<i class="far fa-calendar"></i> &nbsp;<span>01 AUG 2023 - 31 DEC 2024</span>
								</p>
								<div class="discount">
									<p class="discount-title">Discount</p>
									<p class="discount-no">10%</p>
								</div>
								<a href="#" class="btn mt-2 btn-more" style="float: right;">Read More</a>
							  </div>
							</div>
						  </div>
						</div>
						<div class="carousel-item">
						  <div class="cards-wrapper">
							<div class="card">
							  <div class="image-wrapper">
								<img class="package-img" src="https://sharefolder.buildersmart.com/sms_booking/upload/package_photo/8_648ad3a488cab.jpg" alt="...">
							  </div>
							  <div class="card-body">
								<h5 class="package-tx-title">SM Resort Showroom @ Khaoyai</h5>
								<p class="package-tx-sub">Promotion package rent out all rooms for @24 Persons (MAX)</p>
								<p class="package-tx-line mt-2">THB19,800</p>
								<p class="package-tx">THB19,300</p>
								<p class="package-period-tt mt-2">
									<span>Promo period</span>
									<!--<span style="float: right;">Min. transaction</span>-->
								</p>
								<p class="package-period">
									<i class="far fa-calendar"></i> &nbsp;<span>01 AUG 2023 - 31 DEC 2024</span>
									<!--<span style="float: right;">THB19,800</span>-->
								</p>
								<div class="discount">
									<p class="discount-title">Discount</p>
									<p class="discount-no">10%</p>
								</div>
								<a href="#" class="btn mt-2 btn-more" style="float: right;">Read More</a>
							  </div>
							</div>
							<div class="card">
							  <div class="image-wrapper">
								<img class="package-img" src="https://sharefolder.buildersmart.com/sms_booking/upload/package_photo/8_648ad3a488cab.jpg" alt="...">
							  </div>
							  <div class="card-body">
								<h5 class="package-tx-title">SM Resort Showroom @ Khaoyai</h5>
								<p class="package-tx-sub">Promotion package rent out all rooms for @24 Persons (MAX)</p>
								<p class="package-tx-line mt-2">THB19,800</p>
								<p class="package-tx">THB19,300</p>
								<p class="package-period-tt mt-2">
									<span>Promo period</span>
								</p>
								<p class="package-period">
									<i class="far fa-calendar"></i> &nbsp;<span>01 AUG 2023 - 31 DEC 2024</span>
								</p>
								<div class="discount">
									<p class="discount-title">Discount</p>
									<p class="discount-no">10%</p>
								</div>
								<a href="#" class="btn mt-2 btn-more" style="float: right;">Read More</a>
							  </div>
							</div>
							<div class="card">
							  <div class="image-wrapper">
								<img class="package-img" src="https://sharefolder.buildersmart.com/sms_booking/upload/package_photo/8_648ad3a488cab.jpg" alt="...">
							  </div>
							  <div class="card-body">
								<h5 class="package-tx-title">SM Resort Showroom @ Khaoyai</h5>
								<p class="package-tx-sub">Promotion package rent out all rooms for @24 Persons (MAX)</p>
								<p class="package-tx-line mt-2">THB19,800</p>
								<p class="package-tx">THB19,300</p>
								<p class="package-period-tt mt-2">
									<span>Promo period</span>
								</p>
								<p class="package-period">
									<i class="far fa-calendar"></i> &nbsp;<span>01 AUG 2023 - 31 DEC 2024</span>
								</p>
								<div class="discount">
									<p class="discount-title">Discount</p>
									<p class="discount-no">10%</p>
								</div>
								<a href="#" class="btn mt-2 btn-more" style="float: right;">Read More</a>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					  </button>
					  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					  </button>
					</div>
				</div> 
			</div> 
		</div> 
	</div>
	<script>
		const multipleItemCarousel = document.querySelector("#carouselExampleControls");
			if (window.matchMedia("(min-width:576px)").matches) {
			  const carousel = new bootstrap.Carousel(multipleItemCarousel, {
				interval: false
			  });

			  var carouselWidth = $(".carousel-inner")[0].scrollWidth;
			  var cardWidth = $(".carousel-item").width();

			  var scrollPosition = 0;

			  $(".carousel-control-next").on("click", function () {
				if (scrollPosition < carouselWidth - cardWidth * 4) {
				  scrollPosition = scrollPosition + cardWidth;
				  $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 600);
				}
			  });
			  $(".carousel-control-prev").on("click", function () {
				if (scrollPosition > 0) {
				  scrollPosition = scrollPosition - cardWidth;
				  $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 600);
				}
			  });
			} else {
			  $(multipleItemCarousel).addClass("slide");
			}
	</script>
	

    <div class="slider-wrapper slider1-wrapper" style="padding-top: 0px; padding-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <h4 style="text-align: center; padding-bottom: 30px;">
						<a id="popular_hotels" href="javascript:;">Room Types</a>
					</h4>
                    <div class="owl-carousel owl-carousel-auto owl-theme" style="padding: 0 16px;">
			
                    <?php foreach ($room_list as $value) {  ?>
                        <div class="item" style="margin: 0 3px;">
                            <div class="sub-main">
                                <div class="img-sec p-rel">
                                    <div class="hover-img p-rel" style="width: 100%; height: 100%;">
                                        <a href="javascript:;"> 
                                            <img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" />
                                        </a>
                                    </div>
                                    <span style="font-size: smaller;"><?php echo trim($value['default_rate']); ?> / Night</span>
                                </div>
                                <div class="slider-content">
                                    <span style="font-size: small !important;">
                                        <a href="javascript:;"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; | &nbsp; 88+
                                            Review</a>
                                    </span>
                                    <h5>
                                        <form action="hotel-single-page.php" method="post" class="tx-title">
                                            <a class="en" onclick="this.closest('form').submit(); return false;" >
                                                <input type="hidden" name="id_room" value="<?php echo $value['id_room_type']; ?>" >
                                                <? echo $value['room_type_name_en']; ?>
                                            </a>
                                            <a class="th" onclick="this.closest('form').submit(); return false;" >
                                                <input type="hidden" name="id_room" value="<?php echo $value['id_room_type']; ?>" >
                                                <? echo $value['room_type_name_th']; ?>
                                            </a>
                                        </form>
                                    </h5>
                                    <a href="javascript:;"> <span class="clr-text tx-map"><i class="fas fa-map-marker-alt"></i>
                                            Republic of Cuba,
                                            USA</span></a>
                                </div>


                            </div>
                        </div>
                    <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- destination section start-->
	<!--
    <div class="t-dest-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3> <a href="">Top Destinations Hotels</a>
                    </h3>
                    <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id
                        ullamcorper libero Vestibulum <br> imperdiet nibh vel magna lacinia commodo ultricies,</p>
                </div>
                <div class="col-lg6 col-md-6 col-sm-12 col-12">
                    <div class="t-place p-rel">
                        <a href="javascript:;"><img src="images/Home_1/Home_1.jpg" alt=""></a>
                        <div class="t-cont">
                            <a href="javascript:;">
                                <p><span><i class="fas fa-thumbtack"></i></span> India <br><span>580+ Hotels</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="t-place p-rel">
                        <a href="javascript:;"><img src="images/Home_1/Home_2.jpg" alt=""></a>
                        <div class="t-cont">
                            <a href="javascript:;">
                                <p><span><i class="fas fa-thumbtack"></i></span> United Kingdom <br><span>1104+
                                        Hotels</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="t-place p-rel">
                        <a href="javascript:;"> <img src="images/Home_1/Home_3.jpg" alt=""></a>
                        <div class="t-cont">
                            <a href="javascript:;">
                                <p><span><i class="fas fa-thumbtack"></i></span> France <br><span>4500+ Hotels</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="t-place p-rel">
                        <a href="javascript:;"> <img src="images/Home_1/Home_4.jpg" alt=""></a>
                        <div class="t-cont">
                            <a href="javascript:;">
                                <p><span><i class="fas fa-thumbtack"></i></span> Dubai <br><span>1400+ Hotels</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="t-place p-rel">
                        <a href="javascript:;"><img src="images/Home_1/Home_5.jpg" alt=""></a>
                        <div class="t-cont">
                            <a href="javascript:;">
                                <p><span><i class="fas fa-thumbtack"></i></span> Thailand <br><span>4510+ Hotels</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="t-place p-rel">
                        <a href="javascript:;"> <img src="images/Home_1/Home_6.jpg" alt=""></a>
                        <div class="t-cont">
                            <a href="javascript:;">
                                <p><span><i class="fas fa-thumbtack"></i></span> Japan <br><span>1240+ Hotels</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="t-center">
                        <button type="button" class="btn btn-primary">view all</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
	-->
	
    <!-- video section start -->
    <!--<div class="video-main-wrapper"  style="background-image: url(images/Home_1/Home_6.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                
                    <div class="video-icon" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
                        <a href="javascript:;"> <img src="images/Play-Icon.png" alt=""></a>
                    </div>


                    <div class="modal fade" id="exampleModal-1" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe  src="https://www.youtube.com/embed/wFQ9VQ5jyw8"
                                        title="YouTube video player"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="video-sec">
                        <h4>
                            Get the Best Deals for you in<br>
                            Summer Holidays 20% OFF
                        </h4>
                        <button type="button" class="btn btn-primary">get code</button>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- tab section -->

    <!-- gallary section -->
    <div class="gallery_section" style="padding-top: 0 !important;">
        <div class="container">
			<!--
            <div class="col-12 col-md-12 col-sm-12 col-12">
                <div class="gallery-heading">
                    <h3><a href="javascript:;">Trending Destinations Hotels</a></h3>
                    <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id
                        ullamcorper libero Vestibulum imperdiet <br>nibh vel magna lacinia commodo ultricies,</p>
                </div>
            </div>
			-->
            <div class="gallery_table">
                <ul id="tabs" class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab"
                            role="tab">All</a>
                    </li>

                <?php foreach ($project_list as $value) { ?>
                    <li class="en" class="nav-item"> 
                        <a id="tab-<? echo $value['id_project_info']; ?>" href="#pane-<? echo $value['id_project_info']; ?>" class="nav-link" data-bs-toggle="tab"
                            role="tab"><? echo $value['project_name_en']; ?>
                        </a>
                    </li>
                <? } ?>
                <?php foreach ($project_list as $value) {?>
                    <li class="th" class="nav-item"> 
                        <a id="tab-<? echo $value['id_project_info']; ?>" href="#pane-<? echo $value['id_project_info']; ?>" class="nav-link" data-bs-toggle="tab"
                            role="tab"><? echo $value['project_name_th']; ?>
                        </a>
                    </li>
                <? } ?>  

                </ul>
            </div>

            <div id="content" class="tab-content" role="tablist">

                <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" style="width: 100%;">
                    <div id="collapse-A" class="collapse show" data-parent="#content" role="tabpanel">
                        <div class="gallery-card-body">
                            <div class="gallery_list" style="padding: 35px 0;">
                                <div class="row">

                                <?php foreach ($room_list as $value) {  ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="padding: 0 6px;">
                                        <div class="gallery_box">
                                            <div class="sub-main">
                                                <div class="img-sec p-rel">
                                                    <div class="hover-img p-rel">

                                                        <a href="javascript:;">
                                                            <img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" />
                                                        </a>

                                                    </div>
                                                    <span><?php echo trim($value['default_rate']); ?> / Night</span>
                                                </div>

                                                <div class="slider-content" style="padding: 20px 15px !important;">
                                                    <span style="font-size: small !important;">
                                                        <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i><i class="far fa-star"></i>
                                                            &nbsp; |
                                                            &nbsp; 88+
                                                            Review</a>
                                                    </span>
                                                    <h5>
                                                        <form action="hotel-single-page.php" method="post" class="tx-title">
                                                            <a class="en" onclick="this.closest('form').submit(); return false;" >
                                                                <input type="hidden" name="id_room" value="<?php echo $value['id_room_type']; ?>" >
                                                                <? echo $value['room_type_name_en']; ?>
                                                            </a>
                                                            <a class="th" onclick="this.closest('form').submit(); return false;" >
                                                                <input type="hidden" name="id_room" value="<?php echo $value['id_room_type']; ?>" >
                                                                <? echo $value['room_type_name_th']; ?>
                                                            </a>
                                                        </form>
                                                    </h5>
                                                    <a href="javascript:;"><span class="clr-text tx-map"><i
                                                                class="fas fa-map-marker-alt"></i>
                                                            Republic of Cuba,
                                                            USA</span></a>

                                                    <div class="footer">
														<div class="d-flex justify-content-end mr-2">
															<button type="button" class="btn btn-primary add_to_cart en"
															data-id="<?php echo $value['id_room_type']; ?>" 
															data-price="<?php echo $value['default_rate']; ?>"
															>Add To Cart</button>
															<button type="button" class="btn btn-primary add_to_cart th"
															data-id="<?php echo $value['id_room_type']; ?>" 
															data-price="<?php echo $value['default_rate']; ?>"
															>เก็บใส่ตะกร้า</button>

															<div style="margin-left: 10px;"></div>

															<button type="button" class="btn btn-primary book_now en"
															data-roomtype="<?php //echo $rt->id_room_type; ?>" 
															>Book Now</button>
															<button type="button" class="btn btn-primary book_now th"
															data-roomtype="<?php //echo $rt->id_room_type; ?>" 
															>จองตอนนี้</button>

														</div>
													</div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    

                                 <? } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<form name="frm_room" id="frm_room" method="post" action="hotel-single-page.php">
	<input type="hidden" name="project_id" id="project_id" value="">
	<input type="hidden" name="h_id_room_type" id="h_id_room_type" value="">
	<input type="hidden" name="h_num_of_adult" id="h_num_of_adult" value="">
	<input type="hidden" name="h_num_of_room" id="h_num_of_room" value="">
	<input type="hidden" name="h_num_of_children" id="h_num_of_children" value="">
	<input type="hidden" name="h_children_ages" id="h_children_ages" value="">
	<input type="hidden" name="h_check_in_date" id="h_check_in_date" value="">
	<input type="hidden" name="h_check_out_date" id="h_check_out_date" value="">
</form>

<script type="text/javascript">
var cart_count = $('.button__badge').text();
$('.add_to_cart').click(function() {
	var id_room_type = $(this).attr('data-id');
	var room_rate = $(this).attr('data-price');

	//alert(id_room_type)
	var _url = "add_to_cart.php";

	$.ajax({
			method: "POST",
			url: _url,
			data: {
				'id_room_type': id_room_type,
				'room_rate': room_rate
			}
		})
		.done(function(res) {
			var obj = eval('(' + res + ')');
			alert(obj.message);
			$('.button__badge').text(obj.count);
		});
});

$('.book_now').click(function() {
	$('#h_id_room_type').val($(this).attr('data-roomtype'));
	$('#h_check_in_date').val($('#check_in_date').val());
	$('#h_check_out_date').val($('#check_out_date').val());
	$('#h_num_of_adult').val($('#div_adult').text());
	$('#h_num_of_room').val($('#div_room').text());
	$('#h_num_of_children').val($('#div_children').text());
	// var children_ages = [];
	// var ages = document.getElementsByClassName("select_age");
	// for (var i = 0; i < ages.length; i++) {
	// 	//console.log(ages[i].value);
	// 	children_ages.push(ages[i].value);
	// }
	// $('#h_children_ages').val(children_ages.toString());
	$('#frm_room').submit();
});
</script>


            <?php foreach ($project_list as $value) {  ?>
                <div id="pane-<? echo $value['id_project_info']; ?>" class="card tab-pane fade" role="tabpanel" style="width: 100%;">

                    <div id="collapse-B" class="collapse" data-parent="#content" role="tabpanel">
                        <div class="gallery-card-body">
                            <div class="gallery_list">
                                <div class="row">

                                    <?php 
                                        foreach ($room_list as $value_room) {   
                                            if($value_room['id_project_info']==$value['id_project_info']){
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="padding: 0 6px;">
                                        <div class="gallery_box">
                                            <div class="sub-main">
                                                <div class="img-sec p-rel">
                                                    <div class="hover-img p-rel">

                                                        <a href="javascript:;">
                                                            <img src="includes/image.php?filename=<?php echo trim($value_room['room_photo_url']); ?>" />
                                                        </a>

                                                    </div>
                                                    <span><?php echo trim($value_room['default_rate']); ?> / Night</span>
                                                </div>
                                                <div class="slider-content" style="padding: 20px 15px !important;">
                                                    <span style="font-size: small !important;">
                                                        <a href="javascript:;"> <i class="fas fa-star"></i><i
                                                                class="fas fa-star"></i><i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i><i class="far fa-star"></i>
                                                            &nbsp; |
                                                            &nbsp; 88+
                                                            Review</a>
                                                    </span>
                                                    <h5>
                                                        <form action="hotel-single-page.php" method="post">
                                                            <a class="en" onclick="this.closest('form').submit(); return false;" >
                                                                <input type="hidden" name="id_room" value="<?php echo $value_room['id_room_type']; ?>" >
                                                                <? echo $value_room['room_type_name_en']; ?>
                                                            </a>
                                                            <a class="th" onclick="this.closest('form').submit(); return false;" >
                                                                <input type="hidden" name="id_room" value="<?php echo $value_room['id_room_type']; ?>" >
                                                                <? echo $value_room['room_type_name_th']; ?>
                                                            </a>
                                                        </form>
                                                    </h5>
                                                    <a href="javascript:;"><span class="clr-text"><i
                                                                class="fas fa-map-marker-alt"></i>
                                                            Republic of Cuba,
                                                            USA</span></a>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>
                                <? }} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>    

            </div>
        </div>
    </div>
    <!-- blog-section-->
	<!--
    <div class="blog-main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="blog-cont">
                        <h3><a href="javascript:;">Why Choose Us ?</a></h3>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, rem a quis bibendum auctor,
                            nisi elit consequat ipsum, nec sagittis sem nibh id elit. Dssed odio sit amet nibh vulputate
                            cursus a sit amt mauris. Morbi accumsan ipsum velit.</p>
                        <p>This is Photoshop's version of Lorem Ipsum. Proin gravida n vel velit auctor aliquet. Aenean
                            sollicitudin, lorem quis bibendum tor. This is Photoshop's version of Lorem Ipsum</p>
                        <button type="button" class="btn btn-primary">Read more</button>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="sb-blog-wrapper">
                        <h4><a href="javascript:;">Top Reviews</a></h4>
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="review-slider">
                                    <p><a href="javascript:;"> <span class="clr-text"><i
                                                    class="fas fa-map-marker-alt"></i>
                                                Republic of Cuba,
                                                USA </span></a> &nbsp; &nbsp;
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i>
                                        <i class="far fa-star"></i><i class="far fa-star"></i>
                                    </p>
                                    <div class="blog-slider-cont">
                                        <img src="images/team.jpg" alt="">
                                        <p>“ Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate rsus a
                                            sit amet mauris. Morbi san ips velit. Namec tellus a odio ti odio. ”
                                            <a href="">~ Akshay Handge ~</a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="item">
                                <div class="review-slider">
                                    <p> <span class="clr-text"><i class="fas fa-map-marker-alt"></i>
                                            Republic of Cuba,
                                            USA </span> &nbsp; &nbsp;
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i>
                                        <i class="far fa-star"></i><i class="far fa-star"></i>
                                    </p>
                                    <div class="blog-slider-cont">
                                        <img src="images/team.jpg" alt="">
                                        <p>“ Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate rsus a
                                            sit amet mauris. Morbi san ips velit. Namec tellus a odio ti odio. ”
                                            <a href="">~ Ajay S. ~</a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="item">
                                <div class="review-slider">
                                    <p> <span class="clr-text"><i class="fas fa-map-marker-alt"></i>
                                            Republic of Cuba,
                                            USA </span> &nbsp; &nbsp;
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i>
                                        <i class="far fa-star"></i><i class="far fa-star"></i>
                                    </p>
                                    <div class="blog-slider-cont">
                                        <img src="images/team.jpg" alt="">
                                        <p>“ Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate rsus a
                                            sit amet mauris. Morbi san ips velit. Namec tellus a odio ti odio. ”
                                            <a href="">~ Arun S. ~</a>
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
	-->
    <!-- news section start -->
	<!--
    <div class="news-main-wrapper">
        <div class="container">
            <div class="row">
                <div class="news-sec-heading">
                    <h3><a href="javascript:;">Articles & Expert News</a></h3>
                    <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id
                        ullamcorper libero <br> Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="sb-news-blog">
                        <div class="news-img">
                            <img src="images/Home/Home_1.jpg" alt="">
                        </div>
                        <div class="news-cont">
                            <a href="javascript:;"> <span><i class="far fa-calendar"></i> &nbsp; April 4, 2022
                                </span></a>
                            <h5><a href="javascript:;">Costa Rica, Your Island Escape</a></h5>
                            <p>Proin gravida nibh vel velit auctor alt. Aenean sollicitudin, rem a quis bibe auctor,
                                nisi elit consequat ipsum.</p>
                            <a href="javascript:;">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="sb-news-blog">
                        <div class="news-img">
                            <img src="images/Home/Home_2.jpg" alt="">
                        </div>
                        <div class="news-cont">
                            <a href="javascript:;"> <span><i class="far fa-calendar"></i> &nbsp; April 4, 2022
                                </span></a>
                            <h5><a href="javascript:;">7 Best Sarnath Hotels </a></h5>
                            <p>Proin gravida nibh vel velit auctor alt. Aenean sollicitudin, rem a quis bibe auctor,
                                nisi elit consequat ipsum.</p>
                            <a href="javascript:;">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="sb-news-blog">
                        <div class="news-img">
                            <img src="images/Home/Home_3.jpg" alt="">
                        </div>
                        <div class="news-cont">
                            <a href="javascript:;"> <span><i class="far fa-calendar"></i> &nbsp; April 4, 2022
                                </span></a>
                            <h5><a href="javascript:;">Best Hotels Near 2022</a></h5>
                            <p>Proin gravida nibh vel velit auctor alt. Aenean sollicitudin, rem a quis bibe auctor,
                                nisi elit consequat ipsum.</p>
                            <a href="javascript:;">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="t-center">
                        <a href="blog-right-single.html" class="btn btn-primary">read our blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	-->
    <!-- form section -->
	<!--
    <div class="contact-main-wrapper">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0">
                <div class="form">
                    <h5><a href="javascript:;">sign up for newsletter</a></h5>
                    <p>Sign up for our mailing list to get latest updates and offers</p>
                    <form>
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
                    <a class="btn btn-light">Get code</a>
                </div>
            </div>
           
        </div>
    </div>
	-->
    
    <? include('includes/footer.php'); ?>

    <!-- custom js-->
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/shortcode.js"></script>
    <script src="js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">

    <script>
    $(document).ready(function(){
        $(".owl-carousel-auto").owlCarousel({
            loop:true,
            margin:10,
            nav: false, // Hide navigation arrows
            autoplay:true,
            autoplayTimeout:3000, // 3 seconds autoplay interval
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
    });
    </script>

</body>

<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> 

<script>
    $(document).ready(function() {
        $('#daterange').daterangepicker({
            opens: 'center',
            minDate: moment(),
            autoApply: true,
            locale: {
                format: 'DD/MM/YYYY',
                separator: ' - ',
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                weekLabel: 'W',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            },
            autoUpdateInput: false // ป้องกันการอัปเดตค่าของ input อัตโนมัติ
        }, function(start, end, label) {
            $('#daterange').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        });

        // เมื่อมีการเลือกวันที่ จะอัปเดตค่าใน input
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });

        // เมื่อมีการยกเลิกการเลือกวันที่ จะแสดงข้อความ "Check In - Out Date"
        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('Check-in - Check-out Date');
        });

        // ตั้งค่า placeholder เริ่มต้น
        $('#daterange').val('Check-in - Check-out Date');
    });

    function updateCount(type, change) {
        const element = document.getElementById(type);
        let value = parseInt(element.textContent);
        value += change;
        if (value < 0) value = 0;
        element.textContent = value;
        updateSummary();
    }

    function updateSummary() {
        const rooms = document.getElementById('rooms').textContent;
        const adults = document.getElementById('adults').textContent;
        const children = document.getElementById('children').textContent;
        const button = document.querySelector('.dropdown-container button');
        button.textContent = `ผู้ใหญ่ ${adults} คน , เด็ก ${children} คน , ${rooms} ห้อง `;
    }

    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const location = document.getElementById('location').value;
        const daterange = document.getElementById('daterange').value;
        const rooms = document.getElementById('rooms').textContent;
        const adults = document.getElementById('adults').textContent;
        const children = document.getElementById('children').textContent;

        console.log(`Location: ${location}`);
        console.log(`Date Range: ${daterange}`);
        console.log(`Rooms: ${rooms}`);
        console.log(`Adults: ${adults}`);
        console.log(`Children: ${children}`);
    });
</script>

</html>

<? include('language/text_index.php'); ?>


