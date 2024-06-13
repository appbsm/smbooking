<?php

function get_room($conn,$id) {
	$result = array();
 	$sql ="SELECT * FROM room_type rt
 	LEFT JOIN project_info pj ON pj.id_project_info = rt.id_project_info 
 	LEFT JOIN room_type_photo rp ON rp.id_room_type = rt.id_room_type
 	WHERE rt.id_room_type = '".$id."' ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_room_top($conn) {
	$result = array();
 	$sql ="SELECT * FROM room_type rt
 	LEFT JOIN project_info pj ON pj.id_project_info = rt.id_project_info
 	LEFT JOIN room_type_photo rp ON rp.id_room_type = rt.id_room_type
 	WHERE rt.id_room_type = (SELECT TOP 1 id_room_type FROM room_type ORDER BY id_room_type ASC)
 	order by rt.id_room_type asc ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_icon_room($conn,$id) {
	$result = array();
 	$sql =" SELECT * FROM room_type rt
 	LEFT JOIN room_type_amenities ra ON ra.id_room_type = rt.id_room_type
 	WHERE rt.id_room_type = '".$id."' ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die(print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

// function get_room_type($conn) {
// 	$result = array();
//  	// $sql ="SELECT * FROM room_type ry
// 	// 	left JOIN room_type_photo rp ON ry.id_room_type = rp.id_room_type
// 	// 	ORDER BY ry.id_room_type,ry.display_sequence";
// 	$sql =" SELECT * FROM room_type ry
// 		LEFT JOIN  room_type_photo rp ON ry.id_room_type = rp.id_room_type
// 		JOIN (
// 		    SELECT id_room_type, MIN(display_sequence) AS min_display_sequence
// 		    FROM room_type_photo
// 		    GROUP BY id_room_type
// 		) AS subquery
// 		ON rp.id_room_type = subquery.id_room_type
// 		AND rp.display_sequence = subquery.min_display_sequence";
// 	$stmt = sqlsrv_query($conn,$sql);
// 	if( $stmt === false) {
// 		die( print_r( sqlsrv_errors(), true) );
// 	}
// 	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
// 		$result[] = $row;
// 	} 
// 	return $result;
// }

?>