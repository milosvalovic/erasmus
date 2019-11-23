$('document').ready(function () {
    $("#sign-up-mobility").submit(function (e) {

        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function (data) {
                var response = JSON.parse(data);
                if (response.status == "success") {
                    window.location.href = response.url;
                } else if (response.status == "error") {

                }
            }
        });
    });

    $(".sub-navigation").hide();
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.sub-navigation').fadeIn();
            } else {
                $('.sub-navigation').fadeOut();
            }
        });
    });


    $("a[rel=example_group]").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none',
        'titlePosition': 'over'
    });
});