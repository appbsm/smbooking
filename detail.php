<?php 
	include('includes/connect_sql.php');
	include('includes/fx_room_detail_db.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id_room'])) {
		$_SESSION['id_room'] = $_POST['id_room'];
		$room_list   = get_room($conn,$_POST['id_room']);
	}else if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id_room'])) {
		$_SESSION['id_room'] = $_GET['id_room'];
		$room_list   = get_room($conn,$_GET['id_room']);
	}else{
		if (isset($_SESSION['id_room']) && !empty($_SESSION['id_room'])) {
			$room_list   = get_room($conn,$_SESSION['id_room']);
		}else{
			$room_list   = get_room_top($conn);
		}
	}

	$start_id = "true";
	foreach ($room_list as $value) {
		if($start_id == "true"){
			$id_project_info  = $value['id_project_info'];
			$id_room_type		= $value['id_room_type'];
			$room_type_name_en  = $value['room_type_name_en'];
			$room_type_name_th  = $value['room_type_name_th'];
			$description_en     = $value['description_en'];  
			$description_th     = $value['description_th'];
			$short_description_en= $value['short_description_en'];
			$short_description_th= $value['short_description_th'];
			$default_rate       = $value['default_rate'];
			$latitude           = $value['latitude'];
			$longitude          = $value['longitude'];
			$link_map           = $value['link_map'];
			$start_id = "false";
		}
	}

	// $seasonal_list  = get_seasonal_price($conn,$id_room_type);
	$icon_room_list = get_icon_room($conn,$id_project_info);

	$project_highlights_list  = get_project_highlights($conn,$id_project_info);
	$point_of_interest_list  = get_point_of_interest($conn,$id_project_info);

	$project_policy_list  = get_project_policy($conn,$id_project_info);

	// echo '<script>alert("room_type_name_en: '.$room_type_name_en.'")</script>';

	sqlsrv_close($conn);
?>

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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

</head>

<style>
	h1, h2, h3, h4, h5, h6, b, span, p, table, a, div, label, ul, li, div,
    button {
        font-family: 'Prompt', sans-serif !important;
    }
    .gallery-container {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
		gap: 4px;
		padding: 20px;
		/*max-width: 1000px;*/
		margin: auto;
		margin: auto;
		max-width: 100%;
	}

	.gallery-item {
		position: relative;
		overflow: hidden;
		/*border-radius: 8px;*/
		box-shadow: 0 2px 5px rgba(0,0,0,0.1);
	}

	.gallery-item.large {
		grid-column: span 2;
		grid-row: span 2;
		border-top-left-radius: 8px;
		border-bottom-left-radius: 8px;
	}
	.first-small {
		border-top-right-radius: 8px;
	}

	.last-small {
		border-bottom-right-radius: 8px;
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
	
	.hs-blog-wrapper {;
		background-color: #f8f9fa;
	}
	.sb-grid-main-wrapper {
		background-color: #f8f9fa;
	}
	.hs-slider .slider-wrapper {
		background-color: #f8f9fa;
	}
	.fa-phone-alt:before {
		color: #fff !important;
	}
	.hs-map-sec .hs-box {
		background-color: #839287;
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
	
	.icon-service {
		width: 30px;
		height: 30px;
	}
	
	.hotel-highlight {
		display: flex;
		background-color: #fff;
		box-shadow: 0 0 10px rgba(0,0,0,0.1);
		margin: 20px auto;
		max-width: 100%;
		border-radius: 10px;
		overflow: hidden;
	}

	.hotel-image img {
		width: 100%;
		height: auto;
	}

	.hotel-details {
		padding: 20px;
		flex: 1;
	}

	.hotel-details h1 {
		font-size: 24px;
		margin: 0 0 10px;
	}

	.ratings {
		display: flex;
		align-items: center;
		margin: 10px 0;
	}

	.rating-value {
		font-size: 20px;
		color: #ff6f61;
		font-weight: bold;
	}

	.rating-count {
		margin-left: 10px;
		color: #777;
	}

	.location {
		font-size: small !important;
		color: #839287 !important;
		margin: 0 0;
		line-height: 24px;
	}

	.highlight {
		background-color: #eaf4ff;
		border-left: 4px solid #1e90ff;
		padding: 10px;
		margin: 10px 0;
		border-radius: 5px;
	}

	.highlight-item {
		margin: 5px 0;
		font-size: 14px;
	}

	.price {
		font-size: 20px;
		color: #333;
		font-weight: bold;
		margin: 10px 0;
	}

	.price-info {
		font-size: 14px;
		color: #777;
	}

	.book-now {
		background-color: #ff6f61;
		color: #fff;
		border: none;
		padding: 10px 20px;
		font-size: 16px;
		cursor: pointer;
		border-radius: 5px;
	}

	.book-now:hover {
		background-color: #e65a50;
	}
	
	.icon-user {
		position: absolute;
		right: 10%;
		top: 15px;
		bottom: 0;
		margin: auto;
	}
	
	.hs-blog-wrapper .hs-servicer-sec ul {
		display: flex;
		justify-content: space-between;
		background-color: #fff;
		padding: 20px 30px !important;
		border-radius: 8px;	
		
	}
	

	@media (max-width: 600px) {
		.gallery-item.large {
			grid-column: auto; 
			grid-row: auto;
		}

		.gallery-container {
			grid-template-columns: 1fr; 
		}
		
		.sb-grid-main-wrapper .find-us-wrapper ul li input, .sb-grid-main-wrapper .find-us-wrapper ul li select {
			width: 100%;
			padding-left: 15px;
			height: 45px;
			border: none;
			box-shadow: 0px 1px 5px rgb(16 16 16 / 10%);
			font-weight: 600;
			font-size: 16px;
			color: #111;
		}
	}
	@media only screen and (min-width: 1400px) {
		.gallery-container {
			grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
		}
	}
	
	
</style>

<body>
    <!-- return-to-top start-->
    <a href="javascript:" id="return-to-top"><i class="fas fa-sort-up"></i></a>


	<div class="main_wrapper">
		<div class="main_menu_wrapper">
            <!-- main_menu_navbar start -->
            <div class="main_menu_navbar ">
                <? include('includes/topbar.php'); ?>

            </div>
        </div>

    <!-- sidebar end -->

    <!--HEADER END-->
    <!-- sign up banner start-->
	<!--
    <div class="gallery-container">
		<?php $count_image=0; foreach ($room_list as $value) {  ?>

			<? if($count_image == 0){ ?>
				<div class="gallery-item large">
					<img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" alt="Image <? echo $value['id_room_type_photo']; ?>" />
				</div>
			<? } ?>

			<? if($count_image < 5 && $count_image > 0){ ?>
				<div class="gallery-item">
					<img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" alt="Image <? echo $value['id_room_type_photo']; ?>" />
				</div>
			<? } ?>
		<? $count_image++; } ?>
    </div>
	-->
	
	<div class="gallery-container">
		<?php $count_image=0; foreach ($room_list as $value) {  ?>
			<? if($count_image == 0){ ?>
				<div class="gallery-item large">
					<img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" alt="Image <? echo $value['id_room_type_photo']; ?>" />
				</div>
			<? } ?>
			<? if($count_image == 3){ ?>
				<div class="gallery-item first-small">
					<img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" alt="Image <? echo $value['id_room_type_photo']; ?>" />
				</div>
			<? } ?>
			<? if($count_image == 4){ ?>
				<div class="gallery-item last-small">
					<img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" alt="Image <? echo $value['id_room_type_photo']; ?>" />
				</div>
			<? } ?>
			<? if($count_image > 1 && $count_image < 4){ ?>
				<div class="gallery-item">
					<img src="includes/image.php?filename=<?php echo trim($value['room_photo_url']); ?>" alt="Image <? echo $value['id_room_type_photo']; ?>" />
				</div>
			<? } ?>
		<? $count_image++; } ?>
	</div>


    <div class="hs-blog-wrapper" style="padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="hs-blog-content">
                        <h3 class="en">
                            <!-- <a href=""> -->
                            <? echo $room_type_name_en; ?>
                            <!-- </a> -->
                        </h3>
                        <h3 class="th">
                            <? echo $room_type_name_th; ?>
                        </h3>  
						
						
                        <div class="pt-20">
                            <a href="" class="text-color"><span><i class="fas fa-map-marker-alt text-color"></i></span>
                                50 Vijay Nagar, Indore, INDIA</a>
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <!--<span class="res-block">
                                <a href="javascript:;"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i>
                                    <i class="far fa-star"></i><i class="far fa-star"></i> <span>| 251 + Review</span>
                                </a>
                            </span>-->
                        </div>
						
                        <div class="pt-20">
                            Start From- <span class="text-design"><?php echo number_format(trim($value['default_rate'])); ?> ฿ / Night</span>
                        </div>
                        <p class="en" class="pt-20"><? echo $description_en; ?></p>
                        <p class="th" class="pt-20"><? echo $description_th; ?></p>

                        <!-- <div id="hs-list-items">
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
                        </div> -->
                        <!-- <p class="pt-20">
                            This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                            nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan
                        </p> -->
                    </div>
                    <div class="bs-social-content mt-30">
                       <!--  <ul>
                            <li><a href="javascript:;"><i class="fas fa-tags"></i></a></li>
                            <li><a href="javascript:;">family</a></li>
                            <li><a href="javascript:;">fun</a></li>
                            <li><a href="javascript:;">holiday</a></li>
                            <li><a href="javascript:;">island</a></li>
                            <li><a href="javascript:;">package</a></li>
                        </ul> -->
                       <!--  <ul class="social-icon ">
                            <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                        </ul> -->
                    </div>
                    
					
					<!--
					<div class="hotel-highlight">
						<div class="hotel-details">
							<h4 class="en" style="color: #000 !important; padding-top: 0; padding-bottom: 15px;">Highlights</h4>
							<h4 class="th" style="color: #000 !important; padding-top: 0; padding-bottom: 15px;">ไฮไลท์</h4>

							<ul style="display: flex; justify-content: space-around; align-items: center;">
								<? foreach($project_highlights_list as $value){ ?>
									<li>
										<img src="includes/image.php?filename=<?php echo trim($value['icon']); ?>" >
										<span class="location en"><? echo $value['description_en']; ?></span>
										<span class="location th"><? echo $value['description_th']; ?></span>
									</li>
								<? } ?>
							</ul>

						</div>
					</div>
					-->
					
					<!--
					<div class="hs-servicer-sec">
						<ul>
							<div class="col-md-12 ">
								<h4 class="en" style="color: #000 !important; padding-top: 0; padding-bottom: 30px;">Nearby Locations</h4>
								<h4 class="th" style="color: #000 !important; padding-top: 0; padding-bottom: 30px;">สถานที่ใกล้เคียง</h4>
								<ul style="flex-direction: column; padding: 0 15px;">

									<? foreach($point_of_interest_list as $value){ ?>
									<li class="en">
										<i class="fas fa-map-marker-alt" style="font-size: small; padding: 5px;"></i>
										<span class="location"><? echo $value['location_name_en']; ?></span>
										<span class="location" style="float: right;"><? echo $value['distance_km']; ?>&nbsp;ม.</span>
									</li>
									<li class="th">
										<i class="fas fa-map-marker-alt" style="font-size: small; padding: 5px;"></i>
										<span class="location"><? echo $value['location_name_th']; ?></span>
										<span class="location" style="float: right;"><? echo $value['distance_km']; ?>&nbsp;ม.</span>
									</li>
									<? } ?>

								</ul>
							</div>
						</ul>
					</div>
					-->
					
                    <div class="hs-servicer-sec mt-4" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
						<ul>
							<div class="col-md-8" style="padding-right: 16px;">
								<h4 class="en" style="color: #000 !important; padding-top: 0; padding-bottom: 15px;">Highlights</h4>
								<h4 class="th" style="color: #000 !important; padding-top: 0; padding-bottom: 15px;">ไฮไลท์</h4>								
								<div class="row">
									<? foreach($project_highlights_list as $value){ ?>
										<div class="col-sm-3 mb-2">
											<li class="t-center text-color">
												<img src="includes/image.php?filename=<?php echo trim($value['icon']); ?>"  class="icon-service"><br/>
												<h6 class="en mt-1" style="font-size: small; line-height: 24px;"><? echo $value['description_en']; ?></h6>
												<h6 class="th" style="font-size: small;"><? echo $value['description_th']; ?></h6>
											</li>
										</div>

									<?php } ?>
								</div>
							</div>
						</ul>
						<hr style="margin: 0 auto; width: 98%;">
						<!--
                        <h4 class="en">The Best Service</h4>
                        <h4 class="th">บริการที่ดีที่สุด</h4>
						-->
						
						<ul style="display: flex; flex-wrap: wrap;">
							<div class="col-md-8" style="padding-right: 16px;">
								<h4 class="en" style="color: #000 !important; padding-top: 0;">Facilities & Amenities</h4>
								<h4 class="th" style="color: #000 !important; padding-top: 0;">สาธารณูปโภค & สิ่งอำนวยความสะดวก</h4>
								<div class="row">
									<?php foreach($icon_room_list as $value): ?>
										<div class="col-sm-3 mb-4">
											<li class="t-center text-color">
												<span>
													<!-- <i class="fas fa-car"></i> -->
													<img src="includes/image.php?filename=<?php echo trim($value['icon']); ?>" alt="" class="icon-service">
												</span>
												<h6 class="en mt-1" style="font-size: small; line-height: 24px;"><?php echo trim($value['desc_en']); ?></h6>
												<h6 class="th" style="font-size: small;"><?php echo trim($value['desc_th']); ?></h6>
											</li>
										</div>

									<?php endforeach; ?>
								</div>
							</div>
							
							<div class="col-md-4" style="padding-left: 8px;">
								<h4 class="en" style="color: #000 !important; padding-top: 8px; padding-bottom: 8px;">Nearby Locations</h4>
								<h4 class="th" style="color: #000 !important; padding-top: 8px; padding-bottom: 8px;">สถานที่ใกล้เคียง</h4>
								<div class="row mb4">
									<div class="col-md-12">		
										<div class="table-responsive" style="font-size: small; line-height: 15px;">
											<table class="table table-bordered">
												<tbody>
													<tr>
														<th>ชื่อสถานที่</th>
														<th>ระยะทาง(km)</th>
													</tr>
													<? foreach($point_of_interest_list as $value){ ?>
													<tr class="en">
														<td class="location">
															<span class="location"><? echo $value['location_name_en']; ?></span>
														</td>
														<td class="location" style="text-align: center;">
															<span class="location" style="float: right;"><? echo $value['distance_km']; ?>&nbsp;m.</span>
														</td>
													</tr>
													<tr class="th">
														<td class="location">
															<span class="location"><? echo $value['location_name_th']; ?></span>
														</td>
														<td class="location" style="text-align: center;">
															<span class="location" style="float: right;"><? echo $value['distance_km']; ?>&nbsp;ม.</span>
														</td>
													</tr>
													<?php }; ?>
												</tbody>
											</table>  
										</div>		
									</div>
								</div>
							</div>
						</ul>
						<!-- <div class="w-100 mb-3"></div> -->
                       <!--  <ul>
                            <li class="t-center text-color">
                                <span><i class="fas fa-car"></i></span>
                                <h5><a href="">Convenient<br>
                                        Transport</a></h5>
                            </li>
                        </ul> -->
						<hr style="margin: 0 auto; width: 98%;">
						<ul>
							<div class="col-md-12" style="line-height: 28px;">
								<div class="row">			
									<div class="container-fluid mb-4">
										<h4 class="en" style="color: #000 !important; padding-top: 8px; padding-bottom: 8px;">Conditions And Policies</h4>
										<h4 class="th" style="color: #000 !important; padding-top: 8px; padding-bottom: 8px;">เงื่อนไขและข้อกำหนดในการเข้าพัก</h4>
										<div class="col-md-12">		
											<span><u>นโยบายการยกเลิกการจอง</u></span>	
											<ol>
															
												<li>การโอนเงินต้องเสร็จสิ้นภายใน 2 ชั่วโมงหลังการจอง มิฉะนั้นระบบจะยกเลิกการจองโดยอัตโนมัติ</li>			
											</ol>
											<span><u>นโยบายโชว์รูม</u></span>
											<ol>
															
													<li>เวลาเช็คอิน 14.00 น. เวลาเช็คเอ้าท์ 12.00 น. หากเข้าพักก่อน หรือ เช็คเอ้าท์เกิน ชั่วโมงละ 500 บาท ตามเงื่อนไขโชว์รูม</li>			
															
													<li>ไม่อนุญาตให้นำสัตว์เลี้ยงเข้าพักภายในบริเวณโชว์รูม</li>			
															
													<li>ไม่อนุญาตให้ประกอบอาหารภายในบริเวณที่พัก ยกเว้นเฉพาะพื้นที่ที่ทางโชว์รูมจัดไว้ให้เท่านั้น</li>			
															
													<li>ขอความกรุณางดใช้เสียง ตั้งแต่เวลา 22.00 น. - 06.00 น.</li>			
															
													<li>ในกรณีทำให้ทรัพย์สินของโชว์รูมเสียหายให้ชดใช้คืนตามมูลค่าของทรัพย์สินนั้น</li>			
															
													<li>งดสูบบุหรี่ในห้องพัก และบริเวณโชว์รูม ฝ่าฝืนปรับ 2,000 บาท (ลูกค้าสามารถสูบบุหรี่ในพื้นที่ที่โชว์รูมจัดไว้ให้เท่านั้น)</li>			
															
													<li>งดจุดพลุ, ประทัด, ดอกไม้ไฟ หรือ โคมลอย ในบริเวณโชว์รูม ฝ่าฝืนปรับ 2,000 บาท</li>			
											</ol>
										</div>
									</div>
								</div>
							</div>
						</ul>
                        
                    </div>

					
					
					

                    <!--
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
					-->

					<!--
                    <div class="hs-map-sec mt-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4 style="padding: 8px 0;"><a href="" class="en">Location</a></h4>
								<h4 style="padding: 8px 0;"><a href="" class="th">ตำแหน่ง</a></h4>
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
					-->
					
					
                    <!-- <div class="hs-rating-section">
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
                    </div> -->
                    <!-- <div class="bs-comment-text p-30 mt-30">

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
                    </div> -->
                </div>


    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>

    <style>
        .form-inline .form-group {
            display: flex;
            align-items: center;
        }
        .form-inline .form-group label {
            margin-right: 10px; /* ระยะห่างระหว่าง label กับ input */
        }
    </style>
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="hs-slidebar sb-grid-main-wrapper p-0">
                        <div class="find-us-wrapper pb-0">
                            <h4 class="pb-2 en"><a href="javascript:;">Check Availability</a></h4>
							<h4 class="pb-2 th"><a href="javascript:;">ตรวจสอบห้องว่าง</a></h4>
                            <ul>

                            	<p style="margin-bottom: 5px;color: black;" >
									<span class="en" >Check-in Date</span>
									<span class="th" >วันที่เข้าพัก</span>
								</p>
	                            <li>
                                    <input type="text" name="picker" class="datepicker" >
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

                                <p style="margin-bottom: 5px;color: black;" >
									<span class="en" >Check-out Date</span>
									<span class="th" >วันที่ออก</span>
								</p>
                                <li>
                                    <input type="text" name="picker" class="datepicker" >
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

                                <p style="margin-bottom: 5px;color: black;" >
									<span class="en" >Adult</span>
									<span class="th" >ผู้ใหญ่</span>
								</p>
                                <li>
                                	<input type="text" name="adult"  style="border-radius: 5px;" >
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
                                        <i id="Icon1" class="fas fa-user icon-user"></i>
                                       <!--  <path id="Icon1" class="shp0"
                                            d="M17.94 5.32C17.83 4.78 17.57 4.3 17.2 3.93C17.08 3.82 16.95 3.7 16.8 3.61L16.78 3.59C16.77 3.57 16.75 3.57 16.73 3.56C16.67 3.52 16.62 3.48 16.56 3.46L16.54 3.46C16.15 3.26 15.72 3.15 15.23 3.15L14.07 3.15L14.07 2.35C14.07 2.17 13.93 2 13.72 2C13.53 2 13.36 2.15 13.36 2.35L13.36 3.11L6.65 3.11L6.65 2.35C6.65 2.17 6.49 2 6.3 2C6.11 2 5.94 2.15 5.94 2.35L5.94 3.11L4.78 3.11C4.43 3.11 4.07 3.18 3.76 3.31C3.4 3.46 3.08 3.67 2.82 3.93C2.67 4.08 2.54 4.24 2.43 4.41C2.32 4.59 2.22 4.78 2.15 4.98C2.11 5.09 2.07 5.21 2.06 5.32C2.02 5.5 2 5.69 2 5.87L2 7.73L2 16.27C2 17.03 2.32 17.72 2.8 18.2C3.31 18.7 4 19 4.75 19L15.25 19C16.02 19 16.71 18.68 17.2 18.2C17.7 17.7 18 17.01 18 16.27L18 7.73L18 5.87C18 5.69 17.98 5.5 17.94 5.32ZM2.73 5.85C2.73 5.71 2.75 5.58 2.77 5.45C2.78 5.32 2.84 5.19 2.88 5.06C2.95 4.89 3.05 4.74 3.14 4.61C3.2 4.54 3.25 4.48 3.31 4.41C3.42 4.3 3.55 4.2 3.68 4.11C4 3.93 4.35 3.82 4.75 3.82L5.91 3.82L5.91 4.57C5.91 4.76 6.06 4.93 6.26 4.93C6.45 4.93 6.62 4.78 6.62 4.57L6.62 3.82L13.42 3.82L13.42 4.57C13.42 4.76 13.57 4.93 13.78 4.93C13.96 4.93 14.13 4.78 14.13 4.57L14.13 3.82L15.29 3.82C15.68 3.82 16.06 3.93 16.36 4.11C16.49 4.2 16.62 4.3 16.73 4.41C17.01 4.69 17.21 5.04 17.29 5.45C17.31 5.58 17.33 5.72 17.33 5.85L17.33 7.37L2.73 7.37L2.73 5.85ZM17.35 16.25C17.35 16.83 17.12 17.35 16.75 17.72C16.37 18.09 15.85 18.31 15.29 18.31L4.78 18.31C4.22 18.31 3.7 18.09 3.33 17.72C2.95 17.35 2.73 16.83 2.73 16.27L2.73 8.06L17.35 8.06L17.35 16.25L17.35 16.25Z">
                                        </path> -->
                                    </svg>
                                </li>

                                <p style="margin-bottom: 5px;color: black;" >
									<span class="en" >Child</span>
									<span class="th" >เด็ก</span>
								</p>
                                <li>
                                    <select name="SelectChild1" id="SelectChild1" style="border-radius: 5px;">
                                        <option value=""> 0 Child</option>
                                        <option value=""> 1 Child</option>
                                        <option value=""> 0 Child</option>
                                        <option value=""> 0 Child</option>
                                        <option value=""> 0 Child</option>
                                    </select>
                                </li>

                                <p style="margin-bottom: 5px;color: black;" >
									<span class="en" >Room</span>
									<span class="th" >ห้อง</span>
								</p>
                                <li>
                                    <select name="SelectChild2" id="SelectChild2" style="border-radius: 5px;">
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

                                <li class="d-flex justify-content-center gap-3" >
                                	<a class="btn btn-primary w-45 mx-2 en" >Add To Cart</a>
                                	<a class="btn btn-primary w-45 mx-2 th" >เก็บใส่ตะกร้า</a>

                                    <a class="btn btn-primary w-45 mx-2 en">Book Now</a>
                                    <a class="btn btn-primary w-45 mx-2 th">จองตอนนี้</a>
                                </li>
                            </ul>

                        </div>

                        <!-- <div class="feed-wrapper">
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
                        </div> -->
                    </div>

                </div>
				
				<div class="col-md-12">
					<div class="hs-map-sec mt-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <h4 style="padding: 8px 0;"><a href="" class="en">Location</a></h4>
								<h4 style="padding: 8px 0;"><a href="" class="th" style="display: none;">ตำแหน่ง</a></h4>
                                <div style="width: 100%; height: 500px;">
                                    <div class="with-amp">
                                        <div class="map-view">
                                              <div class="google-map" id="google_map" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div><button draggable="false" aria-label="Keyboard shortcuts" title="Keyboard shortcuts" type="button" style="background: none transparent; display: block; border: none; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; z-index: 1000002; outline-offset: 3px; right: 0px; bottom: 0px; transform: translateX(100%);"></button></div><div tabindex="0" aria-label="Map" aria-roledescription="map" role="region" aria-describedby="69EC4C86-5B73-4268-A0F2-8C51A042960B" style="position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;"><div id="69EC4C86-5B73-4268-A0F2-8C51A042960B" style="display: none;"><div class="LGLeeN-keyboard-shortcuts-view"><table><tbody><tr><td><kbd aria-label="Left arrow">←</kbd></td><td aria-label="Move left.">Move left</td></tr><tr><td><kbd aria-label="Right arrow">→</kbd></td><td aria-label="Move right.">Move right</td></tr><tr><td><kbd aria-label="Up arrow">↑</kbd></td><td aria-label="Move up.">Move up</td></tr><tr><td><kbd aria-label="Down arrow">↓</kbd></td><td aria-label="Move down.">Move down</td></tr><tr><td><kbd>+</kbd></td><td aria-label="Zoom in.">Zoom in</td></tr><tr><td><kbd>-</kbd></td><td aria-label="Zoom out.">Zoom out</td></tr><tr><td><kbd>Home</kbd></td><td aria-label="Jump left by 75%.">Jump left by 75%</td></tr><tr><td><kbd>End</kbd></td><td aria-label="Jump right by 75%.">Jump right by 75%</td></tr><tr><td><kbd>Page Up</kbd></td><td aria-label="Jump up by 75%.">Jump up by 75%</td></tr><tr><td><kbd>Page Down</kbd></td><td aria-label="Jump down by 75%.">Jump down by 75%</td></tr></tbody></table></div></div></div><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; will-change: transform; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -106, -70);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 512px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -106, -70);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: 256px;"></div></div></div><div style="width: 26px; height: 37px; overflow: hidden; position: absolute; left: -13px; top: -37px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi3.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 26px; height: 37px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -106, -70);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25535!3i15127!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=84971" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25534!3i15127!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=47751" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25534!3i15126!4i256!2m3!1e0!2sm!3i696444117!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=9953" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25535!3i15126!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=53464" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25536!3i15126!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=90684" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25536!3i15127!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=122191" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25536!3i15128!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=22627" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25535!3i15128!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=116478" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25534!3i15128!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=79258" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25533!3i15128!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=42038" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25533!3i15127!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=10531" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25533!3i15126!4i256!2m3!1e0!2sm!3i696444117!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=103804" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25537!3i15126!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=127904" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25537!3i15127!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=28340" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i15!2i25537!3i15128!4i256!2m3!1e0!2sm!3i696444141!3m12!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!1e3&amp;key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&amp;token=59847" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; will-change: transform; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><span id="DBFBDAD2-8362-4A85-B6F9-0E0132D73AA3" style="display: none;">To navigate, press the arrow keys.</span><div tabindex="-1" style="width: 26px; height: 37px; overflow: hidden; position: absolute; left: -13px; top: -37px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/transparent.png" draggable="false" usemap="#gmimap0" style="width: 26px; height: 37px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"><map name="gmimap0" id="gmimap0"><area log="miw" coords="13,0,4,3.5,0,12,2.75,21,13,37,23.5,21,26,12,22,3.5" shape="poly" tabindex="-1" title="" style="display: inline; position: absolute; left: 0px; top: 0px; cursor: pointer; touch-action: none;"></map></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div class="gm-style-moc" style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0; transition-duration: 0.8s;"><p class="gm-style-mot">Use ctrl + scroll to zoom the map</p></div></div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none; opacity: 0;"></iframe><div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div><div><div class="gmnoprint gm-style-mtc-bbw" role="menubar" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left; position: relative;"><button draggable="false" aria-label="Show street map" title="Show street map" type="button" role="menuitemradio" aria-checked="true" aria-haspopup="true" style="background: none padding-box rgb(255, 255, 255); display: table-cell; border: 0px; margin: 0px; padding: 0px 17px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; text-align: center; height: 40px; vertical-align: middle; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; font-size: 18px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 21px; font-weight: 500;" id="7CC0EBD4-47A0-459D-9772-785726071B53" fdprocessedid="5cxgy">Map</button><ul role="menu" aria-labelledby="7CC0EBD4-47A0-459D-9772-785726071B53" style="background-color: white; list-style: none; padding: 2px; margin: 0px; z-index: -1; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; left: 0px; top: 40px; text-align: left; display: none;"><li tabindex="-1" role="menuitemcheckbox" aria-label="Terrain" draggable="false" title="Show street map with terrain" aria-checked="false" class="ssQIHO-checkbox-menu-item" style="color: black; font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 18px; background-color: rgb(255, 255, 255); padding: 5px 8px 5px 5px; direction: ltr; text-align: left; white-space: nowrap;"><span><span style="mask-image: url(&quot;data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3Cpath%20d%3D%22M19%203H5c-1.11%200-2%20.9-2%202v14c0%201.1.89%202%202%202h14c1.11%200%202-.9%202-2V5c0-1.1-.89-2-2-2zm-9%2014l-5-5%201.41-1.41L10%2014.17l7.59-7.59L19%208l-9%209z%22/%3E%3C/svg%3E&quot;); height: 1em; width: 1em; transform: translateY(0.15em); display: none;"></span><span style="mask-image: url(&quot;data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M19%205v14H5V5h14m0-2H5c-1.1%200-2%20.9-2%202v14c0%201.1.9%202%202%202h14c1.1%200%202-.9%202-2V5c0-1.1-.9-2-2-2z%22/%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3C/svg%3E&quot;); height: 1em; width: 1em; transform: translateY(0.15em);"></span></span><label style="cursor: inherit;">Terrain</label></li></ul></div><div class="gm-style-mtc" style="float: left; position: relative;"><button draggable="false" aria-label="Show satellite imagery" title="Show satellite imagery" type="button" role="menuitemradio" aria-checked="false" aria-haspopup="true" style="background: none padding-box rgb(255, 255, 255); display: table-cell; border: 0px; margin: 0px; padding: 0px 17px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; text-align: center; height: 40px; vertical-align: middle; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; font-size: 18px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 39px;" id="D2FF3341-C91E-4B21-896F-63DF186D5D34" fdprocessedid="v0xb2">Satellite</button><ul role="menu" aria-labelledby="D2FF3341-C91E-4B21-896F-63DF186D5D34" style="background-color: white; list-style: none; padding: 2px; margin: 0px; z-index: -1; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; right: 0px; top: 40px; text-align: left; display: none;"><li tabindex="-1" role="menuitemcheckbox" aria-label="Labels" draggable="false" title="Show imagery with street names" aria-checked="true" class="ssQIHO-checkbox-menu-item" style="color: black; font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 18px; background-color: rgb(255, 255, 255); padding: 5px 8px 5px 5px; direction: ltr; text-align: left; white-space: nowrap;"><span><span style="mask-image: url(&quot;data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3Cpath%20d%3D%22M19%203H5c-1.11%200-2%20.9-2%202v14c0%201.1.89%202%202%202h14c1.11%200%202-.9%202-2V5c0-1.1-.89-2-2-2zm-9%2014l-5-5%201.41-1.41L10%2014.17l7.59-7.59L19%208l-9%209z%22/%3E%3C/svg%3E&quot;); height: 1em; width: 1em; transform: translateY(0.15em);"></span><span style="mask-image: url(&quot;data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M19%205v14H5V5h14m0-2H5c-1.1%200-2%20.9-2%202v14c0%201.1.9%202%202%202h14c1.1%200%202-.9%202-2V5c0-1.1-.9-2-2-2z%22/%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3C/svg%3E&quot;); height: 1em; width: 1em; transform: translateY(0.15em); display: none;"></span></span><label style="cursor: inherit;">Labels</label></li></ul></div></div></div><div></div><div></div><div></div><div><button draggable="false" aria-label="Toggle fullscreen view" title="Toggle fullscreen view" type="button" aria-pressed="false" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;" fdprocessedid="vynk8"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button></div><div></div><div></div><div></div><div></div><div><div draggable="false" class="gm-style-cc" style="user-select: none; position: absolute; height: 14px; line-height: 14px; bottom: 187px; right: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: none; padding-bottom: 0px;"></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" data-control-width="40" data-control-height="153" style="margin: 10px; user-select: none; position: absolute; bottom: 167px; right: 40px;"><div class="gmnoprint" data-control-width="40" data-control-height="40" style="display: none; position: absolute;"><div style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px;"><button draggable="false" aria-label="Rotate map clockwise" title="Rotate map clockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div><button draggable="false" aria-label="Rotate map counterclockwise" title="Rotate map counterclockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; transform: scaleX(-1);"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div><button draggable="false" aria-label="Tilt map" title="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"><img alt="" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"></button></div></div><button draggable="false" aria-label="Drag Pegman onto the map to open Street View" title="Drag Pegman onto the map to open Street View" type="button" class="gm-svpc" dir="ltr" data-control-width="40" data-control-height="40" style="background: rgb(255, 255, 255); border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; user-select: none; --pegman-scaleX: 1; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px; touch-action: none; left: 0px; top: 0px;" fdprocessedid="5905d"><div style="position: absolute; left: 50%; top: 50%; transform: scaleX(var(--pegman-scaleX));"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2023%2038%22%3E%3Cpath%20d%3D%22M16.6%2038.1h-5.5l-.2-2.9-.2%202.9h-5.5L5%2025.3l-.8%202a1.53%201.53%200%2001-1.9.9l-1.2-.4a1.58%201.58%200%2001-1-1.9v-.1c.3-.9%203.1-11.2%203.1-11.2a2.66%202.66%200%20012.3-2l.6-.5a6.93%206.93%200%20014.7-12%206.8%206.8%200%20014.9%202%207%207%200%20012%204.9%206.65%206.65%200%2001-2.2%205l.7.5a2.78%202.78%200%20012.4%202s2.9%2011.2%202.9%2011.3a1.53%201.53%200%2001-.9%201.9l-1.3.4a1.63%201.63%200%2001-1.9-.9l-.7-1.8-.1%2012.7zm-3.6-2h1.7L14.9%2020.3l1.9-.3%202.4%206.3.3-.1c-.2-.8-.8-3.2-2.8-10.9a.63.63%200%2000-.6-.5h-.6l-1.1-.9h-1.9l-.3-2a4.83%204.83%200%20003.5-4.7A4.78%204.78%200%200011%202.3H10.8a4.9%204.9%200%2000-1.4%209.6l-.3%202h-1.9l-1%20.9h-.6a.74.74%200%2000-.6.5c-2%207.5-2.7%2010-3%2010.9l.3.1L4.8%2020l1.9.3.2%2015.8h1.6l.6-8.4a1.52%201.52%200%20011.5-1.4%201.5%201.5%200%20011.5%201.4l.9%208.4zm-10.9-9.6zm17.5-.1z%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23333%22%20opacity%3D%22.7%22/%3E%3Cpath%20d%3D%22M5.9%2013.6l1.1-.9h7.8l1.2.9%22%20fill%3D%22%23ce592c%22/%3E%3Cellipse%20cx%3D%2210.9%22%20cy%3D%2213.1%22%20rx%3D%222.7%22%20ry%3D%22.3%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23ce592c%22%20opacity%3D%22.5%22/%3E%3Cpath%20d%3D%22M20.6%2026.1l-2.9-11.3a1.71%201.71%200%2000-1.6-1.2H5.699999999999999a1.69%201.69%200%2000-1.5%201.3l-3.1%2011.3a.61.61%200%2000.3.7l1.1.4a.61.61%200%2000.7-.3l2.7-6.7.2%2016.8h3.6l.6-9.3a.47.47%200%2001.44-.5h.06c.4%200%20.4.2.5.5l.6%209.3h3.6L15.7%2020.3l2.5%206.6a.52.52%200%2000.66.31l1.2-.4a.57.57%200%2000.5-.7z%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M7%2013.6l3.9%206.7%203.9-6.7%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23cf572e%22%20opacity%3D%22.6%22/%3E%3Ccircle%20cx%3D%2210.9%22%20cy%3D%227%22%20r%3D%225.9%22%20fill%3D%22%23fdbf2d%22/%3E%3C/svg%3E" alt="Street View Pegman Control" style="height: 30px; width: 30px; position: absolute; transform: translate(-50%, -50%); pointer-events: none;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2038%22%3E%3Cpath%20d%3D%22M22%2026.6l-2.9-11.3a2.78%202.78%200%2000-2.4-2l-.7-.5a6.82%206.82%200%20002.2-5%206.9%206.9%200%2000-13.8%200%207%207%200%20002.2%205.1l-.6.5a2.55%202.55%200%2000-2.3%202s-3%2011.1-3%2011.2v.1a1.58%201.58%200%20001%201.9l1.2.4a1.63%201.63%200%20001.9-.9l.8-2%20.2%2012.8h11.3l.2-12.6.7%201.8a1.54%201.54%200%20001.5%201%201.09%201.09%200%2000.5-.1l1.3-.4a1.85%201.85%200%2000.7-2zm-1.2.9l-1.2.4a.61.61%200%2001-.7-.3l-2.5-6.6-.2%2016.8h-9.4L6.6%2021l-2.7%206.7a.52.52%200%2001-.66.31l-1.1-.4a.52.52%200%2001-.31-.66l3.1-11.3a1.69%201.69%200%20011.5-1.3h.2l1-.9h2.3a5.9%205.9%200%20113.2%200h2.3l1.1.9h.2a1.71%201.71%200%20011.6%201.2l2.9%2011.3a.84.84%200%2001-.4.7z%22%20fill%3D%22%23333%22%20fill-opacity%3D%22.2%22/%3E%26quot%3B%3C/svg%3E" alt="Pegman is on top of the Map" style="height: 30px; width: 30px; position: absolute; transform: translate(-50%, -50%); pointer-events: none; display: none;"><img alt="Street View Pegman Control" src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2040%2050%22%3E%3Cpath%20d%3D%22M34-30.4l-2.9-11.3a2.78%202.78%200%2000-2.4-2l-.7-.5a6.82%206.82%200%20002.2-5%206.9%206.9%200%2000-13.8%200%207%207%200%20002.2%205.1l-.6.5a2.55%202.55%200%2000-2.3%202s-3%2011.1-3%2011.2v.1a1.58%201.58%200%20001%201.9l1.2.4a1.63%201.63%200%20001.9-.9l.8-2%20.2%2012.8h11.3l.2-12.6.7%201.8a1.54%201.54%200%20001.5%201%201.09%201.09%200%2000.5-.1l1.3-.4a1.85%201.85%200%2000.7-2zm-1.2.9l-1.2.4a.61.61%200%2001-.7-.3L28.4-36l-.2%2016.8h-9.4L18.6-36l-2.7%206.7a.52.52%200%2001-.66.31l-1.1-.4a.52.52%200%2001-.31-.66l3.1-11.3a1.69%201.69%200%20011.5-1.3h.2l1-.9h2.3a5.9%205.9%200%20113.2%200h2.3l1.1.9h.2a1.71%201.71%200%20011.6%201.2l2.9%2011.3a.84.84%200%2001-.4.7zM34%2029.6l-2.9-11.3a2.78%202.78%200%2000-2.4-2l-.7-.5a6.82%206.82%200%20002.2-5%206.9%206.9%200%2000-13.8%200%207%207%200%20002.2%205.1l-.6.5a2.55%202.55%200%2000-2.3%202s-3%2011.1-3%2011.2v.1a1.58%201.58%200%20001%201.9l1.2.4a1.63%201.63%200%20001.9-.9l.8-2%20.2%2012.8h11.3l.2-12.6.7%201.8a1.54%201.54%200%20001.5%201%201.09%201.09%200%2000.5-.1l1.3-.4a1.85%201.85%200%2000.7-2zm-1.2.9l-1.2.4a.61.61%200%2001-.7-.3L28.4%2024l-.2%2016.8h-9.4L18.6%2024l-2.7%206.7a.52.52%200%2001-.66.31l-1.1-.4a.52.52%200%2001-.31-.66l3.1-11.3a1.69%201.69%200%20011.5-1.3h.2l1-.9h2.3a5.9%205.9%200%20113.2%200h2.3l1.1.9h.2a1.71%201.71%200%20011.6%201.2l2.9%2011.3a.84.84%200%2001-.4.7z%22%20fill%3D%22%23333%22%20fill-opacity%3D%22.2%22/%3E%3Cpath%20d%3D%22M15.4%2038.8h-4a1.64%201.64%200%2001-1.4-1.1l-3.1-8a.9.9%200%2001-.5.1l-1.4.1a1.62%201.62%200%2001-1.6-1.4L2.3%2015.4l1.6-1.3a6.87%206.87%200%2001-3-4.6A7.14%207.14%200%20012%204a7.6%207.6%200%20014.7-3.1A7.14%207.14%200%200112.2%202a7.28%207.28%200%20012.3%209.6l2.1-.1.1%201c0%20.2.1.5.1.8a2.41%202.41%200%20011%201s1.9%203.2%202.8%204.9c.7%201.2%202.1%204.2%202.8%205.9a2.1%202.1%200%2001-.8%202.6l-.6.4a1.63%201.63%200%2001-1.5.2l-.6-.3a8.93%208.93%200%2000.5%201.3%207.91%207.91%200%20001.8%202.6l.6.3v4.6l-4.5-.1a7.32%207.32%200%2001-2.5-1.5l-.4%203.6zm-10-19.2l3.5%209.8%202.9%207.5h1.6V35l-1.9-9.4%203.1%205.4a8.24%208.24%200%20003.8%203.8h2.1v-1.4a14%2014%200%2001-2.2-3.1%2044.55%2044.55%200%2001-2.2-8l-1.3-6.3%203.2%205.6c.6%201.1%202.1%203.6%202.8%204.9l.6-.4c-.8-1.6-2.1-4.6-2.8-5.8-.9-1.7-2.8-4.9-2.8-4.9a.54.54%200%2000-.4-.3l-.7-.1-.1-.7a4.33%204.33%200%2000-.1-.5l-5.3.3%202.2-1.9a4.3%204.3%200%2000.9-1%205.17%205.17%200%2000.8-4%205.67%205.67%200%2000-2.2-3.4%205.09%205.09%200%2000-4-.8%205.67%205.67%200%2000-3.4%202.2%205.17%205.17%200%2000-.8%204%205.67%205.67%200%20002.2%203.4%203.13%203.13%200%20001%20.5l1.6.6-3.2%202.6%201%2011.5h.4l-.3-8.2z%22%20fill%3D%22%23333%22/%3E%3Cpath%20d%3D%22M3.35%2015.9l1.1%2012.5a.39.39%200%2000.36.42h.14l1.4-.1a.66.66%200%2000.5-.4l-.2-3.8-3.3-8.6z%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M5.2%2028.8l1.1-.1a.66.66%200%2000.5-.4l-.2-3.8-1.2-3.1z%22%20fill%3D%22%23ce592b%22%20fill-opacity%3D%22.25%22/%3E%3Cpath%20d%3D%22M21.4%2035.7l-3.8-1.2-2.7-7.8L12%2015.5l3.4-2.9c.2%202.4%202.2%2014.1%203.7%2017.1%200%200%201.3%202.6%202.3%203.1v2.9m-8.4-8.1l-2-.3%202.5%2010.1.9.4v-2.9%22%20fill%3D%22%23e5892b%22/%3E%3Cpath%20d%3D%22M17.8%2025.4c-.4-1.5-.7-3.1-1.1-4.8-.1-.4-.1-.7-.2-1.1l-1.1-2-1.7-1.6s.9%205%202.4%207.1a19.12%2019.12%200%20001.7%202.4z%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23cf572e%22%20opacity%3D%22.6%22/%3E%3Cpath%20d%3D%22M14.4%2037.8h-3a.43.43%200%2001-.4-.4l-3-7.8-1.7-4.8-3-9%208.9-.4s2.9%2011.3%204.3%2014.4c1.9%204.1%203.1%204.7%205%205.8h-3.2s-4.1-1.2-5.9-7.7a.59.59%200%2000-.6-.4.62.62%200%2000-.3.7s.5%202.4.9%203.6a34.87%2034.87%200%20002%206z%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M15.4%2012.7l-3.3%202.9-8.9.4%203.3-2.7%22%20fill%3D%22%23ce592b%22/%3E%3Cpath%20d%3D%22M9.1%2021.1l1.4-6.2-5.9.5%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23cf572e%22%20opacity%3D%22.6%22/%3E%3Cpath%20d%3D%22M12%2013.5a4.75%204.75%200%2001-2.6%201.1c-1.5.3-2.9.2-2.9%200s1.1-.6%202.7-1%22%20fill%3D%22%23bb3d19%22/%3E%3Ccircle%20cx%3D%227.92%22%20cy%3D%228.19%22%20r%3D%226.3%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M4.7%2013.6a6.21%206.21%200%20008.4-1.9v-.1a8.89%208.89%200%2001-8.4%202z%22%20fill%3D%22%23ce592b%22%20fill-opacity%3D%22.25%22/%3E%3Cpath%20d%3D%22M21.2%2027.2l.6-.4a1.09%201.09%200%2000.4-1.3c-.7-1.5-2.1-4.6-2.8-5.8-.9-1.7-2.8-4.9-2.8-4.9a1.6%201.6%200%2000-2.17-.65l-.23.15a1.68%201.68%200%2000-.4%202.1s2.3%203.9%203.1%205.3c.6%201%202.1%203.7%202.9%205.1a.94.94%200%20001.24.49l.16-.09z%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M19.4%2019.8c-.9-1.7-2.8-4.9-2.8-4.9a1.6%201.6%200%2000-2.17-.65l-.23.15-.3.3c1.1%201.5%202.9%203.8%203.9%205.4%201.1%201.8%202.9%205%203.8%206.7l.1-.1a1.09%201.09%200%2000.4-1.3%2057.67%2057.67%200%2000-2.7-5.6z%22%20fill%3D%22%23ce592b%22%20fill-opacity%3D%22.25%22/%3E%3C/svg%3E" style="display: none; height: 40px; width: 40px; position: absolute; transform: translate(-60%, -45%); pointer-events: none;"></div></button><div class="gmnoprint" data-control-width="40" data-control-height="81" style="position: absolute; left: 0px; top: 72px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;"><button draggable="false" aria-label="Zoom in" title="Zoom in" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;" fdprocessedid="mgpqq"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" aria-label="Zoom out" title="Zoom out" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;" fdprocessedid="8e82qi"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button></div></div></div></div><div><div style="margin: 0px 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" title="Open this area in Google Maps (opens a new window)" aria-label="Open this area in Google Maps (opens a new window)" href="https://maps.google.com/maps?ll=13.675088,100.540436&amp;z=15&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" style="display: inline;"><div style="width: 66px; height: 26px;"><img alt="Google" src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2069%2029%22%3E%3Cg%20opacity%3D%22.6%22%20fill%3D%22%23fff%22%20stroke%3D%22%23fff%22%20stroke-width%3D%221.5%22%3E%3Cpath%20d%3D%22M17.4706%207.33616L18.0118%206.79504%2017.4599%206.26493C16.0963%204.95519%2014.2582%203.94522%2011.7008%203.94522c-4.613699999999999%200-8.50262%203.7551699999999997-8.50262%208.395779999999998C3.19818%2016.9817%207.0871%2020.7368%2011.7008%2020.7368%2014.1712%2020.7368%2016.0773%2019.918%2017.574%2018.3689%2019.1435%2016.796%2019.5956%2014.6326%2019.5956%2012.957%2019.5956%2012.4338%2019.5516%2011.9316%2019.4661%2011.5041L19.3455%2010.9012H10.9508V14.4954H15.7809C15.6085%2015.092%2015.3488%2015.524%2015.0318%2015.8415%2014.403%2016.4629%2013.4495%2017.1509%2011.7008%2017.1509%209.04835%2017.1509%206.96482%2015.0197%206.96482%2012.341%206.96482%209.66239%209.04835%207.53119%2011.7008%207.53119%2013.137%207.53119%2014.176%208.09189%2014.9578%208.82348L15.4876%209.31922%2016.0006%208.80619%2017.4706%207.33616z%22/%3E%3Cpath%20d%3D%22M24.8656%2020.7286C27.9546%2020.7286%2030.4692%2018.3094%2030.4692%2015.0594%2030.4692%2011.7913%2027.953%209.39011%2024.8656%209.39011%2021.7783%209.39011%2019.2621%2011.7913%2019.2621%2015.0594c0%203.25%202.514499999999998%205.6692%205.6035%205.6692zM24.8656%2012.8282C25.8796%2012.8282%2026.8422%2013.6652%2026.8422%2015.0594%2026.8422%2016.4399%2025.8769%2017.2905%2024.8656%2017.2905%2023.8557%2017.2905%2022.8891%2016.4331%2022.8891%2015.0594%2022.8891%2013.672%2023.853%2012.8282%2024.8656%2012.8282z%22/%3E%3Cpath%20d%3D%22M35.7511%2017.2905v0H35.7469C34.737%2017.2905%2033.7703%2016.4331%2033.7703%2015.0594%2033.7703%2013.672%2034.7343%2012.8282%2035.7469%2012.8282%2036.7608%2012.8282%2037.7234%2013.6652%2037.7234%2015.0594%2037.7234%2016.4439%2036.7554%2017.2962%2035.7511%2017.2905zM35.7387%2020.7286C38.8277%2020.7286%2041.3422%2018.3094%2041.3422%2015.0594%2041.3422%2011.7913%2038.826%209.39011%2035.7387%209.39011%2032.6513%209.39011%2030.1351%2011.7913%2030.1351%2015.0594%2030.1351%2018.3102%2032.6587%2020.7286%2035.7387%2020.7286z%22/%3E%3Cpath%20d%3D%22M51.953%2010.4357V9.68573H48.3999V9.80826C47.8499%209.54648%2047.1977%209.38187%2046.4808%209.38187%2043.5971%209.38187%2041.0168%2011.8998%2041.0168%2015.0758%2041.0168%2017.2027%2042.1808%2019.0237%2043.8201%2019.9895L43.7543%2020.0168%2041.8737%2020.797%2041.1808%2021.0844%2041.4684%2021.7772C42.0912%2023.2776%2043.746%2025.1469%2046.5219%2025.1469%2047.9324%2025.1469%2049.3089%2024.7324%2050.3359%2023.7376%2051.3691%2022.7367%2051.953%2021.2411%2051.953%2019.2723v-8.8366zm-7.2194%209.9844L44.7334%2020.4196C45.2886%2020.6201%2045.878%2020.7286%2046.4808%2020.7286%2047.1616%2020.7286%2047.7866%2020.5819%2048.3218%2020.3395%2048.2342%2020.7286%2048.0801%2021.0105%2047.8966%2021.2077%2047.6154%2021.5099%2047.1764%2021.7088%2046.5219%2021.7088%2045.61%2021.7088%2045.0018%2021.0612%2044.7336%2020.4201zM46.6697%2012.8282C47.6419%2012.8282%2048.5477%2013.6765%2048.5477%2015.084%2048.5477%2016.4636%2047.6521%2017.2987%2046.6697%2017.2987%2045.6269%2017.2987%2044.6767%2016.4249%2044.6767%2015.084%2044.6767%2013.7086%2045.6362%2012.8282%2046.6697%2012.8282zM55.7387%205.22083v-.75H52.0788V20.4412H55.7387V5.220829999999999z%22/%3E%3Cpath%20d%3D%22M63.9128%2016.0614L63.2945%2015.6492%2062.8766%2016.2637C62.4204%2016.9346%2061.8664%2017.3069%2061.0741%2017.3069%2060.6435%2017.3069%2060.3146%2017.2088%2060.0544%2017.0447%2059.9844%2017.0006%2059.9161%2016.9496%2059.8498%2016.8911L65.5497%2014.5286%2066.2322%2014.2456%2065.9596%2013.5589%2065.7406%2013.0075C65.2878%2011.8%2063.8507%209.39832%2060.8278%209.39832%2057.8445%209.39832%2055.5034%2011.7619%2055.5034%2015.0676%2055.5034%2018.2151%2057.8256%2020.7369%2061.0659%2020.7369%2063.6702%2020.7369%2065.177%2019.1378%2065.7942%2018.2213L66.2152%2017.5963%2065.5882%2017.1783%2063.9128%2016.0614zM61.3461%2012.8511L59.4108%2013.6526C59.7903%2013.0783%2060.4215%2012.7954%2060.9017%2012.7954%2061.067%2012.7954%2061.2153%2012.8161%2061.3461%2012.8511z%22/%3E%3C/g%3E%3Cpath%20d%3D%22M11.7008%2019.9868C7.48776%2019.9868%203.94818%2016.554%203.94818%2012.341%203.94818%208.12803%207.48776%204.69522%2011.7008%204.69522%2014.0331%204.69522%2015.692%205.60681%2016.9403%206.80583L15.4703%208.27586C14.5751%207.43819%2013.3597%206.78119%2011.7008%206.78119%208.62108%206.78119%206.21482%209.26135%206.21482%2012.341%206.21482%2015.4207%208.62108%2017.9009%2011.7008%2017.9009%2013.6964%2017.9009%2014.8297%2017.0961%2015.5606%2016.3734%2016.1601%2015.7738%2016.5461%2014.9197%2016.6939%2013.7454h-4.9931V11.6512h7.0298C18.8045%2012.0207%2018.8456%2012.4724%2018.8456%2012.957%2018.8456%2014.5255%2018.4186%2016.4637%2017.0389%2017.8434%2015.692%2019.2395%2013.9838%2019.9868%2011.7008%2019.9868z%22%20fill%3D%22%234285F4%22/%3E%3Cpath%20d%3D%22M29.7192%2015.0594C29.7192%2017.8927%2027.5429%2019.9786%2024.8656%2019.9786%2022.1884%2019.9786%2020.0121%2017.8927%2020.0121%2015.0594%2020.0121%2012.2096%2022.1884%2010.1401%2024.8656%2010.1401%2027.5429%2010.1401%2029.7192%2012.2096%2029.7192%2015.0594zM27.5922%2015.0594C27.5922%2013.2855%2026.3274%2012.0782%2024.8656%2012.0782S22.1391%2013.2937%2022.1391%2015.0594C22.1391%2016.8086%2023.4038%2018.0405%2024.8656%2018.0405S27.5922%2016.8168%2027.5922%2015.0594z%22%20fill%3D%22%23E94235%22/%3E%3Cpath%20d%3D%22M40.5922%2015.0594C40.5922%2017.8927%2038.4159%2019.9786%2035.7387%2019.9786%2033.0696%2019.9786%2030.8851%2017.8927%2030.8851%2015.0594%2030.8851%2012.2096%2033.0614%2010.1401%2035.7387%2010.1401%2038.4159%2010.1401%2040.5922%2012.2096%2040.5922%2015.0594zM38.4734%2015.0594C38.4734%2013.2855%2037.2087%2012.0782%2035.7469%2012.0782%2034.2851%2012.0782%2033.0203%2013.2937%2033.0203%2015.0594%2033.0203%2016.8086%2034.2851%2018.0405%2035.7469%2018.0405%2037.2087%2018.0487%2038.4734%2016.8168%2038.4734%2015.0594z%22%20fill%3D%22%23FABB05%22/%3E%3Cpath%20d%3D%22M51.203%2010.4357v8.8366C51.203%2022.9105%2049.0595%2024.3969%2046.5219%2024.3969%2044.132%2024.3969%2042.7031%2022.7955%2042.161%2021.4897L44.0417%2020.7095C44.3784%2021.5143%2045.1997%2022.4588%2046.5219%2022.4588%2048.1479%2022.4588%2049.1499%2021.4487%2049.1499%2019.568V18.8617H49.0759C48.5914%2019.4612%2047.6552%2019.9786%2046.4808%2019.9786%2044.0171%2019.9786%2041.7668%2017.8352%2041.7668%2015.0758%2041.7668%2012.3%2044.0253%2010.1319%2046.4808%2010.1319%2047.6552%2010.1319%2048.5914%2010.6575%2049.0759%2011.2323H49.1499V10.4357H51.203zM49.2977%2015.084C49.2977%2013.3512%2048.1397%2012.0782%2046.6697%2012.0782%2045.175%2012.0782%2043.9267%2013.3429%2043.9267%2015.084%2043.9267%2016.8004%2045.175%2018.0487%2046.6697%2018.0487%2048.1397%2018.0487%2049.2977%2016.8004%2049.2977%2015.084z%22%20fill%3D%22%234285F4%22/%3E%3Cpath%20d%3D%22M54.9887%205.22083V19.6912H52.8288V5.220829999999999H54.9887z%22%20fill%3D%22%2334A853%22/%3E%3Cpath%20d%3D%22M63.4968%2016.6854L65.1722%2017.8023C64.6301%2018.6072%2063.3244%2019.9869%2061.0659%2019.9869%2058.2655%2019.9869%2056.2534%2017.827%2056.2534%2015.0676%2056.2534%2012.1439%2058.2901%2010.1483%2060.8278%2010.1483%2063.3818%2010.1483%2064.6301%2012.1768%2065.0408%2013.2773L65.2625%2013.8357%2058.6843%2016.5623C59.1853%2017.5478%2059.9737%2018.0569%2061.0741%2018.0569%2062.1746%2018.0569%2062.9384%2017.5067%2063.4968%2016.6854zM58.3312%2014.9115L62.7331%2013.0884C62.4867%2012.4724%2061.764%2012.0454%2060.9017%2012.0454%2059.8012%2012.0454%2058.2737%2013.0145%2058.3312%2014.9115z%22%20fill%3D%22%23E94235%22/%3E%3C/svg%3E" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div></div><div></div><div><div style="display: inline-flex; position: absolute; right: 0px; bottom: 0px;"><div class="gmnoprint" style="z-index: 1000001;"><div draggable="false" class="gm-style-cc" style="user-select: none; position: relative; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><button draggable="false" aria-label="Keyboard shortcuts" title="Keyboard shortcuts" type="button" style="background: none; display: inline-block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;" fdprocessedid="vzuyot">Keyboard shortcuts</button></div></div></div><div class="gmnoprint" style="z-index: 1000001;"><div draggable="false" class="gm-style-cc" style="user-select: none; position: relative; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><button draggable="false" aria-label="Map Data" title="Map Data" type="button" style="background: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit; display: none;">Map Data</button><span style="">Map data ©2024 Google</span></div></div></div><div class="gmnoscreen"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2024 Google</div></div><button draggable="false" aria-label="Map Scale: 200 m per 43 pixels" title="Map Scale: 200 m per 43 pixels" type="button" class="gm-style-cc" aria-describedby="58CF34EA-AE9A-4AF4-9FD7-9FB3C41AFF47" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><span>200 m&nbsp;</span><div style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 47px;"><div style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;"></div><div style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"></div><div style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); right: 0px; bottom: 0px;"></div><div style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;"></div><div style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);"></div><div style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;"></div></div></div><span id="58CF34EA-AE9A-4AF4-9FD7-9FB3C41AFF47" style="display: none;">Click to toggle between metric and imperial units</span></button><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; position: relative; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Terms</a></div></div><div draggable="false" class="gm-style-cc" style="user-select: none; position: relative; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" dir="ltr" href="https://www.google.com/maps/@13.6750882,100.5404362,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Report a map error</a></div></div></div></div></div></div></div>
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
				</div>
            </div>
        </div>
    </div>

    <!-- page slider -->
	<!-- <div class="slider-wrapper slider1-wrapper" style="padding-top: 0px; padding-bottom: 30px;">
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
    </div> -->
	
    <!-- footer section start -->

	<? include('includes/footer.php'); ?>
	
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/shortcode.js"></script>
    <!-- <script src="js/custom.js"></script> -->
    <!-- <script src="js/functions.js"></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBctr8WYTfFDi_oGbPEolSDzn4VZaAKVK0&amp;callback=googleMap"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdcxrCA3fydYz4cKu-Gpqm0MSe6S9voMw&libraries=places"></script>
     
</body>

</html>

<script>
		const link = '<? echo $link_map; ?>';
        const latitude = '<? echo $latitude; ?>';
        const longitude = '<? echo $longitude; ?>';

        let coordinates = null;
        
        if (link) {
            coordinates = extractCoordinates(link);
        } else if (latitude && longitude) {
            coordinates = {
                lat: parseFloat(latitude),
                lng: parseFloat(longitude)
            };
        }
        
        if (coordinates) {
            initMap(coordinates.lat, coordinates.lng);
        }


    function extractCoordinates(link) {
        const regex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
        const match = link.match(regex);
        if (match) {
            return {
                lat: parseFloat(match[1]),
                lng: parseFloat(match[2])
            };
        } else {
            return null;
        }
    }

    function initMap(lat, lng) {
        //document.getElementById('map').style.display = 'block'; // แสดงแผนที่เมื่อมีข้อมูล
        const location = {lat: lat, lng: lng};
        map = new google.maps.Map(document.getElementById('google_map'), {
            zoom: 15,
            center: location
        });

        const marker = new google.maps.Marker({
            position: location,
            map: map
        });

        const request = {
            location: location,
            radius: '500',
            type: ['tourist_attraction']
        };

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);
    }

// function googleMap() {
//     let pt_center = new google.maps.LatLng(-33.9198, 151.2504);
//     let mapCanvas = document.getElementById('google_map');
//     let styles = [{
//         stylers: [{
//             saturation: -100
//         }]
//     }];
//     let mapOptions = {
//         center: pt_center,
//         zoom: 18,
//         styles: styles
//     };
//     let map = new google.maps.Map(mapCanvas, mapOptions);
//     let locations = [
//         [ pt_center.lat(), pt_center.lng() ],
//         [ pt_center.lat() + 0.00066, pt_center.lng() - 0.0006 ],
//         [ pt_center.lat() - 0.00055, pt_center.lng() - 0.0014 ],
//         [ pt_center.lat() - 0.0007, pt_center.lng() + 0.001 ],
//         [ pt_center.lat() + 0.005, pt_center.lng() ],
//         [ pt_center.lat() + 0.0055, pt_center.lng() - 0.0007 ],
//         [ pt_center.lat() + 0.0055, pt_center.lng() + 0.0007 ]
//     ];
//     let hotel_package = '<div class="card card-hotel-package">' +
//                         '<div class="card-image">' + 
//                             '<img src="img/hotel-tour/10.png" alt="">' +
//                             '<div class="price"><span>$50 / Night</span></div>' +
//                         '</div>' +
//                         '<div class="card-body">' +
//                             '<a href="" class="card-title">Name Of Hotel</a>' +
//                             '<div class="rating-review">' +
//                                 '<i class="fa fa-star"></i>' +
//                                 '<i class="fa fa-star"></i>' +
//                                 '<i class="fa fa-star"></i>' +
//                                 '<i class="fa fa-star-o"></i>' +
//                                 '<i class="fa fa-star-o"></i>' +
//                             '</div>' +
//                             '<div class="review">1+ Review</div>' + 
//                         '</div>' +
//                     '</div>';

//     let infowindow = new google.maps.InfoWindow({
//         content: hotel_package,
//         maxWidth: 250
//     });

//     let markers = [];

//     for (var i = 0; i < locations.length; i++) {

//         let marker = new google.maps.Marker({
//             position: new google.maps.LatLng(locations[i][0], locations[i][1]),
//             icon: 'img/icons/map-pin.png',
//             map: map
//         });

//         marker.addListener('click', function() {
//             for (var j = 0; j < markers.length; j++) {
//                markers[j].setIcon('img/icons/map-pin.png');
//             }

//             marker.setIcon('img/icons/map-pin1.png');
//             infowindow.open(map, marker);
//         });

//         google.maps.event.addListener(infowindow, 'domready', function() {
            
//             var iwOuter = jQuery('.gm-style-iw');

//             var iwBackground = iwOuter.prev();

//             iwOuter.addClass('map-unnecessary-el');

//             var btnClose = iwOuter.next();

//             setTimeout(function() {
//                 iwOuter.parent().css({
//                     'height': '0'
//                 });
//             }, 300);

//             iwOuter.css({
//                 'top': '249px',
//                 'left': '100px'
//             });
//             iwOuter.children(':nth-child(1)').css({
//                 'overflow': 'unset'
//             });
//             iwOuter.children(':nth-child(1)').children(':nth-child(1)').css({
//                 'overflow': 'unset',
//                 'padding': '5px'
//             });

//             btnClose.children(':nth-child(1)').hide();
//             btnClose.addClass('fa fa-close btn btn-red btn-close');
//             btnClose.css({
//                 'width': '38px',
//                 'height': '33px',
//                 'top': '-3px',
//                 'right': '-42px',
//                 'background': 'rgba(0,0,0,0.45)'
//             });

//             // Removes background shadow DIV
//             iwBackground.children(':nth-child(2)').css({'display' : 'none'});

//             iwBackground.children(':nth-child(3)').children(':nth-child(1)').css({'top': '5px'});
//             iwBackground.children(':nth-child(3)').children(':nth-child(1)').children().css({'transform': 'skewX(32.6deg)', 'width': '10px', 'height': '15px'});

//             iwBackground.children(':nth-child(3)').children(':nth-child(2)').css({'top': '5px'});
//             iwBackground.children(':nth-child(3)').children(':nth-child(2)').children().css({'transform': 'skewX(-32.6deg)', 'width': '10px', 'height': '15px'});

//             iwBackground.children(':nth-child(4)').css({'display' : 'none'});
//         });
//         markers.push(marker);
//     }

//     map.addListener('click', function() {
//         infowindow.close();
//     });
// }
</script>

<? include('language/text_index.php'); ?>

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>