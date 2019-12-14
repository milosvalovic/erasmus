$(document).ready(function () {


    $("#editUniversityImageInput").change(function () {
        readURL(this);
    });

    $('#generateRandomPassBtn').click(function (e) {
        e.preventDefault();
        var randomPass = randomPassword();
        $('#addUserPassword').val(randomPass);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#editUniversityImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    /*----------------------Section for animations in edit Review-----------------------------------------------------*/
    var reviewImage = $('.review--image');
    var animationFadeInUp = 'animated fadeInUp faster';
    var animationFadeInOut = 'animated fadeOutUp faster';
    var newImageHoverSettings = {
        'opacity': '0.6',
        'border-radius': '10px',
        'transform': 'scale(1.1',
        'cursor': 'default'
    };

    reviewImage.each(function () {
        $(this).mouseover(function () {
            const imageItem = $(this).children('img.review-image-item');
            const imageDeleteIcon = $(this).children('img.review-delete-icon');
            const imageRevertIcon = $(this).children('img.review-revert-icon');

            if(imageDeleteIcon.length == 1) {
                imageDeleteIcon.removeClass(animationFadeInOut);
                imageDeleteIcon.css({"display": "none"});
                imageItem.css(newImageHoverSettings);
                imageDeleteIcon.css({"display": "flex"});
                imageDeleteIcon.addClass(animationFadeInUp)
            } else {
                imageRevertIcon.removeClass(animationFadeInOut);
                imageRevertIcon.css({"display": "none"});
                imageItem.css(newImageHoverSettings);
                imageRevertIcon.css({"display": "flex"});
                imageRevertIcon.addClass(animationFadeInUp);
            }
            var deleted = false;
            imageDeleteIcon.on('click', function () {
                var imageId = $(this).data('id');

                var path = '/admin/reviews/delete/' + imageId + '/';
                if (!deleted) {
                    deleted = true;
                    $.ajax({
                        url: path,
                        type: "get",
                        dataType: 'json',
                        success: function (result) {
                            console.log(result);
                            imageDeleteIcon.css({display: 'none'});
                            imageItem.css({'width': '30px', 'height': '30px'});
                            setTimeout(function () {
                                imageItem.css({display: 'none'});
                            }, 1000);

                        },
                        error: function (xhr, resp, text) {
                            console.log(xhr, resp, text);
                        }
                    });

                }

            });

            imageRevertIcon.on('click', function () {
                var imageId = $(this).data('id');

                var path = '/admin/reviews/revert/' + imageId + '/';
                if (!deleted) {
                    deleted = true;
                    $.ajax({
                        url: path,
                        type: "get",
                        dataType: 'json',
                        success: function (result) {
                            location.reload();
                        },
                        error: function (xhr, resp, text) {
                            console.log(xhr, resp, text);
                        }
                    });

                }

            });
        });
    });

    reviewImage.each(function () {
        $(this).mouseleave(function () {
            const imageItem = $(this).children('img.review-image-item');
            const imageDeleteIcon = $(this).children('img.review-delete-icon');
            const imageRevertIcon = $(this).children('img.review-revert-icon');
            if(imageDeleteIcon.length == 1) {
                imageDeleteIcon.removeClass(animationFadeInUp);
                imageItem.css('opacity', '1');
                imageItem.css('border-radius', '0');
                imageItem.css('transform', 'scale(1)');
                imageDeleteIcon.addClass(animationFadeInOut);
            } else {
                imageRevertIcon.removeClass(animationFadeInUp);
                imageItem.css('opacity', '1');
                imageItem.css('border-radius', '0');
                imageItem.css('transform', 'scale(1)');
                imageRevertIcon.addClass(animationFadeInOut);
            }
        });
    });
    /*----------------------End of Section----------------------------------------------------------------------------*/
});

function randomPassword() {
    var chars = "abcdefghijklmnopqrstuvwxyz!@_-+ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < 6; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}