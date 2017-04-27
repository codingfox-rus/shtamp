$(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto({
        social_tools: false
    });

    var tagCloud = $('#tagCloud');

    $.ajax({
        type: 'POST',
        url: 'site/get-tag-cloud',
        dataType: 'json',
        success: function(data){
            tagCloud.find('ul').html(data.html);

            tagCloud.tagcanvas({
                textColour : '#555', // Цвет текста
                outlineThickness : 1, // Обводка у ссылок (Да, Нет)
                maxSpeed : 0.03, // Максимальная скорость
                depth : 0.9 // Глубина. От 0 до 1
            });
        }
    });
});