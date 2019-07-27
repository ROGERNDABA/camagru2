function load(elem, url) {
	var request = new XMLHttpRequest();
	request.open('GET', url, true);
	request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	request.onreadystatechange = function () {
		if (request.status == 200 && request.readyState == 4) {
			var resp = request.responseText;
			console.log(resp);
			alert(resp);
			// var result = resp.match(/(?<=\<script\>).*?(?=\<\/script\>)/imgs);
			document.querySelectorAll(elem).forEach(element => {
				element.innerHTML = resp;
			});
			// eval(result);
		}
	};
	request.send();
}


document.addEventListener("DOMContentLoaded", function () {
});