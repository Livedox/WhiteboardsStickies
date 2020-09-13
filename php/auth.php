<?php
	$team = filter_var(trim($_POST["loginTeam"]), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST["loginPassword"]), FILTER_SANITIZE_STRING);

	if(mb_strlen($team) < 5 || mb_strlen($team) > 25) {
		echo "Недопустимая длина логина";
		exit();
	} else if(mb_strlen($password) < 5 || mb_strlen($password) > 25) {
		echo "Недопустимая длина пароля";
		exit();
	}
	
	$password = md5($password."password12346");

	$mysqli = new mysqli("localhost", "root","", "whiteboards_stickies");
	$mysqli->query("SET NAMES 'utf8'");

	$result = $mysqli->query("SELECT * FROM `teams` WHERE `team` = '$team' AND `password` = '$password' ");

	$users = $result->fetch_assoc();
	if(count($users) == 0) {
		echo "Такой пользователь не найден";
		exit();
	}

	setcookie("team", $users['team'], time() + 3600, "/");
	$mysqli->close();
	
	header('Location: ../main.php');
?>