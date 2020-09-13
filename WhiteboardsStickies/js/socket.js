async function setData(obj) {
	let response = await fetch('./server.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json;charset=utf-8'
		},
		body: JSON.stringify({ head: "set", data: obj })
	});
}

async function getData() {
	let response = await fetch('./server.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json;charset=utf-8'
		},
		body: JSON.stringify({ head: "get" })
	});

	let result = await response.json();
	return result;
}
setInterval(function() {
	changeApp();
}, 5000);

function changeApp() {
	getData().then(function(str) {
		let data = JSON.parse(str);
		app.stickers = data.stickers;
		app.circleStickers = data.circleStickers;
	});
}
changeApp();


function messageSend(obj) {
	setData(obj);
}