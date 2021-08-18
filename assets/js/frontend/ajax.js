jQuery(document).ready(function ($) {
	/** @login  */
	$("#login-btn").click(function (e) {
		if ($("#login-form")[0].checkValidity()) {
			e.preventDefault();
			let btn = $(this);
			btn.val("Please wait");

			$.ajax({
				url: "php/actions.php",
				method: "POST",
				data: $("#login-form").serialize() + "&action=login",
				success: (data) => {
					if (data == "logged") {
						btn.val("Login");
						location.href = "index.php";
					} else {
						$("#login-error").html(data);
						setTimeout(() => $(".alert-dismissible").remove(), 15000);
						btn.val("Login");
					}
				},
			});
		}
	});
	/**
	 * @Fetch Post
	 */

	function fetchPosts() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "fetchPosts" },
			success: function (data) {
				console.log(data);
			},
		});
	}


	/**
	 * @Insert Posts
	 */

	$("#add-post-form").submit(function (e) {
		e.preventDefault();
		$('#add-post-btn').val('Please wait...');
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				if (data == 'posted') {
					modal_hide("addPostModal");
				} else {
					$("#add-post-err").html(data);
					setTimeout( ()=> $('.alert-dismissible').remove(), 10000);
				}
			}
		});
	});



})