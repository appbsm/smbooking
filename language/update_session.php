<?php
session_name("sm_booking");
session_start();
if (isset($_POST['lang'])) {
    $_SESSION['lang'] = $_POST['lang'];
}
?>
