jQuery(document).ready(function ($) {
	/** @login  */
	$(document).on('click',"#login-btn", function (e) {
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
						// setTimeout(() => $(".alert-dismissible").remove(), 15000);
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
				$("#all-posts").html(data);
			},
		});
	}
	fetchPosts();
	
	/** @Fetch_Recent_Posts */
	function fetchRecentPosts() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "fetchRecentPosts" },
			success: function (data) {
				$("#recent-posts").html(data);
			},
		});
	}
	fetchRecentPosts();


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
				console.log(data);
				if(data == 1){
					$("#add-post-btn").val("Save Post");
					$("#add-post-form")[0].reset();
					Swal.fire({
						title: "Post added successfully",
						icon : "success",
					})

					modal_hide("addPostModal");
					fetchPosts();
					fetchRecentPosts();
				} else{	
					$("#add-post-err").html(data);
					// setTimeout(() => $(".alert-dismissible").remove(), 10000);
					$("#add-post-btn").val("Save Post");
				}
			}
		});
	});


	/**
	 * Write Comments
	 */
	$(document).on("click", ".post-comment-btn", function () {
		let postId = $(this).data("postId");
		let comment = $(this).prev(".comment-input").val();

		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { postId: postId, comment: comment, action: "postComment" },
			success: function (data) {
				alert(data);
			}
		})
	});



})