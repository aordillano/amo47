const clearDisplay = () => {
    const display = document.querySelector("#display");
    while(display.firstChild) {
        display.firstChild.remove();
    }
}

const displayError = error => {
    clearDisplay();
    const display = document.querySelector("#display");
    const span = document.createElement("span");
    span.setAttribute('class', 'error');
    const text = document.createTextNode(error);
    // hierarchy: display -> <span> -> text
    span.appendChild(text);
    display.appendChild(span);

    // TESTING ONLY
    // displayError('error 1');
    // displayError('error 2');
}

const displayData = data => {
    console.log(data);
    
    clearDisplay();
    const display = document.querySelector("#display");
    const h3 = document.createElement('h3');
    const title = document.createTextNode(data.title);
    console.log(data.title);
    h3.appendChild(title);
    display.appendChild(h3);

    switch(data.media_type) {
        case "image":
            const img = document.createElement('img');
            img.setAttribute('src', data.url);
            img.setAttribute('width', 640);
            img.setAttribute('alt', 'NASA photo');
            display.appendChild(img);
            break;
        case "video": // Example Sept 24, 2023
            const iframe = document.createElement('iframe');
            iframe.setAttribute('src',data.url);
            iframe.setAttribute('width', 640);
            iframe.setAttribute('height', 360);
            iframe.setAttribute('frameborder', 0);
            iframe.setAttribute('allowfullscreen', true);
            display.appendChild(iframe);
            break;
        default:
            const none = document.createElement('img');
            none.setAttribute('width', 640);
            none.setAttribute('alt','NASA photo');
            display.appendChild(none);
    }

    const div = document.createElement('div');
    const date = document.createTextNode(data.date);
    div.appendChild(date);
    if(data.copyright) {
        const span = document.createElement('span');
        span.setAttribute('class','right');
        const text = document.createTextNode("Copyright: " + data.copyright);
        span.appendChild(text);
        div.appendChild(span);
    }
    display.appendChild(div);

    const p = document.createElement('p');
    const explanation = document.createTextNode(data.explanation);
    p.appendChild(explanation);
    display.appendChild(p);
}

const displayPicture = data => {
    if(data.error) {
        displayError(data.error.message);
    } else if (data.code) {
        displayError(data.msg);
    } else {
        displayData(data);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#view_button").addEventListener("click", () => {
        const dateTextBox = document.querySelector("#date");
        let dateStr = dateTextBox.value;
        
        if(dateStr) {
            // Slide 28
            const domain = `https://api.nasa.gov/planetary/apod`;
            const my_api_key = 'FUv7UjyxIvUDggec2OwtuGbDPcdf2SjSICeOAurs';
            const request = `?api_key=${my_api_key}&date=${dateStr}`;
            const url = domain + request;
            console.log("url = " + url);

            // will return promise object then we decide how to handle it
            fetch(url)
                .then( response => response.json() )
                .then( json => displayPicture(json) )
                .catch( e => displayError(e.message) );
        } else {
            // date is empty
            const msg = "Please select a valid date.";
            displayError(msg);
        }
    });
});