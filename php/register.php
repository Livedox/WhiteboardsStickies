<?php
	$login = filter_var(trim($_POST["registerTeam"]), FILTER_SANITIZE_STRING);

	$password = filter_var(trim($_POST["registerPassword"]), FILTER_SANITIZE_STRING);
	$passwordConfirm = filter_var(trim($_POST["registerPasswordConfirm"]), FILTER_SANITIZE_STRING);



	if(mb_strlen($team) < 5 || mb_strlen($login) > 25) {
		echo "Недопустимая длина логина";
		exit();
	} else if(mb_strlen($password) < 5 || mb_strlen($password) > 25) {
		echo "Недопустимая длина пароля";
		exit();
	} else if($password != $passwordConfirm) {
		echo "Пароли не совпадают";
		exit();
	}
	
	$password = md5($password."password12346");

	$mysqli = new mysqli("localhost", "root", "", "dbname");
	$mysqli->query("SET NAMES 'utf8'");
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$result = $mysqli->query("SELECT * FROM `logins` WHERE `login` = '$login' AND `password` = '$password' ");
	$users = $result->fetch_assoc();
	if(count($users) == 0) {
		$res = $mysqli->query("INSERT INTO `logins` (`login`, `password`) VALUES('$login', '$password')");
		if($res) {
			setcookie("login", $users['login'], time() + 3600, "/");
		} else {
			die( mysql_error() );
			echo "Непредвиденная ошибка";
			exit();
		}
	} else {
		echo "Пользователь уже существует";
		exit();
	}
	
	$mysqli->close();
	
	header('Location: ../main.php');
?>