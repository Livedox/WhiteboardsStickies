<?php
	$login = filter_var(trim($_POST["loginTeam"]), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST["loginPassword"]), FILTER_SANITIZE_STRING);

	if(mb_strlen($team) < 5 || mb_strlen($team) > 25) {
		echo "Недопустимая длина логина";
		exit();
	} else if(mb_strlen($password) < 5 || mb_strlen($password) > 25) {
		echo "Недопустимая длина пароля";
		exit();
	}
	
	$password = md5($password."password12346");

	$mysqli = new mysqli("localhost", "root", "", "dbname");
	$mysqli->query("SET NAMES 'utf8'");

	$result = $mysqli->query("SELECT * FROM `logins` WHERE `login` = '$login' AND `password` = '$password' ");

	$users = $result->fetch_assoc();
	if(count($users) == 0) {
		echo "Такой пользователь не найден";
		exit();
	}

	setcookie("login", $users['login'], time() + 3600, "/");
	$mysqli->close();
	
	header('Location: ../main.php');
?>