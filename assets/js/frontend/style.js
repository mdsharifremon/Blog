jQuery(document).ready(function ($) {

    $('.login-handle').click(function () {
        $(".login-option").fadeToggle(300);
    })
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
    
})