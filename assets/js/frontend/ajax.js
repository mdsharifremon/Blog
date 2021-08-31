jQuery(document).ready(function ($) {
	/** @login  */
	$(document).on("click", "#login-btn", function (e) {
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

	/** @Fetch_Popular_Posts */
	function fetchPopularPosts() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "fetchPopularPosts" },
			success: function (data) {
				$("#popular-posts").html(data);
			},
		});
	}
	fetchPopularPosts();

	/**
	 * @Insert_Posts_Ajax_Request
	 */

	$("#add-post-form").submit(function (e) {
		e.preventDefault();
		$("#add-post-btn").val("Please wait...");
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				console.log(data);
				if (data == 1) {
					$("#add-post-btn").val("Save Post");
					$("#add-post-form")[0].reset();
					Swal.fire({
						title: "Post added successfully",
						icon: "success",
					});

					modal_hide("addPostModal");
					fetchPosts();
					fetchRecentPosts();
				} else {
					$("#add-post-err").html(data);
					$("#add-post-btn").val("Save Post");
				}
			},
		});
	});

	/**
	 * @Fetch_Comments_Ajax_Request
	 *  */
	function fetchComments(postId) {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { postId: postId, action: "fetchComment" },
			success: function (res) {
				$("#comment-plate").html(res);
			},
		});
	}
	/**
	 * @Insert_Comments_Ajax_Request
	 */
	$(document).on("click", ".post-comment-btn", function () {
		let postId = $(this).data("postid");
		let inputField = $(this).prev(".comment-input");
		let comment = inputField.val();
		if (comment == "") {
			Swal.fire({
				title: "Please write some text to post a comment",
				icon: "error",
			});
		} else {
			$.ajax({
				url: "php/actions.php",
				method: "POST",
				data: { postId: postId, comment: comment, action: "postComment" },
				success: function (data) {
					if (data == 1) {
						inputField.val("").attr("placeholder", "Share more");
						Swal.fire({
							title: "Thanks! You've shared your thought",
							icon: "success",
						});

						if ($("#comment-plate") != "" && $("#comment-plate" != undefined)) {
							fetchComments(postId);
						}
					} else {
						Swal.fire({
							title: data,
							icon: "error",
						});
					}
				},
			});
		}
	});

	/** @Loved_And_Unloved_Ajax_Request */
	$(document).on("click", ".loves.logged", function () {
		let postId = $(this).data("postid");
		let type = "add";
		if ($(this).hasClass("loved")) {
			type = "sub";
			$(this).removeClass("loved");
		} else {
			type = "add";
			$(this).addClass("loved");
		}
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { postId: postId, type: type, action: "love" },
			success: function (data) {},
		});
	});

	/** @View_Post_Ajax_Request */

	$(document).on("click", ".view-post", function () {
		let postId = $(this).data("postid");
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { postId: postId, action: "viewPost" },
			success: function (res) {
				$("#view-modal-details").html(res);
				fetchComments(postId);
			},
		});
	});

	/** @Delete_Post_Ajax_Request */
	$(document).on("click", ".delete-post", function () {
		let postId = $(this).data("postid");

		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to revert this post",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#EF4444",
			cancelButtonColor: "#2563EB",
			confirmButtonText: `Delete`,
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "php/actions.php",
					method: "POST",
					data: { postId: postId, action: "deletePost" },
					success: function (res) {
						if (res == 1) {
							Swal.fire("Post has been deleted", "", "success");
							fetchPosts();
						} else {
							Swal.fire("Ops! Post isn't deleted. Try again.", "", "error");
						}
					},
				});
			}
		});
	});

	/** @Delete_COMMENT_Ajax_Request */
	$(document).on("click", ".delete-comment", function () {
		let commentId = $(this).data("commentid");
		let postId = $(this).data("postid");
		Swal.fire({
			title: "Are you sure?",
			showCancelButton: true,
			confirmButtonColor: "#2563EB",
			cancelButtonColor: "#EF4444",
			confirmButtonText: `Confirm`,
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "php/actions.php",
					method: "POST",
					data: { commentId: commentId, action: "deleteComment" },
					success: function (res) {
						if (res == 1) {
							fetchComments(postId);
						} else {
							Swal.fire("Ops! comment isn't deleted. Try again.", "error");
						}
					},
				});
			}
		});
	});

	/** @Show_Posts_By_Category */
	$(document).on("click", ".category-id ", function () {
		let catId = $(this).data("id");
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { catId: catId, action: "postByCategory" },
			success: function (res) {
				$("#all-posts").html(res);
			},
		});
	});

	/** @Show_Posts_By_TagName */
	$(document).on("click", ".tag-id ", function () {
		let tagId = $(this).data("id");
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { tagId: tagId, action: "postByTag" },
			success: function (res) {
				$("#all-posts").html(res);
			},
		});
	});
})

