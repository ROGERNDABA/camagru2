function load(elem, url) {
	var request = new XMLHttpRequest();
	request.open('GET', url, true);
	request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	request.onload = function () {
		if (request.status >= 200 && request.status < 400) {
			var resp = request.responseText;
			document.querySelector(elem).innerHTML = resp;
		}
	};
	request.send();
}

document.addEventListener("DOMContentLoaded", function () {
});