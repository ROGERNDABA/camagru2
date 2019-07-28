function load(elem, url) {
	var request = new XMLHttpRequest();
	request.open('GET', url, true);
	request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	request.onreadystatechange = function() {
		if (request.status == 200 && request.readyState == 4) {
			var resp = request.responseText;
			const parse = Range.prototype.createContextualFragment.bind(document.createRange());
			document.querySelectorAll(elem).forEach((element) => {
				element.innerHTML = '';
				element.appendChild(parse(resp));
			});
		}
	};
	request.send();
}

document.addEventListener('DOMContentLoaded', function() {});
