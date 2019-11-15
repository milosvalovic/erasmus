</div>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/quill/katex.min.js')}}"></script>
<script src="{{asset('vendor/quill/highlight.min.js')}}"></script>
<script src="{{asset('vendor/quill/quill.js')}}"></script>
<script>
    const presentationInput = document.querySelector(".input-presentation"),
        presentationButton = document.querySelector(".input-presentation-trigger"),
        presentationReturn = document.querySelector(".selected-presentation");

    const imagesInput = document.querySelector(".input-images"),
        imagesButton = document.querySelector(".input-images-trigger"),
        imagesReturn = document.querySelector(".selected-images");

    imagesButton.addEventListener("keydown", function (event) {
        if (event.keyCode === 13 || event.keyCode === 32) {
            imagesInput.focus();
        }
    });
    imagesButton.addEventListener("click", function (event) {
        imagesReturn.focus();
        return false;
    });
    imagesInput.addEventListener("change", function (event) {
        let images = [];
        imagesReturn.innerHTML = '';
        for (let i = 0; i < $(this).get(0).files.length; ++i) {
            images.push($(this).get(0).files[i].name);
        }

        for (let image of images) {
            imagesReturn.innerHTML += image + ', ';
        }
    });

    presentationButton.addEventListener("keydown", function (event) {
        if (event.keyCode === 13 || event.keyCode === 32) {
            presentationInput.focus();
        }
    });
    presentationButton.addEventListener("click", function (event) {
        presentationInput.focus();
        return false;
    });
    presentationInput.addEventListener("change", function (event) {
        presentationReturn.innerHTML = this.value;
    });
</script>
<script>
    let quill = new Quill('#editor-blog', {
        modules: {
            formula: true,
            syntax: true,
            toolbar: '#toolbar-container'
        },
        placeholder: '',
        theme: 'snow'
    });
</script>
</body>
</html>