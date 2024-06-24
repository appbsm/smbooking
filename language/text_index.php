<script>
    var translations = {
        "en": {
            "resort_topbar": "Resort",
            "hotel_topbar": "Hotel",
            "condo_topbar": "Condo & Apartment",
            "promotion_topbar": "Promotion & Package",
            "contact_topbar": "Contact us",

            "sign_in": "Sign In",
            "daterange": "  Check-in - Check-out Date"
        },
        "th": {
            "resort_topbar": "รีสอร์ท",
            "hotel_topbar": "โรงแรม",
            "condo_topbar": "คอนโด & อพาร์ทเมนต์",
            "promotion_topbar": "โปรโมชั่น & แพ็คเกจ",
            "contact_topbar": "ติดต่อเรา",

            "sign_in": "เข้าสู่ระบบ",
            "daterange": "วันที่เช็คอิน - วันที่เช็คเอาท์"
        }
    };
    function switchLanguage(language) {
        var elements = Object.keys(translations[language]);
        elements.forEach(function(element) {
            $('#' + element).html(translations[language][element]);
        });
        // $('#daterange').attr('placeholder', translations[language]['daterange']);

        updateProjectList(language);
        // $('#daterange').attr('placeholder', translations[language]['daterange']);
        // alert('daterange');
        
        // updateDaterangePlaceholder(language);

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

    function updateProjectList(language) {
        var projectListHtml = '<span><i class="fas fa-map-marker-alt"></i></span>' +
            '<select id="project-select" style="max-width: 100%; border-bottom: none !important;">';

        <?php foreach ($project_list as $value) { ?>
            if (language === 'en') {
                projectListHtml += '<option class="en" value="<? echo $value['id_project_info']; ?>"><? echo $value['project_name_en']; ?></option>';
            } else if (language === 'th') {
                projectListHtml += '<option class="th" value="<? echo $value['id_project_info']; ?>"><? echo $value['project_name_th']; ?></option>';
            }
        <?php } ?>

        projectListHtml += '</select>';

        $('#project-list').html(projectListHtml);
    }

    function updateDaterangePlaceholder(language) {
        var daterangeHtml = 
            '<i class="fas fa-calendar icon-ckinout" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); font-weight: normal;"></i>' +
            '<input type="text" style="max-width: 100%; width: calc(100% - 40px); border-bottom: none !important; text-align: center; padding-left: 40px; padding-right: 30px;"' +
            'id="daterange" name="daterange" class="form-control-calen" placeholder="' + translations[language]['daterange'] + '">';
        $('#daterange-container').html(daterangeHtml);
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
        $('#daterange').attr('placeholder',translations[language]['daterange']);
        // updateDaterangePlaceholder('th');
    });

    $('#en-link').click(function(event) {
        event.preventDefault();
        updateSessionLanguage('en');
        $('#daterange').attr('placeholder',translations[language]['daterange']);
        // updateDaterangePlaceholder('en');
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