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


    /*----------------------Section for animations in edit review-----------------------------------------------------*/
    var reviewImage = $('.review--image');
    var animationFadeInUp = 'animated fadeInUp faster';
    var animationFadeInOut = 'animated fadeOutUp faster';
    var animationFadeOut = 'animated fadeOut Slow';
    var newImageHoverSettings = {
        'opacity': '0.5',
        'border-radius': '10px',
        'transform': 'scale(1.1)',
        'cursor': 'default'
    };
    var imageDeletedCss = {'opacity': '0.5'};

    reviewImage.each(function () {
        if($(this).children('img.review-delete-icon').length == 0){
            $(this).children('img.review-image-item').css(imageDeletedCss);
        }

        $(this).mouseover(function () {
            const imageItem = $(this).children('img.review-image-item');
            const imageDeleteIcon = $(this).children('img.review-delete-icon');
            const imageRevertIcon = $(this).children('img.review-revert-icon');
            const loadingSpinner = $(this).children('#spinnerDeleteReviewImage');
            const successDeleteIcon = $(this).children('#successDeleteReviewImage');
            const errorDeleteIcon = $(this).children('#errorDeleteReviewImage');

            if(imageDeleteIcon.length == 1) {
                imageDeleteIcon.removeClass(animationFadeInOut);
                imageDeleteIcon.css({"display": "none"});
                imageItem.css(newImageHoverSettings);
                imageDeleteIcon.css({"display": "flex"});
                imageDeleteIcon.addClass(animationFadeInUp)

            } else {
                // imageRevertIcon.removeClass(animationFadeInOut);
                imageRevertIcon.css({"display": "none"});
                imageItem.css(newImageHoverSettings);
                imageRevertIcon.css({"display": "flex"});
                // imageRevertIcon.addClass(animationFadeInUp);
            }

            var deleted = false;
            imageDeleteIcon.unbind().one('click', function () {
                var imageId = $(this).data('id');
                var path = '/admin/reviews/delete/' + imageId;

                imageDeleteIcon.remove();
                loadingSpinner.css({'display':'block'});
                imageItem.css(newImageHoverSettings);

                if (!deleted) {
                    deleted = true;
                    $.ajax({
                        url: path,
                        type: "get",
                        dataType: 'json',
                        success: function (result) {
                            setTimeout(function () {
                                imageItem.addClass(animationFadeOut);
                                loadingSpinner.css({'display':'none'});
                                successDeleteIcon.css({'display': 'block'});
                            }, 2000);
                        }, error: function (error) {
                            setTimeout(function () {
                                loadingSpinner.css({'display':'none'});
                                errorDeleteIcon.css({'display': 'block'});
                                imageItem.css({'opacity': '1'});
                            }, 2000);
                        }
                    });
                }
            });

            imageRevertIcon.on('click', function () {
                var imageId = $(this).data('id');
                var path = '/public/admin/reviews/revert/' + imageId;

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
                // imageRevertIcon.removeClass(animationFadeInUp);
                // imageItem.css('opacity', '1');
                imageItem.css('border-radius', '0');
                imageItem.css('transform', 'scale(1)');
                // imageRevertIcon.addClass(animationFadeInOut);
            }
        });
    });
    /*----------------------Section End edit review----------------------------------------------------------------------------*/



    /*----------------------Section season list-----------------------------------------------------------------------*/
    $('#reset').on('click', function () {
        setDefaultFilter();
    });

    function setDefaultFilter() {
        $('#sort option:first').prop('selected',true);
        $('#sortType option:first').prop('selected',true);
        $('#category option:first').prop('selected',true);
        $('#type option:first').prop('selected',true);
        $('#universities option:first').prop('selected',true);
        $('#fromInput').val('');
        $('#toInput').val('');
        $('#active').prop('checked',true);
        $('#sortSeasonDeleted').prop('checked',false);
    }
    /*----------------------Section End----------------------------------------------------------------------------*/

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