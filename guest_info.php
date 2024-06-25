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


