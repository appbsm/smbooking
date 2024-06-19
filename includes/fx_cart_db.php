<?php

function convertDate($date) {
	list($day, $month, $year) = explode('/', $date);
    // เปลี่ยนรูปแบบเป็น YYYY-MM-DD
    return "$year-$month-$day";
}

function get_room_detail($conn,$cart) {
	$result = array();

	$id_room = array();
	foreach ($cart as $item) {
		$id_room[] = $item['id_room_type'];
	}
	$id_room_str = implode("','", $id_room);
 	// $sql ="SELECT * FROM room_details WHERE active = '1' and id_room_details IN ('".$id_room_str."') ";

 	$sql =" SELECT * FROM room_type ry
		LEFT JOIN  room_type_photo rp ON ry.id_room_type = rp.id_room_type
		JOIN (
		    SELECT id_room_type, MIN(display_sequence) AS min_display_sequence
		    FROM room_type_photo
		    GROUP BY id_room_type
		) AS subquery
		ON rp.id_room_type = subquery.id_room_type
		AND rp.display_sequence = subquery.min_display_sequence
		where ry.id_room_type IN ('".$id_room_str."') ";

 	// echo '<script>alert("sql: '.$sql.'")</script>';
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_room($conn,$id) {
	$result = array();
 	$sql ="select * from cart_item ".
		" WHERE id_guest_info = '".$id_user."'".
		" order by date_created DESC ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function search_room_to_book($conn,$r_check_in_date, $r_check_out_date) {
		$result = array();
		$sql = "select * from room_details rd "
				. "left join room_type rt on rt.id_room_type = rd.id_room_type "
				. "where "
				. "rd.active = 1 AND rt.active = 1 AND "
				. "rd.id_room_details NOT IN ( "
				. "select br.id_room_details from booking b "
				. "left join booking_room br on br.booking_number = b.booking_number "
				. "where "
				. "b.check_out_date > '". $r_check_in_date ."' AND "
				. "b.check_in_date < '". $r_check_out_date ."' AND "
				. "b.status != 'Expired' AND b.status != 'Checked-out' AND b.status != 'Cancel'"
				. ") "
				. "order by rt.display_sequence";
		// echo '<script>alert("search_room_to_book: '.$sql.'")</script>';
		$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
		return $result;
	}	

?>