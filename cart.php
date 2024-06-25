<?php 
include('includes/connect_sql.php');
include('includes/fx_cart_db.php');

// include('includes/fx_cart_db.php');
// include('includes/m_package.php');

// $project_list   = get_project($conn);
// $room_list      = get_room_type($conn);

// echo '<script>alert("lastInsertId: '.$_POST['check_in_date'].'")</script>'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST)) {
        // $dates = explode(' - ',$_POST['check_in_date']);
        // $start_date = convertDate($dates[0]);
        // $end_date = convertDate($dates[1]);

        // $room_list = search_room_to_book($conn,$start_date,$end_date);
        // echo '<script>alert("room_list: '.count($room_list).'")</script>'; 
    }
    // echo '<script>alert("Successfully edited information.")</script>';
    sqlsrv_close($conn);
    // echo "<script>window.location.href ='unit_management.php'</script>";
}else{
    // sqlsrv_close($conn);
    // header('Location: index.php');
}

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $room_list = get_room_detail($conn,$_SESSION['cart']);
    $sum_value =0;
    foreach ($room_list as $value) { 
        $sum_value = $sum_value+$value['default_rate'];
    }
} 

sqlsrv_close($conn);

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
	.btn-search {
		height: 46px !important;
		width: 100px !important;
		text-transform: uppercase !important;
		border-radius: 5px !important;
		margin-left: 0px !important;
	}
	 h1, h2, h3, h4, h5, h6, b, span, p, table, a, div, label, ul, li, div,
    button {
        font-family: 'Prompt', sans-serif;
    }

	.data-input-style {
		padding: 20px 0; 
		display: flex; 
		align-items: center; 
		justify-content: space-evenly;
		text-align: center;
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
           

        </div>

    </div>
    <!-- sidebar end -->

<!-- ////////////////////////////////////////////////////////////////// -->

<main class="main-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 price room_type_header"><span style="margin-left: 10px;"></span></div>
            </div>

        </div>

        <!-- <div class="row" style=" padding: 20px 8px;">
            <div class="col-md-4">
                <label class="en" for="name">Check-in Date</label>
				<label class="th" for="name">วันที่เข้าพัก</label>
                <input type='text' class="form-control datepicker search_input data-input-style " name="check_in_date" id="check_in_date" value=""  />
            </div>
            <div class="col-md-4">
                <label class="en" for="name">Checkout Date</label>
				<label class="th" for="name">วันที่ออก</label>
                <input type='text' class="form-control datepicker search_input data-input-style" name="check_out_date" id="check_out_date" value="" />
            </div>

            <div class="col-md-4">
                <label class="en" class="ml-1" for="name">Adults</label>
				<label class="th" class="ml-1" for="name">ผู้เข้าพัก</label>
                <div class="dropdown">
                    <button class="btn dropdown-toggle w-100 search_input data-input-style" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="en" id="div_adult">2 Adults, </span> 
						<span class="en" id="div_children">1 Children, </span>
						<span class="en" id="div_children">0 Room </span>
						<span class="th" id="div_adult">2 ผู้ใหญ่, </span> 
						<span class="th" id="div_children">1 เด็ก, </span>
						<span class="th" id="div_children">0 ห้อง</span>
                    </button>

                </div>
            </div>
        </div> -->

<style type="text/css">
    .sb_banner_cont_iner_wrapper2 {
        float: left;
        width: 100%;
        padding: 30px 0px;
        margin-top: 250px;
    }
    .sb_banner_cont_iner_wrapper2 ul {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 4px;
        background-color: #fff;
        /* padding-left: 0px; */
        border-radius: 8px;
        border: 4px solid #dae1e3;
    }
    .sb_banner_cont_iner_wrapper2 ul li span {
        color: #839287;
    }
    .sb_banner_cont_iner_wrapper2 ul li input {
        border-bottom: 2px solid #839287;
        font-weight: 100 !important;
        padding: 0px 16px;
    }
    .sb_banner_cont_iner_wrapper2 ul li select {
        border-bottom: 2px solid #839287;
        padding-bottom: 2px;
        font-weight: 100 !important;
    }

    .sb_banner_content_wrapper2 {
        background-image: url('https://sharefolder.buildersmart.com/sms_booking/upload/project_photo/1_64880b050bc5d.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        /*max-width: 100%;
        width: 100%;
        height: 450px;*/
    }
    .sb_banner_content_wrapper2 h2,
    .sb_banner_content_wrapper2 h3 {
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); 
    }
    .sb_banner_cont_iner_wrapper2 {
        float: left;
        
        padding: 30px 0px;
        margin-top: 50px;
    }
</style>

        <form name="frm_search" id="frm_search" method="post" action="search.php">

            <div class="sb_banner_content_wrapper animated-row float_left">
                <div class="container" style="width: 90%;">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="sb_banner_cont_iner_wrapper float_left">

                                <ul class="sb-filter">

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

        <div class="row">

        <?php if(count($room_list)!=0){ ?>
            <div class="col-md-12 ">
                <p class="ml-2 mr-2 mt-0" style="display: flex; align-items: center;">
					<input type="checkbox" style="height:15px;width:15px;" class="select_all cb" onClick="toggle(this); updateTotal();">
					&nbsp;เลือกทั้งหมด
				</p>
            </div>
        <?php } ?>

        <?php //unset($_SESSION['cart']);
            $check_start = "true";
         ?>
        <?php foreach ($room_list as $value) { ?>
            <div class="col-md-9">
                <div class="row mx-1 mb-2">
                    <div class="col-12 border-r-10">

                        <div class="row mt-3">
                            <div class="col-1 text-right">
                                <input <?php //echo ($is_package_available == 0) ? 'disabled' : ''; ?> style="height:15px;width:15px;" type="checkbox" class="chk_item cb package" 
                                data-id="package_<?php //echo $package_rooms[0]->id_package; ?>" 
                                id="id_package_<?php //echo $package_rooms[0]->id_package; ?>" 
                                data-item-type="package" 
                                data-item="<?php //echo $package_rooms[0]->id_package; ?>" 
                                data-price="<?php echo $value['default_rate']; ?>" onClick="updateTotal();" >
                            </div>
                           
                            <div class="col-9 pl-0">
                                <h5><?php //echo $value['room_type_name_th']; ?></h5>
                            </div>
                            <div class="col-2 text-right">
                                <a class="delete-item" data-id="<? echo $value['id_room_type']; ?>"><i class="fa-solid fa-trash-can fa-xl" style="color: #030303;"></i></a>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2 pl-0 align-self-center">
                                <div class="text-center" style="display: flex; justify-content: center; background-color: white; vertical-align: bottom; font-size: 12px!important;">
                                    <button class="btn_stepper_sm" 
                                    data-max="<?php echo $value['max_children_age']; ?>"
                                    data-room-id="<?php echo $value['id_room_type']; ?>"
                                    data-cart-item="<?php //echo ($this->session->userdata('id_guest') != '') ? $id_cart : $key; ?>" 
                                    data-package="<?php //$package_rooms[0]->id_package; ?>" 
                                    id="decrement-package-<?php //echo $package_rooms[0]->id_package; ?>" 
                                    onClick="stepper_package(this);"><i class="fa-solid fa-circle-minus fa-lg" style="color: #000000;"></i></button>

                                    <input class="input_number_sm room_stepper ml-2" type="number" min="0" max="<?php //echo sizeof($package_count); ?>" step="1" value="<?php echo ($room_qty == 0) ? 1 : $room_qty; ?>" id="package_<?php //echo $item->id_package; ?>" readonly>

                                    <button class="btn_stepper_sm" 
                                    data-max="<?php //echo sizeof($package_count); ?>" 
                                    data-cart-item="<?php //echo ($this->session->userdata('id_guest') != '') ? $id_cart : $key; ?>" 
                                    data-room="<?php //echo $package_rooms[0]->id_package; ?>" 
                                    id="increment-room-<?php //echo $package_rooms[0]->id_package; ?>" 
                                    onClick="stepper_package(this);"><i class="fa-solid fa-circle-plus fa-lg" style="color: #000000;"></i></button>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-1 text-right"></div>
                            <div class="col-sm-5 text-center">
                                <img src="includes/image.php?filename=<?php echo $value['room_photo_url']; ?>" class="img-fluid mw-100 "/>
                            </div>
                            <div class="col-sm-6 align-self-center text-center">
                                <h6><?php echo $value['room_type_name_th']; ?></h6>
                            </div>
                        </div>

                        <div class="row ml-5 my-2">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- วันที่เข้าพัก -->
                                    </div>
                                    <div class="col-12">

                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo number_format($value['default_rate'], 2); ?>
                                    </div>
                                    <div class="col-12">
                                        <em>รวมภาษีและค่าธรรมเนียม</em>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php if($check_start =="true"){ ?>
            <div class="col-md-3">
                <div class="col-md p-2 m-0 border-r-10">
                    <div class="row">
                        <div class="col-md-12 m-2 text-center d-flex flex-row justify-content-between">
                            <label style="font-size: 1.2em; font-weight: bold; margin: 8px 5px 5px 5px;">ยอดรวม:</label>
                            <div id="total" style="font-size: 1.2em; font-weight: bold; padding: 8px 20px 5px 0;">
                                0.00
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 my-3 text-center">
                            <button class="btn button-primary" onclick="location.href='<?php //echo site_url('/')?>'" id="back_to_cart">ย้อนกลับ<?php //echo $this->lang->line('back'); ?></button>
                            <button class="btn button-primary" id="proceed_to_booking">ถัดไป<?php //echo $this->lang->line('proceed_to_booking'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php $check_start ="false"; } ?>

        <?php } ?>

<script>
function toggle(source) {
    checkboxes = document.querySelectorAll('.cb');
    for (var i = 0; i < checkboxes.length; i++) {
        if (!checkboxes[i].disabled) {
            checkboxes[i].checked = source.checked;
        }
    }
}

function updateTotal() {
    let total = 0;
    document.querySelectorAll('.chk_item:checked').forEach(function(checkbox) {
        total += parseFloat(checkbox.getAttribute('data-price'));
    });
    document.getElementById('total').textContent = total.toFixed(2);
}

document.querySelectorAll('.delete-item').forEach(item => {
    item.addEventListener('click', function() {
        if (confirm('คุณแน่ใจที่จะลบรายการนี้ใช่หรือไม่?')) {
            var id = this.getAttribute('data-id');
            window.location.href = 'delete_to_cart.php?action=delete&id=' + id;
        }
    });
});


</script>


        </div>
</main>

<form name="frm_book" id="frm_book" method="post" action="<?php //echo site_url('booking') . '/guest_info'; ?>">
    <input type="hidden" name="h_id_room" id="h_id_room" value="">
    <input type="hidden" name="h_id_package" id="h_id_package" value="">
    <input type="hidden" name="h_num_of_adult" id="h_num_of_adult" value="">
    <input type="hidden" name="h_num_of_room" id="h_num_of_room" value="">
    <input type="hidden" name="h_num_of_children" id="h_num_of_children" value="">
    <input type="hidden" name="h_children_ages" id="h_children_ages" value="">
    <input type="hidden" name="h_check_in_date" id="h_check_in_date" value="">
    <input type="hidden" name="h_check_out_date" id="h_check_out_date" value="">
    <input type="hidden" name="page" id="page" value="cart_items">
</form>


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


