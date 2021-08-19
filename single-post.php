<?php

/**
 * @param Single_Post_Page
 */


require_once "php/config.php";

/** User Sessions  */
require_once "php/session.php";

if (isset($_GET['post_id']) && $_GET['post_id'] != '') {
    $post_id = $_GET['post_id'];
} else {
    header('Location:' . BASE_URL);
}

/** Header */
require_once "template_parts/header.php";

/** Main Content */
require_once "template_parts/single-main-content.php";

/** Mobile Menu */
require_once "template_parts/mobile-menu.php";

/** Footer */
require_once "template_parts/footer.php";

?>

<!-- <script>
    jQuery(document).ready(function($) {
        /**
         * @Insert_Comments_Ajax_Request
         */
        $(document).on("click", ".post-comment-btn", function() {
            let postId = $(this).data("postid");
            let inputField = $(this).prev(".comment-input");
            let comment = inputField.val();
            if (comment == '') {
                Swal.fire({
                    title: "Please write some text to post a comment",
                    icon: "error"
                })
            } else {
                $.ajax({
                    url: "php/actions.php",
                    method: "POST",
                    data: {
                        postId: postId,
                        comment: comment,
                        action: "postComment"
                    },
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire({
                                title: "Thanks! You've shared your thought",
                                icon: "success",
                            });
                            location.reload();
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

    })
</script> -->
</body>

</html>