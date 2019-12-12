$('document').ready(function () {
    $('#newsletter-form').click(function(e){
        e.preventDefault();
        $('#newsletter-response-text').text('Working');
        $('#newsletterDialog').modal('show');
    });
});