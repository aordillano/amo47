$(document).ready( () => {
    $("#image_rollovers img").each( (index, img) => {
        $(img).mouseover( function() {
            const src = $(this).attr('src');
            const new_src = src.replace("-bw.jpg", "-color.jpg");
            $(this).attr('src', new_src);
        });

        $(img).mouseout( function() {
            const src = $(this).attr('src');
            const new_src = src.replace("-color.jpg", "-bw.jpg");
            $(this).attr('src', new_src);
        });
    });
});