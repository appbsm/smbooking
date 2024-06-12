<div class="main_menu_navbar" style="background-color: #f8f9fa">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="top-menu" style="background-color: #f8f9fa">
                            <div class="container">
                                <div class="row">
                                    <div class="col-1">
                                        <a class="navbar-brand" href="index.php">
                                            <img src="images/10.png" alt="" alt="" style="width: 70px;">
                                        </a>
                                    </div>
                                    <div class="col-7" style="display: flex; justify-content: flex-end;">
                                        <div class="sub-top-menu">
                                            <ul class="u-list">
                                                <li
                                                    class="dropdown-toggle p-rel d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block ">
                                                    <a href="javascript:;"><i class="fas fa-dollar-sign"></i> &nbsp;usd</a>
                                                    <ul class="top-dropdown">
                                                        <li><a href=""><i class="fa fa-bitcoin"></i>&nbsp;thb</a></li>
                                                    </ul>

                                                </li>
                                                <!-- <li
                                                    class="dropdown-toggle p-rel d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
                                                    <a href="javascript:;"><img src="images/flag/united-kingdom.png" alt="Thai Flag" style="width:16px; height:auto;"> &nbsp;eng</a>
                                                    <ul class="top-dropdown">
                                                        <li><a href=""><img src="images/flag/thailand.png" alt="Thai Flag" style="width:16px; height:auto;">&nbsp;thai</a></li>
                                                    </ul>
                                                </li> -->
                                                <li class="n-disp">
                                                        <i class="fas fa-tags"></i><a href="">&nbsp;Deals</a>
                                                </li>
                                                <li class="n-disp">
                                                        <i class="fas fa-calendar-alt"></i><a href="">&nbsp;Bookings</a>
                                                </li>
                                                <li
                                                    class="dropdown-toggle p-rel d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
                                                    <a href="javascript:;"><i class="material-icons" style="font-size: medium;">perm_phone_msg</i>&nbsp;support</a>
                                                    <ul class="top-dropdown">
                                                        <li><i class="fas fa-question-circle"></i><a href="">&nbsp;Help Center</a></li>
                                                        <li><i class="fas fa-address-book"></i><a href="">&nbsp;Contact Us</a></li>
                                                    </ul>
                                                </li>
                                                <!-- <li class="n-border">
                                                        <span>km</span>
                                                        <input type="checkbox" hidden="hidden" id="username">
                                                        <label class="switch" for="username"></label>
                                                        <span>miles</span>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-3 d-flex btn-mobile betmr">
                                        <div class="sub-top-menu s-menu">
                                            <ul class="u-list">
                                                <li class="n-border">
                                                    <!-- <a href="signup.html" class="btn btn-outline-dark btn-signin ">Sign In</a> -->
                                                    <button type="button" class="btn btn-outline-dark btn-signin" onclick="window.location.href='signup.html'">Sign In</button>
                                                </li>
                                                <li class="n-border" style="padding: 0;">
                                                    <!-- <a href="signup.html" class="btn btn-secondary btn-regis">Register</a> -->
                                                    <button type="button" class="btn  btn-secondary btn-regis" onclick="window.location.href='signup.html'">Register</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-1 d-flex th-en">
                                        <div class="sub-top-menu s-menu" style="display: flex; justify-content: flex-end;">
                                            <a href="#" id="th-link" style="margin-right: 10px;">TH</a>
                                            <span>|</span>
                                            <a href="#" id="en-link" style="margin-left: 10px; margin-right: 10px;">EN</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2 col-6 d-block d-lg-none">
                            <div class="navbar-toggler" data-toggle="collapse" role="term"
                            data-target="#sidebar" aria-controls="sidebar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <ul class="toggle-main-wrapper ">
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-10 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
                            <nav class="navbar navbar-expand-sm  d-block">
                                <ul class="navbar-nav ">
                                    <li class="nav-item p-rel wrap-nav-item">
                                        <a id="home_topbar" href="javascript:;" class="nav-link">
                                            Home
                                            <i class="fas fa-caret-down"></i>
                                        </a>
                                        <ul class="dropdown-items">
                                            <?php foreach ($project_list as $value) { ?>
                                            <li><a class="en" href="index-01.html"><? echo $value['project_name_en'] ?></a></li>
                                            <? } ?>
                                            <?php foreach ($project_list as $value) {?>
                                                <li><a class="th" href="index-02.html"><? echo $value['project_name_th']; ?></a></li>
                                            <? } ?>
                                        </ul>
                                    </li>
                                    <li class="nav-item p-rel  wrap-nav-item">
                                        <a id="hotel_topbar" href="javascript:;" class="nav-link">
                                            hotel
                                            <i class="fas fa-caret-down"></i>
                                        </a>
                                        <ul class="dropdown-items">
                                            <li class="p-rel"><a href="javascript:;">Hotel Listing </a>
                                                <ul class="sub-dropdown dropdown-items">
                                                    <li><a href="listing-grid-left.html">Hotel Left Grid View</a></li>
                                                    <li><a href="listing-grid-right.html">Hotel Right Grid View</a></li>
                                                    <li><a href="grid-map-view.html">Hotel Map View</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="hotel-single-page.html">Hotel Single Page</a></li>
                                            <li><a href="404-style.html">404 Error</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item p-rel  wrap-nav-item">
                                        <a href="javascript:;" class="nav-link">
                                            shortcode
                                            <i class="fas fa-caret-down"></i>
                                        </a>
                                        <ul class="dropdown-items mega-menu">
                                            <li class="shortcode-menu">
                                                <ul>
                                                    <li><a href="accordion.html">Accordion</a></li>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="client.html">Client</a></li>
                                                    <li><a href="counter.html">Counter</a></li>
                                                    <li><a href="element.html">Element</a></li>
                                                </ul>
                                            </li>
                                            <li class="shortcode-menu">
                                                <ul>
                                                    <li><a href="feature_with_icon.html">Feature with icon</a></li>
                                                    <li><a href="feature_with_images.html">Feature with images</a></li>
                                                    <li><a href="footer.html">Footer</a></li>
                                                    <li><a href="form.html">Form</a></li>
                                                    <li><a href="heading.html">Heading</a></li>
                                                </ul>
                                            </li>
                                            <li class="shortcode-menu">
                                                <ul>
                                                    <li><a href="image_box.html">Image Box</a></li>
                                                    <li><a href="icon.html">Icon</a></li>
                                                    <li><a href="page-header.html">Page Header</a></li>
                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                    <li><a href="pricing-table.html">Pricing Table</a></li>
                                                </ul>
                                            </li>
                                            <li class="shortcode-menu">
                                                <ul>
                                                    <li><a href="progress-skills.html">Progress Skill</a></li>
                                                    <li><a href="tab.html">Tab</a></li>
                                                    <li><a href="team.html">Team</a></li>
                                                    <li><a href="testimonials.html">testimonials</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item p-rel  wrap-nav-item">
                                        <a href="javascript:;" class="nav-link">
                                            blog
                                            <i class="fas fa-caret-down"></i>
                                        </a>
                                        <ul class="dropdown-items">
                                            <li class="p-rel"><a href="javascript:;">Blog Single</a>
                                                <ul class="sub-dropdown dropdown-items">
                                                    <li><a href="blog-left-singal.html">Single Left Sidebar</a></li>
                                                    <li><a href="blog-right-single.html">Single Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="p-rel"><a href="javascript:;">Blog Categories </a>
                                                <ul class="sub-dropdown dropdown-items">
                                                    <li><a href="blog-left-singal.html">Blog Left Sidebar</a></li>
                                                    <li><a href="blog-right-single.html">Blog Right Sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  wrap-nav-item">
                                        <a  id="contact_topbar" href="contact-form.html" class="nav-link">
                                            contact
                                        </a>
                                    </li>
                                    <li class="nav-item p-rel wrap-nav-item">
                                        <a href="javascript:;" class="nav-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <div class="search-box dropdown-items">
                                            <input type="text" class="" placeholder="Search text">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <!-- <a href="add-hotel.html" class="btn btn-outline-dark">Add Hotel</a> -->
                                        <button type="button" class="btn btn-outline-dark" onclick="window.location.href='add-hotel.html'">Add Hotel</button>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>