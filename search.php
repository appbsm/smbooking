<?php 
include('includes/connect_sql.php');
include('includes/fx_project_facility_db.php');
include('includes/fx_room_detail_db.php');
include('includes/config_path.php');

// include('includes/fx_cart_db.php');
// include('includes/m_package.php');

// echo '<script>alert("lastInsertId: '.$_POST['check_in_date'].'")</script>'; 
// echo '<script>alert("project_id: '.$_SESSION['project_id'].'")</script>';

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    if (!empty($_POST)) {
        $currentDate = new DateTime();

        $_SESSION['project_id'] = $_POST['project_id'];
        $_SESSION['daterange'] = $_POST['daterange'];

        $project_list  = get_project_id($conn,$_POST['project_id']);
        $room_list     = get_room_for_project($conn,$_POST['project_id']);

        $daterange = $_POST['daterange'];

        if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}\s*-\s*\d{1,2}\/\d{1,2}\/\d{4}$/', $daterange)) {
            list($start_date, $end_date) = explode(" - ", $daterange);
            
            $start_date = DateTime::createFromFormat('d/m/Y', trim($start_date))->format('Y-m-d');
            $end_date = DateTime::createFromFormat('d/m/Y', trim($end_date))->format('Y-m-d');

            if ($start_date && $end_date) {
                // กำหนดค่าให้กับ $start_date และ $end_date ที่ถูกต้อง
                $start_date = $start_date;
                $end_date = $end_date;
            } else {
                // ในกรณีที่ไม่สามารถแปลงรูปแบบวันที่ได้ถูกต้อง
                $start_date = $currentDate->format('Y-m-d');
                $end_date = $currentDate->format('Y-m-d');
            }
        }else{
            $start_date = $currentDate->format('Y-m-d');
            $end_date = $currentDate->format('Y-m-d');
        }

    }
}else{
    if (isset($_SESSION['project_id']) && !empty($_SESSION['project_id']) && $_SESSION['project_id'] !='') {

        $project_list  = get_project_id($conn,$_SESSION['project_id']);
        $room_list     = get_room_for_project($conn,$_SESSION['project_id']);

    }else{
        $project_list  = get_project_top($conn);
        $room_list     = get_room_for_project_top($conn,$_SESSION['project_id']);

        $currentDate = new DateTime();
        $start_date = $currentDate->format('Y-m-d');
        $end_date = $currentDate->format('Y-m-d');
    }
}

$project_id = $project_list[0]['id_project_info'];

// echo '<script>alert("start_date: '.$start_date.'")</script>'; 

// $_POST['daterange'];
// echo '<script>alert("daterange: '.$_POST['daterange'].'")</script>'; 

?>

<!DOCTYPE html>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="css/style_index.css" />
    <link rel="stylesheet" type="text/css" href="css/style_cart.css" />


<!-- ////////////////////////////// -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- icon font-awesome -->
  <!-- <link href="css_sm_booking/assets/font-awesome/css/all.min.css" rel="stylesheet">
  <link href="css_sm_booking/css/styles.css" rel="stylesheet">
  <link href="css_sm_booking/css/custom_header_th.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css?v=1001"> -->

  <link rel="stylesheet" href="css_sm_booking/bootstrap-4.0.0-dist/css/bootstrap.css">
  <link href="css_sm_booking/css/css.css" rel="stylesheet">
  <link href="css_sm_booking/css/custom_header_en.css" rel="stylesheet">
<!-- ////////////////////////////// -->

</head>
<style>
    .slideshow {
        /* position: absolute; */
        /* display: flex;
        flex-direction: column;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px; */
        height: auto !important;
    }
    .search_room_header{
        border: 1px solid #C6C6C7;
        border-radius: 5px;
        padding: 5px 0 5px 0;
        margin: 0 4px 0 4px;
        margin-top: 70px;
    }

    .eclipes-name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .content-image {
        width: 100%;
    }

    .content-detail {
        width: 100%;

    }

    .product-card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .content-product {
        margin-top: 10px;
        display: flex;
        flex-direction: row;
    }

    .footer {
        display: flex;
        flex-direction: row;
        justify-content: end;
    }

    /* Styles for Mobile Phones */
    @media (max-width: 480px) {
        .content-detail {
            margin-top: 10px;
            position: relative;
        }

        .content-product {
            display: flex;
            flex-direction: column;
        }

        .content-image {
            width: 100%;
            /* height: 220px; */
        }
    }

    /* Styles for Portrait Tablets */
    @media (min-width: 481px) and (max-width: 768px) {
        .content-detail {
            margin-top: 10px;
            position: relative;
        }

        .content-product {
            display: flex;
            flex-direction: column;
        }

        .content-image {
            width: 100%;
            /* height: 300px; */
        }
    }

    /* Styles for Landscape Tablets and Small Desktops */
    @media (min-width: 769px) and (max-width: 1024px) {
        .content-detail {
            margin-top: 10px;
            position: relative;
            /* margin-top: 20px; */
        }

        .content-product {
            display: flex;
            flex-direction: row;
        }

        .content-image {
            width: 100%;
            /* height:auto; */
        }
    }

    /* Styles for Large Desktops */
    @media (min-width: 1201px) {
        .content-detail {
            margin-top: 10px;
            position: relative;
        }

        .content-product {
            display: flex;
            flex-direction: row;
        }

        .content-image {
            width: 100%;
            /* height: 400px; */
        }
    }

</style>

<body>

<!-- sidebar start -->
    <!-- return-to-top start-->
    <a href="javascript:" id="return-to-top"><i class="fas fa-sort-up"></i></a>
    <!-- return-to-top-end -->

    <div class="main_wrapper">
        <div class="main_menu_wrapper">

        <? include('includes/topbar.php'); ?>
           
        <!-- project_info.php -->
        <!-- <form name="frm_search" id="frm_search" method="post" action="listing-grid-left.html"> -->
        <form name="frm_search" id="frm_search" method="post" action="search.php">

            <div class="sb_banner_content_wrapper animated-row float_left">
                <div class="container" style="width: 90%;">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="sb_banner_cont_iner_wrapper float_left">

                                <ul class="sb-filter">

                                    <li class="s-box"  style="border: 1px solid #ced4da; padding: 9px 0; border-radius: 5px; flex-grow: 1; width: 100%;">
                                        <span><i class="fas fa-map-marker-alt"></i></span>
                                        <select id="project_id" name="project_id" style="max-width: 100%; border-bottom: none !important;">
                                            <?php //foreach ($project_list as $value) { ?>
                                                <option class="en" value="<? echo $project_list[0]['id_project_info']; ?>"><? echo $project_list[0]['project_name_en']; ?></option>
                                            <? //} ?>
                                            <?php //foreach ($project_list as $value) {?>
                                                <option class="th" value="<? echo $project_list[0]['id_project_info']; ?>"><? echo $project_list[0]['project_name_th']; ?></option>
                                            <? //} ?>
                                        </select>
                                    </li>

                                    <li class="s-box" id="daterange-container" style="border: 1px solid #ced4da; padding: 6px 0; border-radius: 5px; flex-grow: 1; width: 100%; position: relative;">
                                        <i class="fas fa-calendar icon-ckinout" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                        <input type="text" style="max-width: 100%; width: 100%; border-bottom: none !important; text-align: center; padding-right: 30px;" id="daterange" name="daterange" class="form-control-calen" placeholder=" Check-in - Check-out Date">
                                    </li>
                                    
                                    <div class="dropdown-container" style="width: 100%;">
                                        <button style="max-width: 100%; width: 100%; text-align: center;" type="button" class="btn btn-light">
                                            <span><i class="fa fa-user" style="color: #839287 !important;"></i></span>
                                            ผู้ใหญ่ <? if (!empty($_POST['adults'])) { echo htmlspecialchars($_POST['adults']); }else{ echo "2"; } ?> คน , เด็ก <? if (!empty($_POST['children'])) { echo htmlspecialchars($_POST['adults']); }else{ echo "0"; } ?> คน , <? if (!empty($_POST['children'])) { echo htmlspecialchars($_POST['rooms']); }else{ echo "1"; } ?> ห้อง
                                        </button>
                                        <div class="dropdown-content">
                                            <div class="counter">
                                                <label><i class="fas fa-user"></i>ผู้ใหญ่</label>
                                                <button type="button" class="btn btn-secondary" onclick="updateCount('adults', -1)">-</button>
                                                <span id="adults"><? if (!empty($_POST['adults'])) { echo htmlspecialchars($_POST['adults']); }else{ echo "2"; } ?></span>
                                                <button type="button" class="btn btn-secondary" onclick="updateCount('adults', 1)">+</button>
                                            </div>
                                            <div class="counter">
                                                <label><i class="fas fa-child"></i>เด็ก</label>
                                                <button type="button" class="btn btn-secondary" onclick="updateCount('children', -1)">-</button>
                                                <span id="children"><? if (!empty($_POST['children'])) { echo htmlspecialchars($_POST['adults']); }else{ echo "0"; } ?></span>
                                                <button type="button" class="btn btn-secondary" onclick="updateCount('children', 1)">+</button>
                                            </div>
                                            <div class="counter">
                                                <label><i class="fas fa-bed"></i>ห้อง</label>
                                                <button type="button" class="btn btn-secondary" onclick="updateCount('rooms', -1)">-</button>
                                                <span id="rooms"><? if (!empty($_POST['children'])) { echo htmlspecialchars($_POST['rooms']); }else{ echo "1"; } ?></span>
                                                <button type="button" class="btn btn-secondary" onclick="updateCount('rooms', 1)">+</button>
                                            </div>
                                            <input type="hidden" name="adults" id="adults_input" value="2">
                                            <input type="hidden" name="children" id="children_input" value="0">
                                            <input type="hidden" name="rooms" id="rooms_input" value="1">
                                        </div>
                                    </div>

                                    <li style="flex-grow: 1;">
                                        <!-- <a href="search.php"> -->
                                            <button type="submit" class="btn btn-primary btn-search">Search</button>
                                        <!-- </a> -->
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        </div>
    </div>

<form name="frm_room" id="frm_room" method="post" action="detail.php">
    <!-- <input type="hidden" name="project_id" id="project_id" value=""> -->
    <!-- <input type="hidden" name="h_id_room_type" id="h_id_room_type" value=""> -->
    <input type="hidden" name="id_room" id="id_room" value="">
    <input type="hidden" name="h_num_of_adult" id="h_num_of_adult" value="">
    <input type="hidden" name="h_num_of_room" id="h_num_of_room" value="">
    <input type="hidden" name="h_num_of_children" id="h_num_of_children" value="">
    <input type="hidden" name="h_children_ages" id="h_children_ages" value="">
    <input type="hidden" name="h_check_in_date" id="h_check_in_date" value="">
    <input type="hidden" name="h_check_out_date" id="h_check_out_date" value="">
</form>    

<!-- sidebar end -->

<!-- ////////////////////////////////////////////////////////////////// -->

<link rel="stylesheet" href="css_sm_booking/assets/select-picker/css/bootstrap-select.min.css">
<main class="main-2">
    <!-- SECTION FOR SEARCH -->
    <div class="container-fluid text-center">
        <form name="frm_search" id="frm_search" method="post" action="search.php">
            <input type="hidden" name="s_id_room_type" id="s_id_room_type" value="">
            <input type="hidden" name="s_num_of_adult" id="s_num_of_adult" value="<?php //echo $num_of_adult; ?>">
            <input type="hidden" name="s_num_of_room" id="s_num_of_room" value="<?php //echo $num_of_room; ?>">
            <input type="hidden" name="s_num_of_children" id="s_num_of_children" value="<?php //echo $num_of_children; ?>">
            <input type="hidden" name="s_children_ages" id="s_children_ages" value="<?php //echo $children_ages; ?>">
            <input type="hidden" name="search_type" id="search_type" value="">
            <input type="hidden" name="project_id" id="project_id" value="">

            <!-- <div class="row search_room_header">
                <div class="col-lg-3 col-sm-12">
                    <div class="col-md-12 col-sm-12 text-left">
                        <label class="ml-1 en" for="name">Location</label>
                        <label class="ml-1 th" for="name">สถานที่</label>

                        <select class="form-control selectpicker search_input" data-live-search="true" name="project_id" id="project_id">
                            
                        </select>

                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 text-left">
                        <label for="name" class="ml-1"><?php //echo $this->lang->line('check_in_date'); ?></label>
                        <input type='text' class="form-control datepicker search_input" name="check_in_date" id="check_in_date" value="<?php echo $check_in_date; ?>" />
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 text-left">
                        <label for="name" class="ml-1"><?php //echo $this->lang->line('check_out_date'); ?></label>
                        <input type='text' class="form-control datepicker search_input" name="check_out_date" id="check_out_date" value="<?php echo $check_out_date; ?>" />
                    </div>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 text-left">
                        <label for="name">&nbsp;</label>
                        <button id="search" class="form-control search_input btn-default" data-search-type="search_room" style="cursor: pointer; padding: 0 50px 0 50px;">Search</button>
                    </div>
                </div>

            </div> -->

        </form>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php
                $first_photo = $project_list[0];
            ?>
            <div class="col-md-9 top-left-grid" style="text-align: right;">
                <img class="myImg imgThumbnail_bg img_border" data-id="1" src="includes/image.php?filename=<?php echo trim($first_photo['project_photo_url']); ?>" style="max-width: 100%;">
            </div>

            <div class="col-md-3" style="padding-right: 30px;">
                <?php
                foreach ($project_list as $key => $photo) {
                    $ctr = $key + 1;
                    if ($key > 0 && $key < 4) {
                ?>
                        <div class="row">
                            <div class="col-md-12 mb-1 top-right-grid">
                                <img class="myImg imgThumbnail_bg img_border" data-id="<?php echo $ctr; ?>" src="includes/image.php?filename=<?php echo trim($photo['project_photo_url']); ?>" style="max-width: 100%;">
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>

            <div class="col-md-12 mt-1 mb-3">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h5 style="color: black !important;" class="en" ><? echo $project_list[0]['project_name_en']; ?></h5>
                        <h5 style="color: black !important;" class="th" ><? echo $project_list[0]['project_name_th']; ?></h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="project_info.php" class="btn" id="">Project Info Details</a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div>
            <hr>
        </div>

        <!-- Room Types -->

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 ml-2 text-left">
                    <h5 style="color: black !important;" class="en">Room Types</h5>
                    <h5 style="color: black !important;" class="th">ประเภทของห้อง</h5>
                </div>
            </div>
            <div class="row">
                <?php
                $room_ctr = 0;
                $date = date('Y-m-d');

                foreach ($room_list as $key => $rt) {
                    $rate = get_day_rate($conn,$rt['id_room_type'], date('Y-m-d', strtotime($start_date)),$project_id);

                    // if ($rate == '') {
                    //     $rate = $rt$rt['default_rate'];
                    // }
                    // echo '<script>alert("$rate: '.$rate.'")</script>'; 
                    $photos = get_room_type_photos($conn,$rt['id_room_type']);
                    // echo '<script>alert("$rate: '.count($photos).'")</script>'; 
                ?>

                    <div class="col-md-6 mt-3">
                        <div class="product-card">
                            <div class="header">
                                <div class="col-md-12 pl-4 text-left">
                                    <h6>
                                        <div class="room-type-name"><?php echo $rt['room_type_name_th']; ?></div>
                                    </h6>
                                </div>
                            </div>
                            <div class="content-product">
                                <div class="col-md-12">
                                    <div class="content-image">
                                        <div class="slideshow m-0 p-0" id="slideshow-<?php echo $key; ?>">
                                            <?php  
                                                //foreach ($photos as $photo) {
                                            ?>
                                                <div>

                                                    <img class="room_img img-thumbnail" data-type="<?php echo $room_ctr; ?>" data-ctr="<?php echo $photos[0]['id_room_type_photo']; ?>" src="includes/image.php?filename=<?php echo $photos[0]['room_photo_url']; ?>" width="100%">
                                                </div>
                                            <?php //} ?>

                                        </div>
                                    </div>
                                    <div class="content-detail">
                                        <div class="row mb-3 mt-4 price">
                                            
                                            <div class="col-md-12 mx-0 text-center en">
                                                Price <? echo number_format($rate, 0); ?> /Night
                                                <div class="price"><b><?php echo $price; ?></b></div>
                                            </div>
                                            <div class="col-md-12 mx-0 text-center th">
                                                ราคา <? echo number_format($rate, 0); ?> /คืน
                                                <div class="price"><b><?php echo $price; ?></b></div>
                                            </div>

                                        </div>

                                        <div class="row mx-auto mt-2">
                                            <div class="col-3 text-left icon_container">
                                                <span class="icon-content"><object data="<? echo $sourceFilePath_icon; ?>/images/icons/house.svg" height="20"></object></span>
                                            </div>
                                            <div class="col-9 text-left icon_container">
                                                <span class="icon-content en"><?php echo $rt['area_en']; ?></span>
                                                <span class="icon-content th"><?php echo $rt['area_th']; ?></span>
                                            </div>
                                        </div>

                                        <div class="row mx-auto mt-2">
                                            <div class="col-3 text-left icon_container">
                                                <span class="icon-content"><object data="<? echo $sourceFilePath_icon; ?>images/icons/icons8-bedroom-50.png" height="18"></object></span>
                                            </div>
                                            <div class="col-9 text-left icon_container">
                                                <span class="icon-content en"><?php echo $rt['room_details_en']; ?></span>
                                                <span class="icon-content th"><?php echo $rt['room_details_th']; ?></span>
                                            </div>
                                        </div>
                                        <div class="row mx-auto mt-2">
                                            <div class="col-3 text-left icon_container">
                                                <span class="icon-content  ml-1"><object data="<?php echo $sourceFilePath_icon; ?>images/icons/bathroom.png" height="18"></object></span>
                                            </div>
                                            <div class="col-9 text-left icon_container">
                                                <span class="icon-content en"><?php echo $rt['bathroom_en']; ?></span>
                                                <span class="icon-content th"><?php echo $rt['bathroom_th']; ?></span>
                                            </div>
                                        </div>
                                        <div class="row mx-auto mt-2">
                                            <div class="col-3 text-left icon_container">
                                                <span class="icon-content" style="margin-left:1px;"><object data="<?php echo $sourceFilePath_icon; ?>images/icons/person-fill.svg" height="18"></object></span>
                                            </div>
                                            <div class="col-9 text-left icon_container">
                                                <span class="icon-content en"><?php echo $rt['number_of_adults'].' Adults'; ?></span>
                                                <span class="icon-content th"><?php echo $rt['number_of_adults'].' จำนวนผู้เข้าพัก'; ?></span>
                                            </div>
                                        </div>

                                        <div class="row mx-auto mt-2">
                                            <div class="col-3 text-left icon_container">
                                                <object data="<?php echo $sourceFilePath_icon; ?>images/icons/tv.svg" height="20"> </object>
                                            </div>
                                            <div class="col-9 text-left icon_container">
                                                <span class="icon-content">TV (Internet)</span>
                                            </div>
                                        </div>

                                        <div class="row mx-auto mt-2">
                                            <div class="col-3 text-left icon_container">
                                                <span class="icon-content"><object data="<?php echo $sourceFilePath_icon; ?>images/icons/snow.svg" height="20"> </object></span>
                                            </div>
                                            <div class="col-9 text-left icon_container">
                                                <span class="icon-content en">Air Conditioning</span>
                                                <span class="icon-content th">เครื่องปรับอากาศ</span>
                                            </div>
                                        </div>

                                        <div class="row mx-auto mt-2">
                                            <div class="col-3 text-left icon_container">
                                                <span class="icon-content"><object data="<?php echo $sourceFilePath_icon; ?>images/icons/wifi.svg" height="20"> </object></span>
                                            </div>
                                            <div class="col-9 text-left icon_container">
                                                <span class="icon-content">Free WIFI</span>
                                            </div>
                                        </div>
                                        <?php if ($rt['sofa_en'] != '') { ?>
                                            <div class="row mx-auto mt-2">
                                                <div class="col-3 text-left icon_container">
                                                    <span class="icon-content" style="font-size:16px; margin-top:-2px;">
                                                        <object data="<?php echo $sourceFilePath_icon; ?>images/icons/sofa.png" height="14"></object>
                                                    </span>
                                                </div>
                                                <div class="col-9 text-left icon_container">
                                                    <span class="icon-content"><?php echo $rt['sofa_en']; ?></span>
                                                    <span class="icon-content"><?php echo $rt['sofa_th']; ?></span>
                                                </div>
                                            </div>
                                        <?php } ?>


                                    </div>

                                </div>
                            </div>

                            <div class="footer">
                                <div class="d-flex justify-content-end mr-2">
                                    <button type="button" class="btn btn-primary add_to_cart en"
                                    data-id="<?php echo $rt['id_room_type']; ?>" 
                                    data-price="<?php echo $rt['default_rate']; ?>"
                                    >Add To Cart</button>
                                    <button type="button" class="btn btn-primary add_to_cart th"
                                    data-id="<?php echo $rt['id_room_type']; ?>" 
                                    data-price="<?php echo $rt['default_rate']; ?>"
                                    >เก็บใส่ตะกร้า</button>

                                    <div style="margin-left: 10px;"></div>

                                    <button type="button" class="btn btn-primary book_now en"
                                    data-roomtype="<?php echo $rt['id_room_type']; ?>" 
                                    >Book Now</button>
                                    <button type="button" class="btn btn-primary book_now th"
                                    data-roomtype="<?php echo $rt['id_room_type']; ?>" 
                                    >จองตอนนี้</button>

                                </div>
                            </div>
                           <!--  <div class="footer">
                                <div class=" ml-2 text-right">
                                    <button class="btn button-primary-w add_to_cart" data-id="<?php //echo $rt['id_room_type']; ?>" data-price="<?php //echo $rt['default_rate']; ?>" id="" style="margin-right: 5px;"><?php //echo $this->lang->line('add_to_cart'); ?></button>

                                    <a href="javascript:;" data-roomtype="<?php //echo $rt->id_room_type; ?>" class="btn button-primary book_now" id="" style="margin-left: 5px;"><?php //echo $this->lang->line('book_now'); ?></a>
                                </div>
                            </div> -->

                        </div>
                    </div>
                <?php
                    $room_ctr++;
                    }
                ?>
            </div>
        </div>

        <br>
        <div>
            
        </div>
</main>


<!-- /////////////////////////////////////////////////////////////////    -->

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
        $('#id_room').val($(this).attr('data-roomtype'));

        $('#h_check_in_date').val($('#check_in_date').val());
        $('#h_check_out_date').val($('#check_out_date').val());
        $('#h_num_of_adult').val($('#div_adult').text());
        $('#h_num_of_room').val($('#div_room').text());
        $('#h_num_of_children').val($('#div_children').text());

        // var children_ages = [];
        // var ages = document.getElementsByClassName("select_age");
        // for (var i = 0; i < ages.length; i++) {
        //  //console.log(ages[i].value);
        //  children_ages.push(ages[i].value);
        // }
        // $('#h_children_ages').val(children_ages.toString());
        $('#frm_room').submit();
    });

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
            var startDate = '<?php echo $start_date; ?>';
            var endDate = '<?php echo $end_date; ?>';

            var formattedStartDate = moment(startDate).format('DD/MM/YYYY');
            var formattedEndDate = moment(endDate).format('DD/MM/YYYY');
            
            // กำหนดค่าให้กับ input
            // $('#daterange').val(formattedStartDate + ' - ' + formattedEndDate);
            $('#daterange').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        });

        var startDate = '<?php echo $start_date; ?>';
        var endDate = '<?php echo $end_date; ?>';
        var formattedStartDate = moment(startDate).format('DD/MM/YYYY');
        var formattedEndDate = moment(endDate).format('DD/MM/YYYY');

        if(formattedStartDate!='Invalid date'){
            $('#daterange').val(formattedStartDate + ' - ' + formattedEndDate);
        }else{
            $('#daterange').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        }

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

        document.getElementById('adults_input').value = adults;
        document.getElementById('children_input').value = children;
        document.getElementById('rooms_input').value = rooms;
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

<? sqlsrv_close($conn); ?>
<? include('language/text_index.php'); ?>


