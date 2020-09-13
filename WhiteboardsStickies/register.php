<!DOCTYPE html>
<html>
<head>
	<title>Register/Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;700&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
	<div class="content" style="display: flex;justify-content: center;align-items: center;" id="app">
		<div class="register-content" :style="st">
			<form class="register" action="/php/register.php" method="POST" v-show="isRegister">
				<h2>Register</h2>
				<label>Team<input type="text" name="registerTeam"></label>
				<label>Password<input type="password" name="registerPassword"></label>
				<label>Confirm password<input type="password" name="registerPasswordConfirm"></label>
				<div class="submit">
					<input type="button" name="login" value="login" class="onlogin" v-on:click="isRegister = false"><input type="submit" name="send-register-form" value="register" class="register-submit">
				</div>			
			</form>
			<form class="login" action="/php/auth.php" method="POST" v-show="!isRegister">
				<h2>Login</h2>
				<label>Team<input type="text" name="loginTeam"></label>
				<label>Password<input type="password" name="loginPassword"></label>
				<div class="submit">
					<input type="button" name="login" value="register" class="onregister" v-on:click="isRegister = true"><input type="submit" name="send-register-form" value="login" class="login-submit">
				</div>			
			</form>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		function getRandInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}


		function getRandColor() {
			let colors =  [["#FFF6C8", "#84793F"], ["#E0FFC8", "#5D843F"], ["#C8FFF2", "#3E8473"],
				["#C8F2FF", "#3F7485"], ["#C8DBFF", "#3F5785"],
				["#FFC8C8", "#853D3D"], ["#FFE6C8", "#86543F"]][getRandInt(0, 6)];

			return {background: colors[0], color: colors[1]}
		}


		let app = new Vue({
			el: "#app",
			data: {
				isRegister: false,
				st: getRandColor(),
			}
		});
	</script>
</body>
</html>