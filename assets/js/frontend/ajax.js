jQuery(document).ready(function ($) {
	/**
	 * @Fetch Post
	 */

	function fetchPosts() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "fetchCategories" },
            success: function (data) {
                console.log(data);
            },
		});
	}
	fetchPosts();

	/**
	 * @Insert Posts
	 */


})