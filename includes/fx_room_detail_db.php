<?php

function get_room($conn,$id) {
	$result = array();
 	$sql ="SELECT * FROM room_type rt
 	LEFT JOIN project_info pj ON pj.id_project_info = rt.id_project_info 
 	LEFT JOIN room_type_photo rp ON rp.id_room_type = rt.id_room_type
 	WHERE rt.id_room_type = '".$id."' and active = '1' ";
 	// echo '<script>alert("get_room: '.$sql.'")</script>'; 
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
 	WHERE rt.id_room_type = (SELECT TOP 1 id_room_type FROM room_type where active = '1' ORDER BY id_room_type ASC)
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

function get_project_highlights($conn,$id) {
	$result = array();
 	$sql ="SELECT * from project_highlights ph
	JOIN project_info pi ON ph.id_project_info = pi.id_project_info
	WHERE ph.id_project_info = '".$id."' ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die(print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_project_policy($conn,$id) {
	$result = array();
 	$sql ="SELECT * from project_policy WHERE id_project_info = '".$id."' ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die(print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_point_of_interest($conn,$id) {
	$result = array();
 	$sql ="SELECT * from point_of_interest poi
	JOIN project_info pi ON poi.id_project_info = pi.id_project_info
	WHERE poi.id_project_info = '".$id."' ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die(print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_seasonal_price($conn,$id) {
	$result = array();
 	$sql ="SELECT * from seasonal_price sp
	JOIN room_type rt ON sp.id_room_type = rt.id_room_type
	WHERE sp.id_room_type = '".$id."' ";
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