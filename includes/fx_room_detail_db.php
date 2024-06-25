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

function get_room_for_project($conn,$id) {
	$result = array();
 	$sql ="SELECT * FROM room_type rt WHERE id_project_info = '".$id."' and active = '1' ";
 	// echo '<script>alert("get_room_for_project:'.$sql.'")</script>'; 
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die( print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_room_for_project_top($conn) {
	$result = array();
 	$sql ="SELECT * FROM room_type rt WHERE id_project_info = (
    SELECT TOP 1 id_project_info 
    FROM project_info 
    ORDER BY id_project_info) and rt.active = '1' ";
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

function get_project_policy_group($conn,$id) {
	$result = array();
 	$sql ="SELECT policy_type_en from project_policy WHERE id_project_info = '".$id."' GROUP by policy_type_en ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die(print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_project_policy($conn,$policy_type) {
	$result = array();
 	$sql ="SELECT * from project_policy WHERE policy_type_en = '".$policy_type."' ORDER BY policy_type_en,id_project_policy ";
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die(print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_project_facility($conn,$id) {
	$result = array();
 	$sql ="SELECT * from project_facility WHERE id_project_info = '".$id."' ";
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

function get_day_rate($conn,$id_room_type, $current_date,$project_id) {
	$rate = 0;		
	$seasonal_price = get_seasonal_price_by_room_date($conn,$id_room_type, $current_date);

	if (count($seasonal_price) > 0) {
		$rate = $seasonal_price[0]['rate'];
	}else  {
		$room_type = get_room_type_by_ID ($conn,$project_id, $id_room_type);
		if (isset($room_type[0]['default_rate'])) {
			$rate = $room_type[0]['default_rate'];
		} 
	}
	// echo '<script>alert("$rate: '.$rate.'")</script>'; 
	return $rate;
}

function get_room_type_by_ID($conn,$id_project_info, $id_room_type) {
		$result = array();
		$sql = "select * from room_type where id_project_info = '".$id_project_info."' and id_room_type = '".$id_room_type."'";
		// echo '<script>alert("get_room_type_by_ID: '.$sql.'")</script>'; 
		$stmt = sqlsrv_query($conn,$sql);
		if( $stmt === false) {
			die(print_r( sqlsrv_errors(), true) );
		}
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
			$result[] = $row;
		} 
		return $result;
	}

function get_seasonal_price_by_room_date($conn,$id_room_type, $current_date) {
	$result = array();
	$sql = "select TOP 1 * "
			. "from seasonal_price "
			. "WHERE id_room_type = '".$id_room_type."' "
			. "AND start_date <= '".$current_date."' "
			. "AND end_date >= '".$current_date."' "
			. "order by is_priority DESC";
	// echo '<script>alert("get_seasonal_price_by_room_date: '.$sql.'")</script>';
	$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
		die(print_r( sqlsrv_errors(), true) );
	}
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){    
		$result[] = $row;
	} 
	return $result;
}

function get_room_type_photos ($conn,$id_room_type) {
	$result = array();
	$sql = "select * from room_type_photo where id_room_type = '".$id_room_type."' order by display_sequence asc ";	
	// echo '<script>alert("get_room_type_photos: '.$sql.'")</script>';
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