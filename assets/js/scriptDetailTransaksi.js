document.addEventListener("DOMContentLoaded", () => {
	const inputTerjual = document.getElementsByClassName("terjual");
	const inputSisa = document.getElementsByClassName("sisa");
	const inputTotal = document.getElementsByClassName("total");
	const totalPendapatan = document.getElementById("totalPendapatan");
	const btnHitungTotal = document.getElementById("hitungTotal");

	let n = inputTerjual.length;
	for (let i = 0; i < n; i++) {
		inputTerjual[i].addEventListener("input", (e) => {
			let qty = e.target.attributes["max"].value;
			inputSisa[i].value = parseInt(qty) - parseInt(e.target.value);
			let harga = e.target.attributes["data-harga"].value;
			inputTotal[i].value = parseInt(harga) * parseInt(e.target.value);
		});
	}
	const hitungTotalPendapatan = () => {
		let n = inputTotal.length;
		let sum = 0;
		for (let i = 0; i < n; i++) {
			sum += parseInt(inputTotal[i].value);
		}
		return sum;
	};

	totalPendapatan.addEventListener("focus", () => {
		totalPendapatan.setAttribute("value", hitungTotalPendapatan());
	});
	btnHitungTotal.addEventListener("click", () => {
		totalPendapatan.setAttribute("value", hitungTotalPendapatan());
	});
});
