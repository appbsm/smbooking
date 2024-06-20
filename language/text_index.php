<script>
    var translations = {
        "en": {
            "deals_topbar": "Deals",
            "bookings_topbar": "Bookings",
            "support_topbar": "Support",
            "sign_topbar": "Sign In",
            "register_topbar": "Register",

            "home_topbar": "Home<i class='fas fa-caret-down'></i>",
            "hotel_topbar": "Hotel<i class='fas fa-caret-down'></i>",
            "shortcode_topbar": "Shortcode<i class='fas fa-caret-down'></i>",
            "blog_topbar": "Blog<i class='fas fa-caret-down'></i>",
            "contact_topbar": "Contact",

            "home_sidebar": "Home",
            "hotel_sidebar": "Hotel",
            "shortcode_sidebar": "Shortcode",
            "blog_sidebar": "Blog",
            "contact_sidebar": "Contact",

            "popular_hotels": "Most Popular Hotels"
        },
        "th": {
            "test": "test",
            "deals_topbar": "ข้อเสนอ",
            "bookings_topbar": "การจอง",
            "support_topbar": "สนับสนุน",
            "sign_topbar": "เข้าสู่ระบบ",
            "register_topbar": "ลงทะเบียน",

            "home_topbar": "หน้าหลัก<i class='fas fa-caret-down'></i>",
            "hotel_topbar": "โรงแรม<i class='fas fa-caret-down'></i>",
            "shortcode_topbar": "รหัสย่อ<i class='fas fa-caret-down'></i>",
            "blog_topbar": "บล็อก<i class='fas fa-caret-down'></i>",
            "contact_topbar": "ติดต่อ",

            "home_sidebar": "หน้าหลัก",
            "hotel_sidebar": "โรงแรม",
            "shortcode_sidebar": "รหัสย่อ",
            "blog_sidebar": "บล็อก",
            "contact_sidebar": "ติดต่อ",


            "popular_hotels": "ห้องพักยอดนิยม"
        }
    };

    function switchLanguage(language) {
        var elements = Object.keys(translations[language]);
        elements.forEach(function(element) {
            $('#' + element).html(translations[language][element]);
        });

        // $('#register_topbar').html(translations[language]['register_topbar']);
        // $('#home_topbar').html(translations[language]['home_topbar'] + '<i class="fas fa-caret-down"></i>');
        
        if (language === 'th') {
            $('.en').hide();
            $('.th').show();
        } else if (language === 'en') {
            $('.th').hide();
            $('.en').show();
        }
    }

    function updateSessionLanguage(language) {
        $.post('language/update_session.php', { lang: language }, function() {
            switchLanguage(language);
            $('.en').toggle(language === 'en');
            $('.th').toggle(language === 'th');
        });
    }

    $('#th-link').click(function(event) {
        event.preventDefault();
        updateSessionLanguage('th');
    });

    $('#en-link').click(function(event) {
        event.preventDefault();
        updateSessionLanguage('en');
    });

    $(document).ready(function() {
        var initialLanguage = '<?php echo $_SESSION['lang']; ?>';
        switchLanguage(initialLanguage);
        if (initialLanguage === 'th') {
            $('.en').hide();
            $('.th').show();
        } else if (initialLanguage === 'en') {
            $('.th').hide();
            $('.en').show();
        }
    });

</script>