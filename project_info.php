<?php 
include('includes/connect_sql.php');
include('includes/fx_project_facility_db.php');
include('includes/fx_room_detail_db.php');

// include('includes/fx_cart_db.php');
// include('includes/m_package.php');

// echo '<script>alert("lastInsertId: '.$_POST['check_in_date'].'")</script>'; 

// echo '<script>alert("project_id: '.$_SESSION['project_id'].'")</script>';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['project_id'] !='') {
    if (!empty($_POST)) {
        $_SESSION['project_id'] = $_POST['project_id'];
        $project_list  = get_project_id($conn,$_POST['project_id']);
    }
}else{
    if (isset($_SESSION['project_id']) && !empty($_SESSION['project_id']) && $_SESSION['project_id'] !='') {
        $project_list  = get_project_id($conn,$_SESSION['project_id']);
    }else{
        $project_list  = get_project_top($conn);
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
  <section class="text-center container">
    
  </section>
  <div class="container-fluid" >
    
    
    <!--
    <div class="row">
        <div class="col-md-12"><h3><?php echo ($lang == 'english') ? $project_details->project_name_en : $project_details->project_name_th;?></h3></div>
        <div class="col-md-12"><?php echo $project_details->whole_address_en;?></div>
    </div> -->
    <div class="row"> 
        
        <?php 
        $first_photo = $project_photos[0];
        
        
        ?>
        <div class="col-md-9 top-left-grid" style="text-align: right;">
        <img class="myImg imgThumbnail_bg img_border" data-id="1" src="<?php echo share_folder_path().$first_photo->project_photo_url;?>" style="max-width: 100%;">
        </div>
        
        
        
        
        
        <div class="col-md-3" style="padding-right: 30px;">
            
                <?php 
                foreach ($project_photos as $key => $photo) {
                $ctr = $key + 1;
                if ($key > 0 && $key < 4) {     
                            
                ?>
                <div class="row">
                <div class="col-md-12 mb-1 top-right-grid">
                <img class="myImg imgThumbnail_bg img_border" data-id="<?php echo $ctr;?>" src="<?php echo share_folder_path().$photo->project_photo_url;?>" style="max-width: 100%;">
                </div>
                </div>
                <?php }
                }
                ?>

        </div>
        <div class="col-md-12 mt-1 mb-3" id="room-type">
            <div class="row">
                <div class="col-md-4 text-left">
                    <h5><?php echo $lang==('english')? $project_details->project_name_en : $project_details->project_name_th;?></h5>
                </div>
                <div class="col-md-8 text-right">   
                <!-- <nav class="navbar sticky-top navbar-light bg-light">               -->
                    <ul class="nav sticky-top justify-content-end">
                        <li class="nav-item">
                            <a href="#room-type" class="nav-link"><?php echo $this->lang->line('room_types'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="#pj-ov" class="nav-link"><?php echo $this->lang->line('project_overview');?></a>
                        </li>
                        <li class="nav-item">
                            <a href="#pj-fac" class="nav-link"><?php echo $this->lang->line('project_facility');?></a>
                        </li>
                        <li class="nav-item">
                            <a href="#pj-con"  class="nav-link"><?php echo $this->lang->line('conditions_and_policies');?></a>
                        </li>
                        <li class="nav-item">
                            <a href="#google-map"  class="nav-link"><?php echo $lang=='english' ? 'Map':'แผนที่';?> </a>
                        </li>
                    </ul>
                </div>
            </div>                  
        </div>
    </div>


    <div><hr></div>


    



    <!-- Room type -->
     



     <div  class="container mt-5">
        <div class="row">
            <div class="col-md-12 ml-2 text-left">
                <h5><?php echo $this->lang->line('room_types'); ?></h5>
            </div>
        </div>
        <div class="row">
        <?php 
            foreach ($room_types as $key => $rt) {
                $photos = $CI->m_room_type->get_room_type_photos($rt->id_room_type);
            ?>
            <?php }?>
            
            <?php 
            $room_ctr = 0;
            $date = date('Y-m-d');
            foreach ($room_types as $key => $rt) {
            $rate = $CI->m_room_type->get_day_rate ($rt->id_room_type, $date);
            if ($rate == '') {
                $rate = $rt->default_rate;              
            }
            $photos = $CI->m_room_type->get_room_type_photos($rt->id_room_type);
                ?>
            
            <div class="col-md-6 mt-3">
                <div class="row">
                    <div class="col-md-12 pl-4 text-left" style="background-color:;">
                        <h6><div class="room-type-name"><?php echo ($lang == 'english') ? $rt->room_type_name_en : $rt->room_type_name_th;?></div></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-7" style="background-color:;height:300px">
                                <div class="slideshow" id="slideshow-<?php echo $key;?>">
                                    <?php 
                                        foreach ($photos as $ctr1 => $photo){
                                    ?>
                                    <div>
                                        <img class="room_img" data-type="<?php echo $modular_type[$room_ctr];?>" data-ctr="<?php echo $ctr1;?>" src="<?php echo share_folder_path().$photo->room_photo_url;?>" width="100%">
                                    </div>
                                    <?php }?>
                                </div>  

                            </div>
                            <div class="col-md-5" style="background-color:;height:300px">
                                <div class="row mb-3 mt-2 price">
                                    <div class="col-md-12 mx-0 text-center">
                                    <?php 
                                    $price = ($lang == 'english') ? number_format($rt->default_rate,0).'/Night' : 'ราคา '.number_format($rate,0).'/คืน';
                                    ?>
                                    <div class="price" ><b><?php echo $price;?></b></div>               
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-left icon_container">
                                        <span class="icon-content"><object data="<?php echo site_url();?>images/icons/house.svg" height="20"></object></span> 
                                    </div>
                                    <div class="col-md-9 text-left col-sm-9 icon_container">
                                        <span class="icon-content"><?php echo $lang == 'english' ? $rt->area_en : $rt->area_th; ?></span>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-2 text-left icon_container" >
                                            <!-- <span class="icon-content"><img class="icon" src="<?php echo share_folder_path();?>images/icons/icons8-bedroom-50.png" height="18"></span> -->
                                            <span class="icon-content"><object data="<?php echo share_folder_path();?>images/icons/icons8-bedroom-50.png" height="18"></object></span>
                                        </div>
                                        <div class="col-9 text-left icon_container">
                                            <span class="icon-content"><?php echo $lang == 'english' ? $rt->room_details_en : $rt->room_details_th; ?></span>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-2 text-left icon_container" >
                                        <span class="icon-content  ml-1"><object data="<?php echo share_folder_path();?>images/icons/bathroom.png" height="18"></object></span>
                                    </div>
                                    <div class="col-9 text-left icon_container">
                                        <span class="icon-content"><?php echo $lang == 'english' ? $rt->bathroom_en : $rt->bathroom_th; ?></span>
                                    </div>
                                </div>      
                                <div class="row">
                                    <div class="col-md-2 text-left col-sm-2 icon_container" >
                                        <span class="icon-content" style="margin-left:1px;"><object data="<?php echo share_folder_path();?>images/icons/person-fill.svg" height="18"></object></span>
                                    </div>
                                    <div class="col-md-9 text-left col-sm-9 icon_container">
                                        <span class="icon-content"><?php echo $lang == 'english' ? $rt->number_of_adults.' Adults' : 'จำนวนผู้เข้าพัก: '.$rt->number_of_adults ;?></span>
                                    </div>      
                                </div>
                                
                                <div class="row" >
                                    <div class="col-md-2 text-left col-sm-2 icon_container">
                                        <object data="<?php echo share_folder_path();?>images/icons/tv.svg" height="20"> </object>
                                    </div>
                                    <div class="col-md-9 text-left col-sm-9 icon_container">
                                        <span class="icon-content">TV (Internet)</span>
                                    </div>                      
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-2 text-left col-sm-2 icon_container">
                                        <span class="icon-content"><object data="<?php echo share_folder_path();?>images/icons/snow.svg" height="20"> </object></span>
                                    </div>
                                    <div class="col-md-9 text-left col-sm-9 icon_container">
                                        <span class="icon-content"><?php echo $lang == 'english' ? 'Air Conditioning' : 'เครื่องปรับอากาศ'; ?></span>
                                    </div>
                                </div>

                                <div class="row" >
                                    <div class="col-md-2 text-left col-sm-2 icon_container">
                                        <span class="icon-content"><object data="<?php echo share_folder_path();?>images/icons/wifi.svg" height="20"> </object></span>
                                    </div>
                                    <div class="col-md-9 text-left col-sm-9 icon_container">
                                        <span class="icon-content">Free WIFI</span>
                                    </div>                      
                                </div>
                                <?php if ($rt->sofa_en != '') {?>
                                <div class="row">
                                    <div class="col-md-2 text-left col-sm-2 icon_container">
                                        <span class="icon-content" style="font-size:16px; margin-top:-2px;">
                                            <object data="<?php echo share_folder_path();?>images/icons/sofa.png" height="14"></object>
                                        </span>
                                    </div>
                                    <div class="col-md-9 text-left col-sm-9 icon_container">
                                        <span class="icon-content"><?php echo $lang == 'english' ? $rt->sofa_en : $rt->sofa_th; ?></span>
                                    </div>                      
                                </div>
                                <?php }?>
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ml-2 text-right">
                    <button class="btn button-primary-w add_to_cart" data-id="<?php echo $rt->id_room_type;?>" data-price="<?php echo $rt->default_rate;?>" id="" style="margin-right: 5px;"><?php echo $this->lang->line('add_to_cart');?></button>
                        <a href="javascript:;" data-roomtype="<?php echo $rt->id_room_type;?>" class="btn button-primary book_now" id="" style="margin-left: 5px;"><?php echo $this->lang->line('book_now');?></a>
                    </div>
                </div>
            </div >

            <?php 
            $room_ctr++;
            }?>
        </div>
    </div>
    <div id="pj-ov"></div>
    <div class="my-5" ><hr></div>

    <div class="container">
    <div class="row" id="pj-fac">
        <div class="col-md-8">
            <div class="section_header "><?php echo $this->lang->line('project_overview');?></div>      
            <div class="row mb-2">  
                <div class="container-fluid mb-4">      
                    <div class="col-md-12">         
                        <?php echo ($lang == 'english') ? $project_details->overview_en : $project_details->overview_th;;?>
                    
                    </div>
                </div>
            </div>
    
            <div class="section_header "><?php echo $this->lang->line('project_highlights');?></div>
            <div class="row mb-2">          
                <div class="container-fluid mb-4">
                    <div class="col-md-12">     
                        <div class="h_container" style="display: flex; flex-direction: row; ">  
                        <?php foreach ($project_highlights as $h) {?>
                            <div style="bottom: 0; padding-right: 50px;">
                            
                            <!-- <input type="checkbox" style="vertical-align:middle;"> -->
                            &nbsp;<img src="<?php echo share_folder_path().$h->icon;?>" width="18">
                            <span class="highlights_desc" style="font-size: 1.1em;"><?php echo ($lang == 'english') ? $h->description_en : $h->description_th;?></span>
                            </div>
                        <?php }?>    
                        </div>      
                    </div>
                </div>
            </div>
            
            <div class="section_header "><?php echo $this->lang->line('project_facility');?></div>
    <div class="row">           
        <div class="container-fluid mb-4">
            <div class="col-md-12"> 
                <div class="row" id="pj-con">   
                <!-- <div class="h_container" style="display: flex; flex-direction: column; "> -->  
                
                <?php 
                
                foreach ($property_facility as $f) {?>
                    <div class="col-md-6" style="bottom: 0; ">
                    
                    <input type="checkbox" <?php echo (in_array($f->long_desc_en, $project_facility)) ? 'checked="checked"' : ''?> style="vertical-align:middle; pointer-events:none;">
                    &nbsp;<img src="<?php echo share_folder_path().$f->icon;?>" width="18">
                    <span class="highlights_desc" style="font-size: 1.1em;"> <?php echo ($lang == 'english') ? $f->long_desc_en : $f->long_desc_th;?></span>
                    </div>
                <?php }?>    
                <!-- </div> -->
                </div>  
            </div>
        </div>
    </div>
    
    <div class="section_header "><?php echo $this->lang->line('conditions_and_policies');?></div>
    <div class="row">           
        <div class="container-fluid mb-4">
            <div class="col-md-12">         
                
                <?php 
                //print_r($project_policy);
                foreach ($project_policy as $p) {
                    $policy_type = ($lang == 'english') ? $p->policy_type_en : $p->policy_type_th;
                    echo "<span>".$policy_type.'</span>';               
                    $policies = $CI->m_project_info->get_property_policy(1, $p->policy_type_en);
                ?>
                <ol>
                    <?php foreach ($policies as $policy) {?>            
                        <li><?php echo ($lang == 'english') ? $policy->description_en: $policy->description_th;?></li>          
                    <?php }?>
                </ol>
                <?php } ?>
            </div>
        </div>
    </div>
        </div>  
        <div class="col-md-4">
            <div class="section_header "><?php echo $this->lang->line('locations_nearby');?></div>
            <div class="row mb4">
                <div class="col-md-12">     
                    <div class="table-responsive">
                        <table class="table table-bordered" >
                            <tr>
                                <th><?php echo $this->lang->line('location');?></th>
                                <th><?php echo $this->lang->line('distance');?>(km)</th>
                            </tr>
                        <?php foreach ($locations_nearby as $l) {?>
                            <tr>
                                <td><?php echo $l->location_name_en;?></td>
                                <td style="text-align: center;"><?php echo $l->distance_km;?></td>
                            </tr>
                        <?php }?>  
                        </table>  
                    </div>      
                </div>
            </div>
            </div>
        </div>
    </div>
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


