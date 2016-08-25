$(function(){
    $(".view-category-items").click(function(){
        $(this).closest(".catalog-category").find(".category-items").slideToggle();
    });
});

$(document).mouseup(function (e)
{
    var container = $(".category-items");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
});