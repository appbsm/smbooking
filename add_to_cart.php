<?php
// ตรวจสอบว่ามีการส่งค่า 'id_room_type' และ 'room_rate' มาหรือไม่
if (isset($_POST['id_room_type']) && isset($_POST['room_rate'])) {
    session_name("sm_booking");
    session_start();

    // รับค่าจาก AJAX request
    $id_room_type = $_POST['id_room_type'];
    $room_rate = $_POST['room_rate'];

    // ตรวจสอบว่ามีตะกร้าสินค้าอยู่แล้วหรือไม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(); // สร้างตะกร้าสินค้าใหม่ถ้ายังไม่มี
    }

    // ตรวจสอบว่าประเภทห้องพักที่เลือกมีอยู่ในตะกร้าแล้วหรือไม่
    $isDuplicate = false;
    foreach ($_SESSION['cart'] as $item) {
        if ($item['id_room_type'] == $id_room_type) {
            $isDuplicate = true;
            break;
        }
    }

    if ($isDuplicate) {
        // กรณีที่ประเภทห้องพักที่เลือกมีอยู่ในตะกร้าแล้ว
        $response = array(
            'message' => 'ประเภทห้องพักที่เลือก มีอยู่ในตะกร้าสินค้าแล้ว ไม่สามารถเลือกได้อีก'
        );
    } else {
        // เพิ่มสินค้าลงในตะกร้า
        $new_item = array(
            'id_room_type' => $id_room_type,
            'room_rate' => $room_rate
            // สามารถเพิ่มข้อมูลอื่น ๆ เช่น จำนวนสินค้า, รายละเอียดเพิ่มเติมได้ตามต้องการ
        );

        // เพิ่มสินค้าในตะกร้า
        $_SESSION['cart'][] = $new_item;

        // ตรวจสอบและส่งค่ากลับเพื่อแสดงผลหน้าจอ
        $response = array(
            'message' => 'สินค้าถูกเพิ่มในตะกร้าเรียบร้อย',
            'count' => count($_SESSION['cart']) // ส่งค่าจำนวนสินค้าในตะกร้ากลับไป
        );
    }

    echo json_encode($response);
} else {
    // กรณีที่ไม่มีค่า 'id_room_type' หรือ 'room_rate' ส่งมา
    $response = array(
        'message' => 'ข้อมูลไม่ครบถ้วน กรุณาลองใหม่อีกครั้ง'
    );

    echo json_encode($response);
}
?>
