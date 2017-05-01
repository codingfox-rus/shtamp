$(function(){
    CKEDITOR.timestamp='ABCD';

    for (name in CKEDITOR.instances) {
        CKEDITOR.instances[name].updateElement();
    }
});