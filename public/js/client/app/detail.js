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
                    $('#messeageDialog').text('Úspech');
                    $('#response-text').text(response.reason);
                    $('#messeageDialog').modal('show');
                } else if (response.status == "error") {
                    $('#messeageDialog').text('Chyba');
                    $('#response-text').text(response.reason);
                    $('#messeageDialog').modal('show');
                }
            }
        });
    });

    lightGallery(document.getElementById('lightgallery'));
});