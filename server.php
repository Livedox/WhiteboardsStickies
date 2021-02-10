<?php
	$data = json_decode(file_get_contents('php://input'));
	if(isset($data)) {
		if($data->head == "set") {
			$mysqli = new mysqli("localhost", "root", "", "dbname");
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$mysqli->query("SET NAMES 'utf8'");
			$login = $_COOKIE['login'];

			$value = json_encode($data->data);

			$mysqli->query("UPDATE `logins` SET `stickers`='$value' WHERE `login`='$login'");
			
			$mysqli->close();
		} else {
			$mysqli = new mysqli("localhost", "root", "", "dbname");
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$mysqli->query("SET NAMES 'utf8'");
			$login = $_COOKIE['login'];
			$result = $mysqli->query("SELECT * FROM `logins` WHERE `login`='$login'");
			$result = mysqli_fetch_assoc($result);

			echo json_encode($result['stickers']);
			$mysqli->close();
		}

		
	}
?>