<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Camagru</title>

	<link rel="stylesheet" href="public/css/index.css">
	<link rel="stylesheet" href="public/css/auth.css">
	<script src="public/js/global.js"></script>
</head>
<body>
	<nav class="navbar">
		<ul>
			<li><a class="nav-item" href="#home">Home</a></li>
			<li><a class="nav-item" href="#gallery">Gallery</a></li>
			<li><a class="nav-item" href="#booth">Booth</a></li>
			<li style="float:right"><a class="nav-item" href="#auth">Login or Signup</a></li>
			<li style="float:right"><a class="nav-item" href="#logout">Logout</a></li>
		</ul>
	</nav>
	<div id="error-container"></div>
	<div id="success-container"></div>
	<div class="container" id="dd"></div>
</body>
</html>

<script>
window.addEventListener("DOMContentLoaded", function() {
	if(window.location.hash) {
		var elem = document.querySelectorAll("a[href=\""+window.location.hash+"\"]");
		elem[0].classList.add("active");
		load(".container", "routes/"+ window.location.hash.substr(1));
	} else {
		var elem = document.querySelectorAll("a[href=\"#home\"]");
		elem[0].classList.add("active");
		load(".container", "routes/home");
	}

	var nav_links = document.getElementsByClassName("nav-item");
	for (let index = 0; index < nav_links.length; index++) {
		const element = nav_links[index];
		element.addEventListener("click", function () {
			for (let index = 0; index < nav_links.length; index++) {
				const element2 = nav_links[index];
				element2.classList.remove('active');
			}
			element.classList.add('active');
			load(".container", "routes/"+element.getAttribute("href").substr(1));
		})
	}
});
</script>
