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
                                    <li class="s-box" style="border: 1px solid #ced4da; padding: 9px 0; border-radius: 5px; flex-grow: 1; width: 100%;">
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
									<li class="s-box" style="border: 1px solid #ced4da; padding: 6px 0; border-radius: 5px; flex-grow: 1; width: 100%; position: relative;">
										<i class="fas fa-calendar" style="position: absolute; left: 56px; top: 46%; transform: translateY(-50%); color: #ced4da;"></i>
										<input type="text" style="max-width: 100%; width: 100%; border-bottom: none !important; text-align: center; padding-right: 30px;" id="daterange" name="daterange" class="form-control-calen" placeholder="Check-in - Check-out">
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
    <!-- hotel service section start -->
	<!--
    <div class="services-wrapper">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col-12 p-0">
                    <div class="service-box p-box-4">
                        <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39 41"
                            width="39" height="41">
                            <title>icon</title>
                            <style>
                                tspan {
                                    white-space: pre
                                }

                                .shp0 {
                                    fill: #1b72ea
                                }

                                .service-box:hover .shp0 {
                                    fill: #fff
                                }
                            </style>
                            <path id="icon" class="shp0"
                                d="M35.76 20.92L33.18 20.92C32.41 19.38 31.21 17.99 29.66 16.85C29.63 15.15 29.5 13.86 29.26 12.91C28.89 11.45 28.19 10.7 27.18 10.7C26.08 10.7 23.74 11.98 21.94 13.85C21.13 13.75 20.3 13.69 19.47 13.69C15.58 13.69 11.92 14.85 9.15 16.95C6.64 18.86 5.13 21.34 4.83 24.01C3.71 23.67 2.89 22.68 2.89 21.53C2.89 21.05 2.47 20.66 1.95 20.66C1.43 20.66 1.01 21.05 1.01 21.53C1.01 23.65 2.65 25.42 4.81 25.81C5.06 28.59 6.64 31.21 9.25 33.15L8.44 37.4C8.39 37.63 8.45 37.87 8.59 38.06C8.74 38.25 8.96 38.38 9.2 38.42L12.73 38.99C12.97 39.03 13.23 38.98 13.43 38.85C13.64 38.71 13.78 38.51 13.82 38.28L14.33 35.63C15.97 36.1 17.69 36.34 19.47 36.34C21.25 36.34 22.98 36.1 24.62 35.63L25.13 38.28C25.17 38.51 25.31 38.71 25.52 38.85C25.68 38.95 25.86 39.01 26.06 39.01C26.11 39.01 26.17 39 26.22 38.99L29.75 38.42C30.26 38.33 30.6 37.88 30.51 37.4L29.7 33.15C31.23 32.02 32.41 30.64 33.18 29.12L35.76 29.12C36.95 29.12 37.92 28.22 37.92 27.12L37.92 22.91C37.92 21.81 36.95 20.92 35.76 20.92ZM35.76 27.37L32.56 27.37C32.17 27.37 31.83 27.59 31.68 27.92C31.01 29.51 29.77 30.95 28.12 32.08C27.83 32.28 27.68 32.61 27.75 32.94L28.49 36.85L26.82 37.12L26.29 34.31C26.24 34.06 26.07 33.83 25.82 33.7C25.57 33.57 25.28 33.56 25.02 33.65C23.28 34.28 21.41 34.59 19.47 34.59C17.53 34.59 15.67 34.28 13.93 33.65C13.67 33.56 13.37 33.57 13.13 33.7C12.88 33.83 12.71 34.06 12.66 34.31L12.13 37.12L10.46 36.85L11.2 32.94C11.26 32.61 11.12 32.28 10.83 32.08C8.18 30.27 6.66 27.69 6.66 25.02C6.66 19.74 12.41 15.44 19.47 15.44C20.37 15.44 21.28 15.51 22.15 15.65C22.49 15.71 22.83 15.59 23.04 15.34C24.53 13.66 26.46 12.61 27.09 12.46C27.26 12.68 27.75 13.64 27.78 17.29C27.79 17.56 27.93 17.82 28.16 17.98C29.79 19.11 31.01 20.54 31.68 22.11C31.83 22.44 32.17 22.66 32.56 22.66L35.76 22.66C35.91 22.66 36.03 22.77 36.03 22.91L36.03 23.31L35.95 23.31C35.43 23.31 35.01 23.7 35.01 24.18C35.01 24.66 35.43 25.05 35.95 25.05L36.03 25.05L36.03 27.12C36.03 27.26 35.91 27.37 35.76 27.37ZM19.47 11.33C22.25 11.33 24.52 9.24 24.52 6.67C24.52 4.09 22.25 2 19.47 2C16.69 2 14.43 4.09 14.43 6.67C14.43 9.24 16.69 11.33 19.47 11.33ZM19.47 3.74C21.21 3.74 22.63 5.05 22.63 6.67C22.63 8.28 21.21 9.59 19.47 9.59C17.73 9.59 16.32 8.28 16.32 6.67C16.32 5.05 17.73 3.74 19.47 3.74ZM23.16 17.5C21.98 17.15 20.74 16.98 19.47 16.98C18.21 16.98 16.97 17.15 15.79 17.5C15.29 17.65 15.02 18.14 15.18 18.6C15.33 19.06 15.86 19.31 16.36 19.16C17.35 18.87 18.4 18.72 19.47 18.72C20.55 18.72 21.6 18.87 22.59 19.16C22.68 19.19 22.78 19.21 22.88 19.21C23.28 19.21 23.65 18.97 23.77 18.6C23.93 18.14 23.66 17.65 23.16 17.5Z" />
                        </svg>
                        <h4>Best Price<br>
                            Guarantee</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col-12 p-0">
                    <div class="service-box p-box-4">
                        <svg height="41" viewBox="0 1 511 511.999" width="39" xmlns="http://www.w3.org/2000/svg">
                            <style>
                                tspan {
                                    white-space: pre
                                }

                                .shp0 {
                                    fill: #1b72ea
                                }

                                .service-box:hover .shp0 {
                                    fill: #fff
                                }
                            </style>
                            <path class="shp0"
                                d="m498.699219 222.695312c-.015625-.011718-.027344-.027343-.039063-.039062l-208.855468-208.847656c-8.902344-8.90625-20.738282-13.808594-33.328126-13.808594-12.589843 0-24.425781 4.902344-33.332031 13.808594l-208.746093 208.742187c-.070313.070313-.144532.144531-.210938.214844-18.28125 18.386719-18.25 48.21875.089844 66.558594 8.378906 8.382812 19.441406 13.234375 31.273437 13.746093.484375.046876.96875.070313 1.457031.070313h8.320313v153.695313c0 30.417968 24.75 55.164062 55.167969 55.164062h81.710937c8.285157 0 15-6.71875 15-15v-120.5c0-13.878906 11.292969-25.167969 25.171875-25.167969h48.195313c13.878906 0 25.167969 11.289063 25.167969 25.167969v120.5c0 8.28125 6.714843 15 15 15h81.710937c30.421875 0 55.167969-24.746094 55.167969-55.164062v-153.695313h7.71875c12.585937 0 24.421875-4.902344 33.332031-13.8125 18.359375-18.367187 18.367187-48.253906.027344-66.632813zm-21.242188 45.421876c-3.238281 3.238281-7.542969 5.023437-12.117187 5.023437h-22.71875c-8.285156 0-15 6.714844-15 15v168.695313c0 13.875-11.289063 25.164062-25.167969 25.164062h-66.710937v-105.5c0-30.417969-24.746094-55.167969-55.167969-55.167969h-48.195313c-30.421875 0-55.171875 24.75-55.171875 55.167969v105.5h-66.710937c-13.875 0-25.167969-11.289062-25.167969-25.164062v-168.695313c0-8.285156-6.714844-15-15-15h-22.328125c-.234375-.015625-.464844-.027344-.703125-.03125-4.46875-.078125-8.660156-1.851563-11.800781-4.996094-6.679688-6.679687-6.679688-17.550781 0-24.234375.003906 0 .003906-.003906.007812-.007812l.011719-.011719 208.847656-208.839844c3.234375-3.238281 7.535157-5.019531 12.113281-5.019531 4.574219 0 8.875 1.78125 12.113282 5.019531l208.800781 208.796875c.03125.03125.066406.0625.097656.09375 6.644531 6.691406 6.632813 17.539063-.03125 24.207032zm0 0" />
                        </svg>
                        <h4>Home Pikup<br>
                            & Drop</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col-12 p-0">
                    <div class="service-box p-box-4">
                        <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39 34"
                            width="39" height="34">
                            <title>Icon</title>
                            <style>
                                tspan {
                                    white-space: pre
                                }

                                .shp0 {
                                    fill: #1b72ea
                                }

                                .service-box:hover .shp0 {
                                    fill: #fff
                                }
                            </style>
                            <path id="icon-two" class="shp0"
                                d="M36.88 10.26C36.41 7.36 34.79 5.03 32.03 3.42C30.47 2.47 28.71 2 26.95 2C24.67 2 22.53 2.81 20.91 4.32C20.38 4.8 19.96 5.27 19.48 5.8C18.11 4.09 16.68 3.04 15.06 2.52C12.16 1.57 9.31 1.95 6.7 3.61C3.57 5.6 2 8.4 2 11.96C2 14.05 2.71 16.05 4.14 18.04C5.66 20.18 7.56 22.36 10.03 24.92C11.74 26.63 13.45 28.34 15.16 30.01L16.82 31.62C16.97 31.76 17.11 31.91 17.25 32.05L17.44 32.24C17.78 32.52 18.53 33 19.48 33C20.29 33 21.05 32.66 21.72 32.05C24.57 29.34 27.66 26.4 30.56 23.26C32.08 21.65 33.79 19.7 35.21 17.56C36.74 15.24 37.26 12.77 36.88 10.26ZM33.74 16.57C32.42 18.61 30.8 20.37 29.28 22.03C26.38 25.12 23.39 28.06 20.53 30.72C20.16 31.05 19.82 31.19 19.49 31.19C19.06 31.19 18.73 30.96 18.63 30.86L18.49 30.72C18.35 30.58 18.21 30.43 18.07 30.29L16.4 28.73C14.74 27.07 12.98 25.4 11.32 23.69C8.84 21.18 7.09 19.14 5.56 17.05C4.38 15.34 3.76 13.67 3.76 11.96C3.76 9.02 5 6.74 7.61 5.08C8.99 4.18 10.46 3.75 11.94 3.75C12.79 3.75 13.65 3.89 14.5 4.18C15.88 4.65 17.07 5.55 18.3 7.08C18.4 7.17 18.83 7.65 19.54 7.65C19.83 7.65 20.3 7.55 20.73 7.08L20.78 6.98C21.25 6.45 21.68 5.98 22.11 5.55C23.43 4.32 25.1 3.7 26.95 3.7C28.43 3.7 29.85 4.13 31.13 4.89C33.41 6.26 34.75 8.07 35.13 10.49C35.46 12.63 35.03 14.62 33.74 16.57ZM14.21 8.69C14.02 9.11 13.5 9.3 13.02 9.11C12.6 8.93 12.17 8.83 11.69 8.83C9.93 8.83 8.51 10.25 8.51 12.01C8.51 12.63 8.7 13.25 9.03 13.77C9.32 14.15 9.17 14.72 8.79 15.01C8.65 15.1 8.46 15.15 8.32 15.15C8.03 15.15 7.75 15.01 7.61 14.77C7.08 13.96 6.8 13.01 6.8 12.02C6.8 9.31 9.03 7.08 11.74 7.08C12.45 7.08 13.16 7.22 13.83 7.55C14.21 7.74 14.4 8.26 14.21 8.69Z" />
                        </svg>
                        <h4>Travellers<br>
                            Love us</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col-12 p-0">
                    <div class="service-box p-box-4">
                        <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39 38"
                            width="39" height="38">
                            <title>Icon</title>
                            <style>
                                tspan {
                                    white-space: pre
                                }

                                .shp0 {
                                    fill: #1b72ea
                                }

                                .service-box:hover .shp0 {
                                    fill: #fff
                                }
                            </style>
                            <path id="icon-three" class="shp0"
                                d="M35.33 28C31.72 26.19 28.96 25.18 26.51 24.8L26.8 24.42C26.92 24.31 26.98 24.14 26.92 23.97L26.37 21.88C27.85 19.9 28.72 17.41 28.72 15.06L28.72 11.08C28.72 6.09 24.4 2 19.11 2C13.83 2 9.5 6.09 9.5 11.08L9.5 15.06C9.5 17.41 10.37 19.9 11.86 21.88L11.3 23.97C11.3 24.14 11.3 24.31 11.42 24.48L11.68 24.81C9.23 25.19 6.48 26.2 2.9 28C1.75 28.51 1.09 29.59 1.09 30.78L1.09 35.43C1.09 35.78 1.33 36 1.69 36L16.11 36L22.11 36L36.53 36C36.89 36 37.13 35.78 37.13 35.43L37.13 30.78C37.13 29.65 36.41 28.57 35.33 28ZM19.11 26.65L19.29 27.03L20.55 29.82L17.62 29.82L19.11 26.65ZM17.23 31.13L17.25 30.95L20.97 30.95L21 31.13L21.44 34.87L16.78 34.87L17.23 31.13ZM25.42 23L25.66 24.02L25.04 24.82C25.01 24.85 24.97 24.89 24.94 24.93L22.44 28.2L21.65 29.23L20.03 25.79C22 25.56 23.76 24.61 25.17 23.25C25.25 23.17 25.34 23.09 25.42 23ZM10.7 11.08C10.7 6.71 14.49 3.13 19.11 3.13C23.74 3.13 27.52 6.71 27.52 11.08L27.52 15.06C27.52 17.49 26.65 19.66 25.33 21.33L25.24 21.36C25.18 21.41 25.12 21.47 25.06 21.53C23.44 23.57 21.33 24.65 19.11 24.65L19.11 24.65C16.95 24.65 14.85 23.51 13.17 21.53C13.11 21.47 13.05 21.41 12.99 21.36L12.89 21.33C11.58 19.66 10.7 17.49 10.7 15.06L10.7 11.08L10.7 11.08ZM18.2 25.79L16.58 29.23L15.78 28.2L13.29 24.93C13.27 24.92 13.25 24.9 13.22 24.88L12.57 24.02L12.81 23C12.89 23.09 12.97 23.17 13.05 23.25C14.46 24.61 16.22 25.56 18.2 25.79ZM2.3 30.78C2.3 30.04 2.72 29.36 3.44 29.02C7.26 27.1 10.02 26.13 12.48 25.85L16.11 30.57L15.57 34.87L2.3 34.87L2.3 30.78ZM35.93 34.87L22.71 34.87L22.19 30.42L25.75 25.79C28.2 26.13 31.02 27.1 34.79 28.96C35.51 29.36 35.93 30.04 35.93 30.78L35.93 34.87L35.93 34.87Z" />
                        </svg>
                        <h4>Best Hotel<br>
                            Agent</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col-12 p-0">
                    <div class="service-box p-box-4">
                        <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 38"
                            width="35" height="38">
                            <title>Icon</title>
                            <style>
                                tspan {
                                    white-space: pre
                                }

                                .shp0 {
                                    fill: #1b72ea
                                }

                                .service-box:hover .shp0 {
                                    fill: #fff
                                }
                            </style>
                            <path id="icon-four" class="shp0"
                                d="M29.04 14.93L29.04 13.62C29.04 10.49 27.93 7.58 25.92 5.43C23.86 3.21 21.02 2 17.93 2L16.85 2C13.76 2 10.93 3.21 8.87 5.43C6.86 7.58 5.75 10.49 5.75 13.62L5.75 14.93C3.31 15.09 1.37 17.12 1.37 19.6L1.37 21.64C1.37 24.22 3.47 26.32 6.06 26.32L8.7 26.32C9.17 26.32 9.55 25.94 9.55 25.46L9.55 15.77C9.55 15.3 9.17 14.91 8.7 14.91L7.46 14.91L7.46 13.62C7.46 7.97 11.5 3.71 16.84 3.71L17.92 3.71C23.28 3.71 27.3 7.97 27.3 13.62L27.3 14.91L26.07 14.91C25.6 14.91 25.21 15.3 25.21 15.77L25.21 25.46C25.21 25.93 25.6 26.32 26.07 26.32L27.28 26.32C26.92 30.79 23.84 31.82 22.41 32.06C22.02 30.85 20.88 29.98 19.54 29.98L17.4 29.98C15.74 29.98 14.38 31.33 14.38 32.99C14.38 34.65 15.74 36 17.4 36L19.55 36C20.94 36 22.1 35.06 22.45 33.79C23.15 33.69 24.26 33.44 25.37 32.79C26.92 31.89 28.76 30.04 29 26.31C31.45 26.16 33.4 24.12 33.4 21.64L33.4 19.59C33.41 17.12 31.47 15.09 29.04 14.93ZM7.85 24.6L6.07 24.6C4.43 24.6 3.1 23.27 3.1 21.64L3.1 19.59C3.1 17.96 4.43 16.63 6.07 16.63L7.85 16.63L7.85 24.6ZM19.55 34.29L17.4 34.29C16.68 34.29 16.1 33.71 16.1 33C16.1 32.28 16.68 31.7 17.4 31.7L19.55 31.7C20.26 31.7 20.84 32.28 20.84 33C20.84 33.71 20.26 34.29 19.55 34.29ZM31.69 21.64C31.69 23.27 30.36 24.6 28.72 24.6L26.94 24.6L26.94 16.63L28.72 16.63C30.36 16.63 31.69 17.96 31.69 19.59L31.69 21.64Z" />
                        </svg>
                        <h4>24x7 Services<br>
                            & Support</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 col-12 p-0">
                    <div class="service-box p-box-4">
                        <svg version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 35"
                            width="46" height="35">
                            <title>Icon</title>
                            <style>
                                tspan {
                                    white-space: pre
                                }

                                .shp0 {
                                    fill: #1b72ea
                                }

                                .service-box:hover .shp0 {
                                    fill: #fff
                                }
                            </style>
                            <path id="icon-five" class="shp0"
                                d="M3.37 32.24L43.14 32.24L43.14 34L3.37 34L3.37 32.24ZM42.53 4.46C39.64 2.74 36.36 3.65 34.12 4.72L27.43 7.9L15.92 2L9.07 2.3L18.57 12.12L12.52 15.06L6.22 12.61L2 14.62L5.81 19.44C5.41 19.93 5.04 20.62 5.38 21.35C5.81 22.29 7.09 22.77 9.18 22.77C9.62 22.77 10.08 22.75 10.58 22.71C12.88 22.53 15.38 21.93 16.94 21.18L40.85 9.81C42.92 8.83 43.95 7.8 44 6.66C44.02 6.07 43.79 5.21 42.53 4.46ZM40.12 8.21L16.21 19.59C14.88 20.22 12.69 20.75 10.65 20.94C8.55 21.13 7.43 20.89 7.06 20.68C7.13 20.57 7.28 20.41 7.54 20.17L8.16 19.61L4.73 15.26L6.29 14.52L12.59 16.97L21.51 12.65L13.04 3.89L15.55 3.78L27.4 9.86L34.85 6.32C37.57 5.02 39.86 4.91 41.66 5.98L41.66 5.98C42.12 6.25 42.27 6.49 42.27 6.58C42.27 6.58 42.22 7.22 40.12 8.21Z" />
                        </svg>
                        <h4>Flight<br>
                            Booking</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
	-->
    <!-- hotel service section start end-->
    <!-- popular hotel slider start -->

    <div class="slider-wrapper slider1-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <h4><a id="popular_hotels" href="javascript:;">Most Popular Hotels</a></h4>
                    <div class="owl-carousel owl-carousel-auto owl-theme">

                    <?php foreach ($room_list as $value) {  ?>
                        <div class="item">
                            <div class="sub-main">
                                <div class="img-sec p-rel">
                                    <div class="hover-img p-rel">
                                        <a href="javascript:;"> 
                                            <img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" />
                                        </a>
                                    </div>
                                    <span style="font-size: smaller;"><?php echo trim($value['default_rate']); ?> / Night</span>
                                </div>
                                <div class="slider-content">
                                    <span>
                                        <a href="javascript:;"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <i class="far fa-star"></i><i class="far fa-star"></i> &nbsp; | &nbsp; 88+
                                            Review</a>
                                    </span>
                                    <h5>
                                        <!-- <a href="hotel-single-page.php">SM 1 - Standard Room</a> -->
                                        <form action="hotel-single-page.php" method="post">
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
                                    <a href="javascript:;"> <span class="clr-text"><i class="fas fa-map-marker-alt"></i>
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
    <!-- video section start -->
    <div class="video-main-wrapper"  style="background-image: url(images/Home_1/Home_6.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <!-- Button trigger modal -->
                    <div class="video-icon" data-bs-toggle="modal" data-bs-target="#exampleModal-1">
                        <a href="javascript:;"> <img src="images/Play-Icon.png" alt=""></a>
                    </div>

                    <!-- Modal -->
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
    </div>
    <!-- tab section -->

    <!-- gallary section -->
    <div class="gallery_section">
        <div class="container">
            <div class="col-12 col-md-12 col-sm-12 col-12">
                <div class="gallery-heading">
                    <h3><a href="javascript:;">Trending Destinations Hotels</a></h3>
                    <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id
                        ullamcorper libero Vestibulum imperdiet <br>nibh vel magna lacinia commodo ultricies,</p>
                </div>
            </div>

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

                <div id="pane-A" class="card tab-pane fade show active" role="tabpanel">
                    <div id="collapse-A" class="collapse show" data-parent="#content" role="tabpanel">
                        <div class="gallery-card-body">
                            <div class="gallery_list">
                                <div class="row">

                                <?php foreach ($room_list as $value) {  ?>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
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

                                                <div class="slider-content">
                                                    <span>
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
                                                                <input type="hidden" name="id_room" value="<?php echo $value['id_room_type']; ?>" >
                                                                <? echo $value['room_type_name_en']; ?>
                                                            </a>
                                                            <a class="th" onclick="this.closest('form').submit(); return false;" >
                                                                <input type="hidden" name="id_room" value="<?php echo $value['id_room_type']; ?>" >
                                                                <? echo $value['room_type_name_th']; ?>
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
                                 <? } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php foreach ($project_list as $value) {  ?>
                <div id="pane-<? echo $value['id_project_info']; ?>" class="card tab-pane fade" role="tabpanel">

                    <div id="collapse-B" class="collapse" data-parent="#content" role="tabpanel">
                        <div class="gallery-card-body">
                            <div class="gallery_list">
                                <div class="row">

                                    <?php 
                                        foreach ($room_list as $value_room) {   
                                            if($value_room['id_project_info']==$value['id_project_info']){
                                    ?>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
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
                                                <div class="slider-content">
                                                    <span>
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
    <!-- news section start -->
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
    <!-- form section -->
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
            }
        });

    });

    $(document).ready(function() {
        $("#daterange").datepicker({
            dateFormat: 'dd/mm/yy',
            numberOfMonths: 2,
            minDate: 0,
            onSelect: function(selectedDate) {
                var option = this.id == "start_date" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                $("#end_date").datepicker("option", option, date);
            }
        });
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
        // ผู้ใหญ่ 2 คน , เด็ก 0 คน , 1 ห้อง
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


