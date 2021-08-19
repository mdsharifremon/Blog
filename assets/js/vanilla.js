
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

	// /** Modal  */
	// const modalOpenBtn = document.getElementsByClassName("modal-open");
	// const modalCloseBtn = document.getElementsByClassName("modal-close");
	// /** Modal Open Button */
	// [...modalOpenBtn].forEach((btn) => {
	// 	document.addEventListener("click", btn, function () {
	// 		let modal = this.getAttribute("data-target");
	// 		document.querySelector(modal).classList.add("show");
	// 		document.querySelector(modal).setAttribute("area-hidden", false);
	// 	});
	// });
	// /** MOdal Close Button  */
	// [...modalCloseBtn].forEach((btn) => {
	// 	document.addEventListener("click", btn, function () {
	// 		let targetModal = this.closest(".modal");
	// 		targetModal.classList.remove("show");
	// 		targetModal.setAttribute("area-hidden", true);
	// 	});
	// });

	/** @Modal  */
	/** @Modal_Open_Button */
		$(document).on("click", ".modal-open", function () {
			let modal = $(this).data("target");
			$(modal).addClass("show");
			$(modal).attr("area-hidden", false);
		});

	/** @MOdal_Close_Button  */

		$(document).on("click", ".modal-close", function () {
			let targetModal = $(this).closest(".modal");
			targetModal.removeClass("show");
			targetModal.attr("area-hidden", true);
		});

    /** @Modal_Hide_Function */
	function modal_hide(modal) {
		const Modal = document.getElementById(modal);
		if (Modal.classList.contains("show")) {
			Modal.classList.remove("show");
		}
    }

	
	/** Alert  */
	$(document).on("click", ".alert-close", function () {
		let alertBox = $(this).parent(".alert-dismissible");
		alertBox.style.opacity = 0.5;
		alertBox.remove();

	});


	
