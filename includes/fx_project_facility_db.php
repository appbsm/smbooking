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

?>