<?php
	
	$response = array();
	
	include_once("dbconnection.php");
	
	if(isset($_POST['t_key']) && isset($_POST['ts_key']) && isset($_POST['quantity'])) {
		$t_key = $_POST['t_key'];
		$ts_key = $_POST['ts_key'];
		$quantity = $_POST['quantity'];
		
		$result = pg_query($conn, "Insert into \"Participants\" (\"t_key\",\"ts_key\",\"p_quantity\") Values($t_key,$ts_key,$quantity)");
		
		if($result) {
			
			$response['success'] = 1;
			$response['message'] = "Added to cart";
			
			echo json_encode($response);
		} else {
			$response['success'] = 0;
			$response['message'] = "No tours found";
				
			echo json_encode($response);
		}
	} else {
		$response['success'] = 0;
		$response['message'] = "Required field(s) is missing";
		
		echo json_encode($response);
	}
	pg_close($conn);
?>