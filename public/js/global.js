function load(elem, url) {
	var request = new XMLHttpRequest();
	request.open('GET', url, true);
	request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	request.onreadystatechange = function () {
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

function post(url, data, options = 0) {
	return new Promise(function (res, rej) {
		var request = new XMLHttpRequest();
		request.open('POST', url, true);
		// request.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
		request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		request.onreadystatechange = function () {
			if (request.status == 200 && request.readyState == 4) {
				res(request.responseText);
			}
		};
		request.onerror = function () {
			rej('error');
		};
		request.send(data);
	});
}

function getFormData(form) {
	var formData = "";
	Object.values(form).map((elem) => {
		formData += elem.name + "=" + elem.value;
		formData += "&";
	});
	return formData.substring(0, formData.length - 1);
}

function error(errorMsg) {
	setTimeout(function () {
		alert("Hello");
	}, 3000);
}

function toTitleCase(str) {
	return str.replace(
		/\w\S*/g,
		function (txt) {
			return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
		}
	);
}

document.addEventListener('DOMContentLoaded', function () { });
