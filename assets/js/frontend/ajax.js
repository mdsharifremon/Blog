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
					$("#add-post-btn").val("Save Post");
				}
			}
		});
	});

	/**
	 * @Fetch_Comments_Ajax_Request
	 *  */
	function fetchComments() {
		$.ajax({
			
		})
		
	}
	fetchComments();




	/**
	 * @Insert_Comments_Ajax_Request
	 */
	$(document).on("click", ".post-comment-btn", function () {
		let postId = $(this).data("postid");
		let inputField = $(this).prev(".comment-input");
		let comment = inputField.val();
		if (comment == '') {
			Swal.fire({
				title: "Please write some text to post a comment",
				icon : "error"
			})
		} else {
			$.ajax({
				url: "php/actions.php",
				method: "POST",
				data: { postId: postId, comment: comment, action: "postComment" },
				success: function (data) {
					if (data == 1) {
						inputField.val('').attr("placeholder", "Share more");
						Swal.fire({
							title: "Thanks! You've shared your thought",
							icon: "success",
						});
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
		let type = 'add';
		if ($(this).hasClass('loved')) {
			type = 'sub';
			$(this).removeClass('loved');
		} else {
			type = 'add';
			$(this).addClass('loved');
		}
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { postId: postId, type: type, action: "love" },
			success: function (data) {}
		})

		
	})



})