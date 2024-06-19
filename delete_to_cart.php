<?php
session_name("sm_booking");
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id_room_type'] == $id) {
            unset($_SESSION['cart'][$key]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array
    header('Location: cart.php');
    exit;
}

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $room_list = get_room_detail($conn, $_SESSION['cart']);
}
?>

