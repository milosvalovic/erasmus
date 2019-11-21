$('document').ready(function () {
    const fileInput = document.querySelector(".input-file"),
        fileButton = document.querySelector(".input-file-trigger"),
        fileReturn = document.querySelector(".selected-file");

    fileButton.addEventListener("keydown", function (event) {
        if (event.keyCode === 13 || event.keyCode === 32) {
            fileInput.focus();
        }
    });
    fileButton.addEventListener("click", function (event) {
        fileReturn.focus();
        return false;
    });
    fileInput.addEventListener("change", function (event) {
        let images = [];
        fileReturn.innerHTML = '';
        for (let i = 0; i < $(this).get(0).files.length; ++i) {
            images.push($(this).get(0).files[i].name);
        }

        for (let image of images) {
            fileReturn.innerHTML += image + ', ';
        }
    });
});