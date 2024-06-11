<script>

    var translations = {
        "en": {
            "home_topbar": "Home",
            "hotel_topbar": "Hotel",
            "contact_topbar": "Contact",
            "description": "This is an example description."
        },
        "th": {
            "home_topbar": "หน้าหลัก",
            "hotel_topbar": "โรงแรม",
            "contact_topbar": "ติดต่อ",
            "description": "นี่คือตัวอย่างคำอธิบาย."
        }
    };

    function switchLanguage(language) {
        $('#home_topbar').html(translations[language]['home_topbar'] + '<i class="fas fa-caret-down"></i>');
        $('#hotel_topbar').html(translations[language]['hotel_topbar'] + '<i class="fas fa-caret-down"></i>');
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