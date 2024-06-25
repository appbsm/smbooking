<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Placeholder Language</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <input type="text" style="max-width: 100%; width: 100%; border-bottom: none !important; text-align: center; padding-right: 30px;" id="daterange" name="daterange" class="form-control-calen" placeholder="Check-in - Check-out Date">
    
    <button id="change-to-th">เปลี่ยนเป็นภาษาไทย</button>
    <button id="change-to-en">Change to English</button>

    <script>
        $(document).ready(function() {
            // Event listeners for buttons
            $('#change-to-th').click(function() {
                $('#daterange').attr('placeholder', 'วันที่เข้าพัก - วันที่ออก');
            });

            $('#change-to-en').click(function() {
                $('#daterange').attr('placeholder', 'Check-in - Check-out Date');
            });

            // Event listener for cancel.daterangepicker
            $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
                var initialLanguage = 'th'; // You can replace this with your session language if needed
                if (initialLanguage === 'th') {
                    $('#daterange').attr('placeholder', 'วันที่เข้าพัก - วันที่ออก');
                } else if (initialLanguage === 'en') {
                    $('#daterange').attr('placeholder', 'Check-in - Check-out Date');
                }
            });
        });
    </script>
</body>
</html>
