<?php
	$data = json_decode(file_get_contents('php://input'));
	if(isset($data)) {
		if($data->head == "set") {
			$mysqli = new mysqli("localhost", "root", "", "whiteboards_stickies");
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$mysqli->query("SET NAMES 'utf8'");
			$team = $_COOKIE['team'];

			$value = json_encode($data->data);

			$mysqli->query("UPDATE `teams` SET `stickers`='$value' WHERE `team`='$team'");
			
			$mysqli->close();
		} else {
			$mysqli = new mysqli("localhost", "root", "", "whiteboards_stickies");
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$mysqli->query("SET NAMES 'utf8'");
			$team = $_COOKIE['team'];
			$result = $mysqli->query("SELECT * FROM `teams` WHERE `team`='$team'");
			$result = mysqli_fetch_assoc($result);

			echo json_encode($result['stickers']);
			$mysqli->close();
		}

		
	}
?>