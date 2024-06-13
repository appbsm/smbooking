<script>
    var translations = {
        "en": {
            "deals_topbar": "Deals",
            "bookings_topbar": "Bookings",
            "support_topbar": "Support",
            "sign_topbar": "Sign In",
            "register_topbar": "Register",
            "home_topbar": "Home",
            "hotel_topbar": "Hotel",
            "shortcode_topbar": "Shortcode",
            "blog_topbar": "Blog",
            "contact_topbar": "Contact"
        },
        "th": {
            "deals_topbar": "ข้อเสนอ",
            "bookings_topbar": "การจอง",
            "support_topbar": "สนับสนุน",
            "sign_topbar": "เข้าสู่ระบบ",
            "register_topbar": "ลงทะเบียน",
            "home_topbar": "หน้าหลัก",
            "hotel_topbar": "โรงแรม",
            "shortcode_topbar": "รหัสย่อ",
            "blog_topbar": "บล็อก",
            "contact_topbar": "ติดต่อ"
        }
    };

    function switchLanguage(language) {
        $('#deals_topbar').html(translations[language]['deals_topbar']);
        $('#bookings_topbar').html(translations[language]['bookings_topbar']);
        $('#support_topbar').html(translations[language]['support_topbar']);
        $('#sign_topbar').html(translations[language]['sign_topbar']);
        $('#register_topbar').html(translations[language]['register_topbar']);
        $('#home_topbar').html(translations[language]['home_topbar'] + '<i class="fas fa-caret-down"></i>');
        $('#hotel_topbar').html(translations[language]['hotel_topbar'] + '<i class="fas fa-caret-down"></i>');
        $('#shortcode_topbar').html(translations[language]['shortcode_topbar'] + '<i class="fas fa-caret-down"></i>');
        $('#blog_topbar').html(translations[language]['blog_topbar'] + '<i class="fas fa-caret-down"></i>');
        $('#contact_topbar').html(translations[language]['contact_topbar']);
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