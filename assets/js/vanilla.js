
 document.querySelector("#open_sidebar").addEventListener("click", function () {
		document.querySelector("#sidebar").classList.remove("-left-80");
		document.querySelector("#sidebar").classList.add("left-0");
		document.querySelector("#sidebar_wrapper").classList.remove("opacity-0");
		document.querySelector("#sidebar_wrapper").classList.remove("invisible");
 });

 document.body.addEventListener("click", function (e) {
		if (e.target.id === "sidebar_wrapper") {
			document.querySelector("#sidebar").classList.add("-left-80");
			document.querySelector("#sidebar").classList.remove("left-0");
			document.querySelector("#sidebar_wrapper").classList.add("opacity-0");
			document.querySelector("#sidebar_wrapper").classList.add("invisible");
		}
 });

    const modalOpenBtn = document.getElementsByClassName("modal-open");
	const modalCloseBtn = document.getElementsByClassName("modal-close");
		/** Modal Open Button */
		[...modalOpenBtn].forEach((btn) => {
			btn.addEventListener("click", function () {
				let modal = this.getAttribute("data-target");
				document.querySelector(modal).classList.add("show");
				document.querySelector(modal).setAttribute("area-hidden", false);
			});
		});
		/** MOdal Close Button  */
		[...modalCloseBtn].forEach((btn) => {
			btn.addEventListener("click", function () {
				let targetModal = this.closest(".modal");
				targetModal.classList.remove("show");
				targetModal.setAttribute("area-hidden", true);
			});
		});
	