$('document').ready(function () {
    $('#newsletter-form').click(function(e){
        e.preventDefault();

        $.get("/novinky", function (data) {
            let response = JSON.parse(data);

            $('#newsletter-response-text').text(response.reason);
            $('#newsletterDialog').modal('show');
        });
    });
});