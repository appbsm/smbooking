<script>
    var translations = {
        "en": {
            "resort_topbar": "Resort",
            "hotel_topbar": "Hotel",
            "condo_topbar": "Condo & Apartment",
            "promotion_topbar": "Promotion & Package",
            "contact_topbar": "Contact us",

            "sign_in": "Sign In",
        },
        "th": {
            "resort_topbar": "รีสอร์ท",
            "hotel_topbar": "โรงแรม",
            "condo_topbar": "คอนโด & อพาร์ทเมนต์",
            "promotion_topbar": "โปรโมชั่นและแพ็คเกจ",
            "contact_topbar": "ติดต่อเรา",

            "sign_in": "เข้าสู่ระบบ",
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