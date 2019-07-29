<?php
require("../../config/Global.php");
require("../../config/Setup.php");

$g = new General();
$g->CheckRequest("XMLHttpRequest");

?>
<!-- <link rel="stylesheet" href="public/css/auth.css"> -->
<div class="auth-card">
	<div class="auth-header">
		Login
	</div>
	<ul class="form-error" id="form-error"></ul>
	<div class="auth-container">
		<ul class="auth-switch" id="auth-switch">
			<li id="tab-login" >Login</li>
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
				<input name="submit" type="submit" value="Sign Up" disabled="disabled">
			</form>
		</div>
		<div class="auth-login" id="auth-login">
			<form action="" method="post">
				<input type="text" name="lusername" id="lusername" placeholder="Username">
				<input type="password" name="lpassword" id="lfirstname" placeholder="Password">
				<input type="submit" name="submit" value="Login" disabled="disabled">
			</form>
		</div>
	</div>
</div>
<script>
if (localStorage.getItem("form")) {
	document.getElementById("auth-"+localStorage.getItem("form")).style.display = "block";
	document.getElementById("tab-"+localStorage.getItem("form")).classList.add("active");
	var str = localStorage.getItem("form").replace("-", " ")
	document.getElementsByClassName("auth-header")[0].innerHTML = toTitleCase(str);
} else {
	document.getElementById("auth-login").style.display = "block";
	localStorage.setItem("form", "login");
}
document.getElementById("auth-switch").querySelectorAll("li").forEach(element => {
	element.addEventListener("click", function () {
		document.getElementById("auth-switch").querySelectorAll("li").forEach(elem => {
			elem.classList.remove("active");
			document.getElementById("auth-"+ elem.id.substr(4)).style.display = "none";
		})

		localStorage.setItem("form", element.id.substr(4));
		document.getElementById("auth-"+ localStorage.getItem("form")).style.display = "block";
		document.getElementById("tab-"+localStorage.getItem("form")).classList.add("active");
		var str = localStorage.getItem("form").replace("-", " ")
		document.getElementsByClassName("auth-header")[0].innerHTML = toTitleCase(str);
	})
});

Array.prototype.slice.call(document.getElementsByTagName("input")).forEach(element => {
	if (element.parentElement.parentElement.id == "auth-sign-up") {
		var nameRegex = /^[a-zA-Z]'?[-a-zA-Z]+$/;
		var usernameRegex = /^[a-zA-Z0-9_]+$/;
		var emailRegex = /^[A-Za-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{1,4}[^\\S]+$/;
		var errElem = document.getElementById("form-error");
		var li = document.createElement("li");
		element.addEventListener("input", function () {
			errElem.innerHTML = "";
			var track = 0;

			document.querySelectorAll(".auth-sign-up input").forEach(inputElem => {
				var name = inputElem.name;
				var val = inputElem.value;

				if ((name == "firstname" || name == "lastname") && val && !nameRegex.test(val)) {
					li.innerHTML = "Only A-Z, a-z, - and ' allowed on " + name;
					errElem.appendChild(li);
				} else if (name == "username" && val && !usernameRegex.test(val)) {
					li.innerHTML = "Only A-Z, a-z, 0-9 and _ allowed in" + name;
					errElem.appendChild(li);
				}
				else if (name == "email" && val && !emailRegex.test(val)) {
					li.innerHTML = "Formart should be example@domain.ext";
					errElem.appendChild(li);
				}
				if (!val) track++;
			});

			var fSubmit = document.querySelectorAll("form > input[type='submit']")[0];
			if(track == 0 && !errElem.innerHTML.trim()) {
				fSubmit.removeAttribute("disabled");
			} else {
				fSubmit.setAttribute("disabled", "disabled");
			}
		})
		element.addEventListener("focusout", function () {
			errElem.innerHTML = "";
		})
	}

});

Array.prototype.slice.call(document.getElementsByTagName("form")).forEach(form => {
	form.addEventListener("submit", (e) => {
		e.preventDefault();
		var formData = getFormData(form)
		post("routes/auth/"+form.parentElement.id.substr(5)+".php", formData)
		.then(res => {
			try {
				var response = JSON.parse(res);
				if (response.form_error) {
					var errElem = document.getElementById("form-error");
					errElem.innerHTML = response.form_error;
				} else if(response.error) {
					error(res);
				} else {
					window.location.href = "http://"+window.location.hostname;
				}
			} catch (e) {
				if(res.trim()) {
					error(res);
				} else {
					window.location.href = "http://"+window.location.hostname;
				}
			}
		});
	})
});
</script>
