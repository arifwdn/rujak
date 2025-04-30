document.addEventListener("DOMContentLoaded", () => {
	const inputTerjual = document.getElementsByClassName("terjual");
	const inputSisa = document.getElementsByClassName("sisa");
	const inputTotal = document.getElementsByClassName("total");

	let n = inputTerjual.length;
	for (let i = 0; i < n; i++) {
		inputTerjual[i].addEventListener("input", (e) => {
			let qty = e.target.attributes["max"].value;
			inputSisa[i].value = parseInt(qty) - parseInt(e.target.value);
			let harga = e.target.attributes["data-harga"].value;
			inputTotal[i].value = parseInt(harga) * parseInt(e.target.value);
		});
	}

	const totalPendapatan = document.getElementById("totalPendapatan");
	const btnHitungTotal = document.getElementById("hitungTotal");

	const hitungTotalPendapatan = () => {
		let n = inputTotal.length;
		let sum = 0;
		for (let i = 0; i < n; i++) {
			sum += parseInt(inputTotal[i].getAttribute("value"));
		}
		totalPendapatan.setAttribute("value", sum);
	};

	totalPendapatan.addEventListener("focus", hitungTotalPendapatan);
	btnHitungTotal.addEventListener("click", hitungTotalPendapatan);
});
