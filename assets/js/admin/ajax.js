jQuery(document).ready(function ($) {

	/**
	 * @FetchCategory
	 *
	 * *********************/
	function fetchCategory() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "fetchCategory" },
			success: function (data) {
				$("#categoryData").html(data);
			},
		});
	}
	fetchCategory();

	/**
	 * @AddCategory
	 *
	 * *********************/
	$("#save-category-btn").click(function (e) {
		if ($("#add-category-form")[0].checkValidity()) {
			e.preventDefault();
			$("#save-category-btn").text("Please Wait...");
			$.ajax({
				url: "php/actions.php",
				method: "POST",
				data: $("#add-category-form").serialize() + "&action=add-category",
				success: function (data) {
					if (data == "inserted") {
						Swal.fire({
							title: "Category successfully added",
							icon: "success",
						});
						fetchCategory();
						$("#save-category-btn").text("Save");
						$("#add-category-form")[0].reset();
						modal_hide("addCategoryModal");
						
						
					} else {
						$("#category-err").html(data);
						hide_alert(5000);
						$("#save-category-btn").text("Save");
					}
				},
			});
		}
	});

	/**
	 * @FetchTags
	 *
	 * *********************/
	function fetchTag() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "fetchTag" },
			success: function (data) {
				$("#tagData").html(data);
			},
		});
	}
	fetchTag();

	/**
	 * @AddTag
	 *
	 * *********************/
	$("#save-tag-btn").click(function (e) {
		if ($("#add-tag-form")[0].checkValidity()) {
			e.preventDefault();
			$("#save-tag-btn").text("Please Wait...");
			$.ajax({
				url: "php/actions.php",
				method: "POST",
				data: $("#add-tag-form").serialize() + "&action=add-tag",
				success: function (data) {
					if (data == "inserted") {
						Swal.fire({
							title: "Tag successfully added",
							icon: "success",
						});
						fetchTag();
						modal_hide("addTagModal");
						$("#save-tag-btn").text("Save");
						$("#add-tag-form")[0].reset();
					} else {
						$("#tag-err").html(data);
						hide_alert(5000);
						$("#save-tag-btn").text("Save");
					}
				},
			});
		}
	});
})