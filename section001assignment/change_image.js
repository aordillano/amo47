$(document).ready( () => {
    $("#shoe_img").mouseover( function() {
        const src = $(this).attr('src');
        const new_src = src.replace("-modified.jpg", ".jpg");
        $(this).attr('src', new_src);
    });

    $("#shoe_img").mouseout( function() {
        const src = $(this).attr('src');
        const new_src = src.replace(".jpg", "-modified.jpg");
        $(this).attr('src', new_src);
    });
});