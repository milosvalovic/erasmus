$(document).ready(function () {

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#editUniversityImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#editUniversityImageInput").change(function(){
        readURL(this);
    });


});