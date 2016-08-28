$(function(){
    $(".wsp-title").click(function(e){
        e.preventDefault();
        var self = $(this),
            $parent = self.closest(".wspoiler"),
            $content = $parent.find(".wsp-content");

        if ( $content.is(":hidden") ) {
            $parent.find(".fa-plus").addClass("hidden");
            $parent.find(".fa-minus").removeClass("hidden");
            $content.removeClass("hidden");
        } else {
            $parent.find(".fa-plus").removeClass("hidden");
            $parent.find(".fa-minus").addClass("hidden");
            $content.addClass("hidden");
        }
    });
});