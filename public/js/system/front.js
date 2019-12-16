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

    /*----------------------Section My Profile-----------------------------------------------------*/
    var newsletterCheckStatus = $('#newsletter_active').val();
    $("#newsletter_active").change(function () {
        $('#myProfileChangesError').hide();
        $('#myProfileChangesSuccess').hide();
        $('#spinnerProfileDetail').fadeIn('slow', function () {});

        var state = 0;

        if ($(this).prop("checked") == true)
            state = 1;
        else
            state = 0;

        $.ajax({
            url: '/admin/newsleter_state/' + state,
            type: "get",
            dataType: 'json',
            success: function (result) {
            }, error: function (response) {
                if (response.status == 200) {
                    setTimeout(function () {
                        $('#spinnerProfileDetail').hide();
                        $('#myProfileChangesSuccess').fadeIn('slow', function () {});
                        setTimeout(function () {
                            $('#myProfileChangesSuccess').fadeOut('slow', function () {});
                        },1000);
                    }, 1500);
                } else {
                    setTimeout(function () {
                        $('#spinnerProfileDetail').hide();
                        $('#myProfileChangesError').fadeIn('slow', function () {});
                        setTimeout(function () {
                            if(newsletterCheckStatus==1){
                                $('#newsletter_active').prop('checked', true);
                            } else {
                                $('#newsletter_active').prop('checked', false);
                            }
                            $('#myProfileChangesError').fadeOut("slow", function () {
                            });
                        },1000);
                    }, 1500);
                }

            }
        });
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
            // console.log(xhr, resp, text);
        }
    });
}

function setUsersTable(res) {
    res.data.forEach(function (element) {
        $("#main_users_table > tbody:last-child").append(
            "<tr>"
            + "<td>" + element.ID + "</td>"
            + "<td><a class=\"admin-blog-table\" href = \"" + "/admin/users/detail/" + element.ID + "\" >" + element.first_name + "</a></td>"
            + "<td><a class=\"admin-blog-table\" href = \"" + "/admin/users/detail/" + element.ID + "\" >" + element.last_name + "</a></td>"
            + "<td>" + element.email + "</td>"
            + "<td>" + element.roles.name + "</td>"
            + "<th scope=\"row\">" +
            "<a href=\"/admin/users/edit_user/" + element.ID + "\">" +
            "<button type=\"button\" class=\"btn btn-outline-warning admin-edit-button small-button\">Upraviť</button>" +
            "</a>" +
            "<a href=\"/admin/users/delete/" + element.ID + "\">" +
            "<button type=\"button\" class=\"btn btn-outline-danger admin-delete-button small-button\">Odstrániť</button>" +
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
};

/*----------------------Section End----------------------------------------------------------------------------*/


function randomPassword() {
    var chars = "abcdefghijklmnopqrstuvwxyz!@_-+ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < 6; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}



/*------------------------------------------Chart Section------------------------------------------------------------------*/

$.ajax({
    url: "/admin/charts",
    type: "get",
    dataType: 'json',
    success: function (result) {
        console.log(result);
        var categoriesCount = new Array();
        var categoriesNames = new Array();

        var universitiesCount = new Array();
        var universitiesNames = new Array();

        var countriesCount = new Array();
        var countriesNames = new Array();
        result["categories"].forEach(function(data){
            categoriesCount.push(data.mobility_count);
            categoriesNames.push(data.name);
        });
        result.universities.forEach(function(data){
            universitiesCount.push(data.user_season_count);
            universitiesNames.push(data.acronym);
        });
        result.countries.forEach(function(data){
            countriesCount.push(data.user_season_count);
            countriesNames.push(data.name);
        });
        var universityCtx = document.getElementById("topUniversities").getContext('2d');

        var universityChart = new Chart(universityCtx, {
            type: 'bar',
            data: {
                labels:universitiesNames,
                datasets: [{
                    label: 'Počet prhlášok: ',
                    data: universitiesCount,
                    fill:false,
                    backgroundColor:[
                        "rgba(0, 113, 131, 1)",
                        "rgba(0, 113, 131, 0.85)",
                        "rgba(0, 113, 131, 0.75)",
                        "rgba(0, 113, 131, 0.65)",
                        "rgba(0, 113, 131, 0.6)",],

                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                legend: {
                    display: true
                },
            }
        });

        var countryCtx = document.getElementById("topCountries").getContext('2d');

        var countriesChart = new Chart(countryCtx, {
            type: 'bar',
            data: {
                labels:countriesNames,
                datasets: [{
                    label: 'Počet prhlášok: ',
                    data: countriesCount,
                    fill:false,
                    backgroundColor:[
                        "rgba(0, 113, 131, 1)",
                        "rgba(0, 113, 131, 0.85)",
                        "rgba(0, 113, 131, 0.75)",
                        "rgba(0, 113, 131, 0.65)",
                        "rgba(0, 113, 131, 0.6)",],

                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        var categoryCtx = document.getElementById("topCategories");
        var myPieChart = new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: categoriesNames,
                datasets: [{
                    data: categoriesCount,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true
                },
                cutoutPercentage: 80,
            },
        });
    },
    error: function (xhr, resp, text) {
        // console.log(xhr, resp, text);
    }
});