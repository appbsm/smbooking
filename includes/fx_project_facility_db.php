<?php

function get_project($conn) {
	$result = array();
 	$sql ="SELECT * FROM project_info order by id_project_info ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}



function get_project_top($conn) {
	$result = array();
 	$sql ="SELECT * FROM project_info pj_i
	LEFT JOIN project_photos pp ON pj_i.id_project_info = pp.id_project_info
	WHERE pj_i.id_project_info = (
    SELECT TOP 1 id_project_info 
    FROM project_info 
    ORDER BY id_project_info); ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}


function get_project_id($conn,$id) {
	$result = array();
 	// $sql ="SELECT * FROM project_info where id_project_info ='".$id."'";
	$sql ="SELECT * FROM project_info pj_i
	LEFT JOIN project_photos pp ON pj_i.id_project_info = pp.id_project_info
	WHERE pj_i.id_project_info = '".$id."'";

 	// echo '<script>alert("get_project_id: '.$sql.'")</script>';
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_room_type($conn) {
	$result = array();
 	// $sql ="SELECT * FROM room_type ry
	// 	left JOIN room_type_photo rp ON ry.id_room_type = rp.id_room_type
	// 	ORDER BY ry.id_room_type,ry.display_sequence";
	$sql =" SELECT * FROM room_type ry
		LEFT JOIN  room_type_photo rp ON ry.id_room_type = rp.id_room_type
		JOIN (
		    SELECT id_room_type, MIN(display_sequence) AS min_display_sequence
		    FROM room_type_photo
		    GROUP BY id_room_type
		) AS subquery
		ON rp.id_room_type = subquery.id_room_type
		AND rp.display_sequence = subquery.min_display_sequence";
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