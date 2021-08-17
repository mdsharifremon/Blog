jQuery(document).ready(function ($) {

    /** User Sidebar Toggle */
    $('.login-handle').click(function () {
        $(".login-option").fadeToggle(300);
    })
    /** Dark Mode */
    $(".dark-mode-btn").click(function () {
        $(this).toggleClass('active');
        $('html').toggleClass('dark');

        if ($(".dark-mode-btn i").hasClass('fa-sun')) {
            $(".dark-mode-btn i").removeClass("fa-sun");
            $(".dark-mode-btn i").addClass("fa-moon");
        }else if($(".dark-mode-btn i").hasClass('fa-moon')) {
            $(".dark-mode-btn i").removeClass("fa-moon");
            $(".dark-mode-btn i").addClass("fa-sun");
        };
    });

    /** Image Uploader */
    const imageInput = $("#image");
    $(function () {
        imageInput.change(function () {
            /** Show Image */
            if (this.files && this.files[0]) {
                let files = this.files[0];
                let reader = new FileReader();
                reader.onload = (e) => {
					let img = `<img src="${e.target.result}" alt="post-image" class="uploaded-img" />`;
                    $("#uploader").html(img);
                    //Change Label Image
                    $("#file-label").text(files.name);
				};
                reader.readAsDataURL(this.files[0]);

                /** Show Error Message */
                if (files.size >= (1000 * 1024)) {
                    $("#image-error").text("Ops!! File Size Exceeds 1 mb. Choose another.");
                } 
            }			
		});
	});
    
})