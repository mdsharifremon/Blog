jQuery(document).ready(function ($) {
	/**********************
	 *
	 *    fetch Taxonomy
	 *
	 * *********************/
	function show_taxonomy() {
		$.ajax({
			url: "php/actions.php",
			method: "POST",
			data: { action: "show-taxonomy" },
			success: function (data) {
				$("#taxonomyData").html(data);
			},
		});
	}
	show_taxonomy();

	/**********************
	 *
	 *    Add Taxonomy
	 *
	 * *********************/
	$("#save-taxonomy").click(function (e) {
		if ($("#taxonomyForm")[0].checkValidity()) {
			e.preventDefault();
			$("#save-taxonomy").text("Please Wait...");
			$.ajax({
				url: "php/actions.php",
				method: "POST",
				data: $("#taxonomyForm").serialize() + "&action=add-taxonomy",
				success: function (data) {
					if (data == "inserted") {
						Swal.fire({
							title: "Taxonomy successfully added",
							icon: "success",
						});
						modal_hide("addTaxonomyModal");
						$("#save-taxonomy").text("Save");
						$("#taxonomyForm")[0].reset();
					} else {
						$("#add-taxonomy-err").html(data);
						hide_alert(5000);
						$("#save-taxonomy").text("Save");
					}
				},
			});
		}
	});
})