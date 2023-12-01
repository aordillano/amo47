const domain = "https://jsonplaceholder.typicode.com";

const getPhoto = (id) => {
    if(id < 1 || id > 5000) {
        return Promise.reject(
            new Error("Photo ID must be between 1 and 5000.")
        );
    } else {
        return fetch(`${domain}/photos/${id}`)
            .then(response => response.json() );
    }
}

const getPhotoAlbum = photo => {
    return fetch (`${domain}/albums/${photo.albumId}`)
        .then( response => response.json() )
        .then( album => {
            photo.album = album;
            return photo;
        }
    )
}

const getPhotoAlbumUser = photo => {
    return fetch(`${domain}/users/${photo.album.userId}`)
        .then( response => response.json() )
        .then( user => {
            photo.album.user = user;
            return photo;
        })
}

const displayPhotoData = photo => {
    console.log(photo);
    $("#photo").empty();
    // display the photo
    var img = $("<img />");
    img.attr("src", photo.url);
    $("#photo").append(img);
    // display the user that created the photo
}

const displayError = error => {
    $("#photo").empty();
    var span = $("<span></span>");
    span.text(error);
    $("#photo").append(span);
}

$(document).ready( () => {
    $("#view_button").click( () => {
        const photo_id = $("photo_id").val();
        getPhoto(photo_id)
            .then(getPhotoAlbum)
            .then(getPhotoAlbumUser)
            .then(displayPhotoData)
            .catch(displayError);
    });
})