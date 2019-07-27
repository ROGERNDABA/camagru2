
<?php
require("../../config/Global.php");
require("../../config/Setup.php");

$g = new General();
$g->CheckRequest("XMLHttpRequest");

?>
<div class="auth-card">
	<div class="auth-header">
		login
	</div>
	<div class="auth-container">
		<ul class="auth-switch" id="auth-switch">
			<li class="active">Login</li>
			<li>Sign Up</li>
		</ul>
		<div class="auth-sign-up">
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
		<div class="auth-login">
			<form action="" method="post">
				<input type="text" name="lusername" id="lusername" placeholder="Username">
				<input type="password" name="lpassword" id="lfirstname" placeholder="Password">
				<input type="submit" value="Login">
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
document.addEventListener("load", function () {
	window.alert("dfd");
});
</script>