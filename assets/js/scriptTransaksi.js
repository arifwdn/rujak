document.addEventListener("DOMContentLoaded", () => {
	// Select Action Customer
	const idCustomerOpt = document.getElementById("id_customer");
	idCustomerOpt.addEventListener("change", (e) => {
		let selectedIndexCustomer = e.target.selectedIndex;
		let namaCustomer = e.target.options[selectedIndexCustomer].innerText.trim();
		let hpCustomer =
			e.target.options[selectedIndexCustomer].attributes["data-hp"].value;
		let lokasiCustomer =
			e.target.options[selectedIndexCustomer].attributes["data-lokasi"].value;
		let targetNamaCustomer = document.getElementById("namaCustomer");
		let targetNoHpCustomer = document.getElementById("noHpCustomer");
		let targetLokasiCustomer = document.getElementById("lokasiCustomer");
		targetNamaCustomer.innerText = namaCustomer;
		targetNoHpCustomer.innerText = hpCustomer;
		targetNoHpCustomer.attributes["href"].value = "https://wa.me/" + hpCustomer;
		targetLokasiCustomer.innerText = lokasiCustomer;
	});
	// Select Barang
	const pilihBarang = document.getElementById("pilihBarang");
	const btnAddBarang = document.getElementById("btnAddBarang");

	btnAddBarang.addEventListener("click", () => {
		let selectedIndexBarang = pilihBarang.selectedIndex;
		if (selectedIndexBarang === 0) {
			alert("Barang belum dipilih");
			return 0;
		}
		let idBarang = pilihBarang.options[selectedIndexBarang].value;
		let namaBarang = pilihBarang.options[selectedIndexBarang].innerText.trim();
		let hargaBarang =
			pilihBarang.options[selectedIndexBarang].attributes["data-harga"].value;
		let satuanBarang =
			pilihBarang.options[selectedIndexBarang].attributes["data-satuan"].value;
		let stokBarang =
			pilihBarang.options[selectedIndexBarang].attributes["data-stok"].value;
		pilihBarang.options[selectedIndexBarang].setAttribute("disabled", "");
		btnAddBarang.setAttribute("disabled", "");

		// Node Table
		let no = 1;
		let tr = document.createElement("tr");
		let tdNo = document.createElement("td"); // 1. No
		tdNo.innerText = no;
		let tdIdBarang = document.createElement("td"); // 2. Id Barang
		let inputIdBarang = document.createElement("input");
		inputIdBarang.setAttribute("name", "id_barang[]");
		inputIdBarang.setAttribute("value", idBarang);
		inputIdBarang.setAttribute("style", "border: none; width: 50px");
		inputIdBarang.setAttribute("readonly", "");
		tdIdBarang.appendChild(inputIdBarang);
		let tdNamaBarang = document.createElement("td"); // 3. Nama Barang
		tdNamaBarang.innerText = namaBarang;
		let tdHargaBarang = document.createElement("td");
		tdHargaBarang.innerText = hargaBarang; // 4. Harga Barang
		let tdQty = document.createElement("td");
		let inputQty = document.createElement("input"); // 5. Quantity
		inputQty.setAttribute("name", "qty[]");
		inputQty.setAttribute("class", "form-control");
		inputQty.setAttribute("style", "width: 100px;");
		inputQty.setAttribute("type", "number");
		inputQty.setAttribute("min", 0);
		inputQty.setAttribute("max", stokBarang);
		tdQty.appendChild(inputQty);
		let tdTerjual = document.createElement("td");
		tdTerjual.innerText = "-";
		let tdSisa = document.createElement("td");
		tdSisa.innerText = "-";
		let tdDelete = document.createElement("td");
		let btnDelete = document.createElement("a");
		btnDelete.setAttribute("href", "#");
		btnDelete.setAttribute("class", "btn badge text-bg-danger");
		btnDelete.innerText = "-";
		let tdTotal = document.createElement("td");
		tdTotal.innerText = 0;
		tdDelete.appendChild(btnDelete);

		inputQty.addEventListener("input", (e) => {
			tdTotal.innerText = parseInt(hargaBarang) * parseInt(e.target.value);
		});

		tr.appendChild(tdNo);
		tr.appendChild(tdIdBarang);
		tr.appendChild(tdNamaBarang);
		tr.appendChild(tdHargaBarang);
		tr.appendChild(tdQty);
		tr.appendChild(tdTerjual);
		tr.appendChild(tdSisa);
		tr.appendChild(tdTotal);
		tr.appendChild(btnDelete);
		const containerBarang = document.getElementById("containerBarang");
		containerBarang.appendChild(tr);
	});
	pilihBarang.addEventListener("change", () => {
		btnAddBarang.removeAttribute("disabled");
	});
});
