$(function(){
    CKEDITOR.replace("pages-content");

    $("#w0").submit(function(){
        for (name in CKEDITOR.instances) {
            CKEDITOR.instances[name].updateElement();
        }
    });
});