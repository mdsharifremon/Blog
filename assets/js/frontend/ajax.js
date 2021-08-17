jQuery(document).ready(function ($) {
	/**
	 * @Fetch Categories
	 */

	function fetchCategories() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "fetchCategories" },
            success: function (data) {
                console.log(data);
            },
		});
	}
	fetchCategories();

	/**
	 * @Fetch Tags
	 */

	function fetchTags() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "fetchTags" },
            success: function () {
                
            },
		});
	}
	fetchTags();
})