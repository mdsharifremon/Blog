jQuery(document).ready(function ($) {
    $("#admin-option").click(function () {
			$(".admin-card").fadeToggle(200);
		});

})

		/** Modal  */
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
		/** Modal Hide */
		function modal_hide(modal) {
			const Modal = document.getElementById(modal);
			if (Modal.classList.contains("show")) {
				Modal.classList.remove("show");
			}
        }
		
		

		/** Alert  */
		const AlertClose = document.getElementsByClassName("alert-close");
		[...AlertClose].forEach(closeBtn => {
					closeBtn.addEventListener('click', function () {
						let alertBox = closeBtn.closest(".alert-dismissible");
						alertBox.style.opacity = 0.5;
						setTimeout(() => {
							alertBox.remove();
						}, 300);	
					})
		})

		/** Hide Alert With Time */
		function hide_alert(time = null) {
			time = (time !== null) ? time : 2000;
			setTimeout(() => {
				let AlertBox = document.getElementsByClassName("alert-dismissible");
				[...AlertBox].forEach(alert => alert.remove());
			}, time);
		}
				