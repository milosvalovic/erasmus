$('document').ready(function () {
    let quill = new Quill('#editor-blog', {
        modules: {
            formula: true,
            syntax: true,
            toolbar: '#toolbar-container'
        },
        placeholder: '',
        theme: 'snow'
    });

    $("#new-blog-post").submit(function (event) {
        $(this).append("<textarea style='display: none' name='article' >" + quill.container.firstChild.innerHTML + "</textarea>");
    });
});