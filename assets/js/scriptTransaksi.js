document.addEventListener("DOMContentLoaded", () => {
	// Select Action Customer
	const idCustomerOpt = document.getElementById("id_customer");
	idCustomerOpt.addEventListener("change", (e) => {
		let namaCustomer = e.target.selectedOptions[0].innerText.trim();
		let hpCustomer = e.target.selectedOptions[0].attributes["data-hp"].value;
		let lokasiCustomer =
			e.target.selectedOptions[0].attributes["data-lokasi"].value;
		let targetNamaCustomer = document.getElementById("namaCustomer");
		let targetNoHpCustomer = document.getElementById("noHpCustomer");
		let targetLokasiCustomer = document.getElementById("lokasiCustomer");
		targetNamaCustomer.innerText = namaCustomer;
		targetNoHpCustomer.innerText = hpCustomer;
		targetLokasiCustomer.innerText = lokasiCustomer;
	});
});
