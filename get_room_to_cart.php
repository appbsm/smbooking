<?
	// หาจำนวนข้องของแต่ละ type
$sql= "select count(rd.id_room_type) as room_count 
 from room_details rd 
 left join room_type rt on rt.id_room_type = rd.id_room_type 
 where rd.active = 1 
 AND rt.active = 1 
 AND rd.id_room_type = '1'
 AND rd.id_room_details NOT IN ( 
 select br.id_room_details from booking b 
 left join booking_room br on br.booking_number = b.booking_number 
 WHERE 
 b.check_out_date > '2024-06-19' AND 
 b.check_in_date < '2024-06-19' AND 
 b.status != 'Expired' AND b.status != 'Checked-out' AND b.status != 'Cancel'
 ) 
 group by rd.id_room_type";

?>