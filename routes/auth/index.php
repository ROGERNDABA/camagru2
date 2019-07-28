
<?php
require("../../config/Global.php");
require("../../config/Setup.php");

$g = new General();
$g->CheckRequest("XMLHttpRequest");

?>
<link rel="stylesheet" href="public/css/auth.css">
<div class="auth-card">
	<div class="auth-header">
		Login
	</div>
	<div class="auth-container">
		<ul class="auth-switch" id="auth-switch">
			<li id="tab-login" class="active">Login</li>
			<li id="tab-sign-up">Sign Up</li>
		</ul>
		<div class="auth-sign-up" id="auth-sign-up">
			<form action="" method="post">
				<input type="text" name="firstname" id="firstname" placeholder="Firstname">
				<input type="text" name="lastname" id="lastname" placeholder="Lastname">
				<input type="email" name="email" id="email" placeholder="Email">
				<input type="text" name="username" id="username" placeholder="Username">
				<input type="password" name="password" id="password" placeholder="Password">
				<input type="password" name="password2" id="password2" placeholder="Confirm Password">
				<input type="submit" value="Sign Up">
			</form>
		</div>
		<div class="auth-login" id="auth-login">
			<form action="" method="post">
				<input type="text" name="lusername" id="lusername" placeholder="Username">
				<input type="password" name="lpassword" id="lfirstname" placeholder="Password">
				<input type="submit" value="Login">
			</form>
		</div>
	</div>
</div>
<script>
document.getElementById("auth-login").style.display = "block";
document.getElementById("auth-switch").querySelectorAll("li").forEach(element => {
	element.addEventListener("click", function () {
		document.getElementById("auth-switch").querySelectorAll("li").forEach(elem => {
			elem.classList.remove("active");
			document.getElementById("auth-"+ elem.id.substr(4)).style.display = "none";
		})
		element.classList.add("active");
		document.getElementsByClassName("auth-header")[0].innerHTML = element.innerHTML;
		document.getElementById("auth-"+ element.id.substr(4)).style.display = "block";
	})
});

Array.prototype.slice.call(document.getElementsByTagName("input")).forEach(element => {
	element.addEventListener("input", function () {
		console.log("sdsds");
	})
	element.addEventListener("focusout", function () {
		console.log("focus");
	})
});
</script>
