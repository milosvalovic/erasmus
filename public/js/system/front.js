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

    /*----------------------Section for My Profile-----------------------------------------------------*/
    $("#newsletter_active").change(function () {
        $('#myProfileChangesError').hide();
        $('#myProfileChangesSuccess').hide();
        var state = 0;

        if ($(this).prop("checked") == true)
            state = 1;
        else
            state = 0;


        $.ajax({
            url: '/admin/newsleter_state/' + state,
            type: "get",
            dataType: 'json'
        });
    });
        $('#spinnerProfileDetail').show();

            $.ajax({
                url: '/public/admin/newsleter_state/'+state,
                type: "get",
                dataType: 'json',
                success: function (result) {
                }, error: function (response) {
                    console.log(response);
                    if(response.status ==200){
                        setTimeout(function () {
                            $('#spinnerProfileDetail').hide();
                            $('#myProfileChangesSuccess').show();
                        }, 1500);
                    } else {
                        setTimeout(function () {
                            $('#spinnerProfileDetail').hide();
                            $('#myProfileChangesError').show();
                        }, 1500);
                    }

                }
            });


    });
    /*----------------------End of Section----------------------------------------------------------------------------*/


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
        if ($(this).children('img.review-delete-icon').length == 0) {
            $(this).children('img.review-image-item').css(imageDeletedCss);
        }

        $(this).mouseover(function () {
            const imageItem = $(this).children('img.review-image-item');
            const imageDeleteIcon = $(this).children('img.review-delete-icon');
            const imageRevertIcon = $(this).children('img.review-revert-icon');
            const loadingSpinner = $(this).children('#spinnerDeleteReviewImage');
            const successDeleteIcon = $(this).children('#successDeleteReviewImage');
            const errorDeleteIcon = $(this).children('#errorDeleteReviewImage');

            if (imageDeleteIcon.length == 1) {
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
                loadingSpinner.css({'display': 'block'});
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
                                loadingSpinner.css({'display': 'none'});
                                successDeleteIcon.css({'display': 'block'});
                            }, 2000);
                        }, error: function (error) {
                            setTimeout(function () {
                                loadingSpinner.css({'display': 'none'});
                                errorDeleteIcon.css({'display': 'block'});
                                imageItem.css({'opacity': '1'});
                            }, 2000);
                        }
                    });
                }
            });

            imageRevertIcon.on('click', function () {
                var imageId = $(this).data('id');
                var path = '/admin/reviews/revert/' + imageId;

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
            if (imageDeleteIcon.length == 1) {
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


    /*----------------------Section Users list-----------------------------------------------------------------------*/

    var pageUsers = 0;

    $("#loadNextUsers").hide();
    $("#loadPrevUsers").hide();

    $("#loadNextUsers").click(function () {
        pageUsers++;
        $("#pageUsers").val(pageUsers);
        loadUsersData();
    });

    $("#loadPrev").click(function () {
        pageUsers--;
        $("#pageUsers").val(pageUsers);
        loadUsersData();
    });

    loadUsersData();

    function loadUsersData() {
        $.ajax({
            url: "/admin/users/search",
            type: "POST",
            dataType: 'json',
            data: $("#userSearchForm").serialize(),
            success: function (result) {
                console.log(result);
                $("#main_users_table tbody").empty();
                setUsersTable(result);


                if (result.count <= (1 + pageUsers) * 15) {
                    $("#loadNextUsers").hide();
                } else {
                    $("#loadNextUsers").show();
                }
                if (pageUsers === 0) {
                    $("#loadPrevUsers").hide();
                } else {
                    $("#loadPrevUsers").show();
                }
            },
            error: function (xhr, resp, text) {
                console.log(xhr, resp, text);
            }
        });
    }

    function setUsersTable(res) {
        res.data.forEach(function (element) {
            console.log(element);
            $("#main_users_table > tbody:last-child").append(
                "<tr>"
                + "<td>" + element.ID + "</td>"
                + "<td><a class=\"admin-blog-table\" href = \"" + "/admin/users/detail/" + element.ID + "\" >" + element.first_name + "</a></td>"
                + "<td><a class=\"admin-blog-table\" href = \"" + "/admin/users/detail/" + element.ID + "\" >" + element.last_name + "</a></td>"
                + "<td>" + element.email + "</td>"
                + "<td>" + element.roles.name + "</td>"
                + "<th scope=\"row\">" +
                "<a href=\"/admin/users/edit_user/" + element.ID + "\">" +
                "<button type=\"button\" class=\"btn btn-outline-warning\">Upraviť</button>" +
                "</a>" +
                "<a href=\"/admin/users/delete/" + element.ID + "\">" +
                "<button type=\"button\" class=\"btn btn-outline-danger\">Odstrániť</button>" +
                "</a>"
                + "</th></tr>"
            )
        });
        $("#main_users_table").fadeIn(1000, function () {

        });

    }


    $("#userSearchForm").submit(function (event) {

        pageUsers = 0;
        $("#pageUsers").val(pageUsers);

        $("#main_users_table tbody").empty();
        event.preventDefault();
        loadUsersData();

        return false;
    });

    /*----------------------Section end-----------------------------------------------------------------------*/

    /*----------------------Section season list-----------------------------------------------------------------------*/
    $('#reset').on('click', function () {
        setDefaultFilter();
    });

    function setDefaultFilter() {
        $('#sort option:first').prop('selected', true);
        $('#sortType option:first').prop('selected', true);
        $('#category option:first').prop('selected', true);
        $('#type option:first').prop('selected', true);
        $('#universities option:first').prop('selected', true);
        $('#fromInput').val('');
        $('#toInput').val('');
        $('#active').prop('checked', true);
        $('#sortSeasonDeleted').prop('checked', false);
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