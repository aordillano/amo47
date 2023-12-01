const contactChange = () => {
    const selected = document.querySelector("input[name='contact']:checked").value;
    if(selected == "email") {
        createEmailText();
    } else {
        removeEmailText();
    }
}

function createEmailText() {
    const contactText = document.querySelector("#contact_text");
    // create label
    const newLabel = document.createElement('label');
    const text = document.createTextNode('Email Address: ');
    newLabel.appendChild(text);
    contactText.appendChild(newLabel);
    // create input
    const newField = document.createElement('input');
    newField.setAttribute('type', 'text');
    newField.setAttribute('name', 'email_address');
    newField.setAttribute('id', 'email_address');
    contactText.appendChild(newField);
}

function removeEmailText() {
    const contactText = document.querySelector("#contact_text");
    while(contactText.firstChild && !contactText.firstChild.remove());
}

document.addEventListener("DOMContentLoaded", () => {
    const inputContacts = document.querySelectorAll('input[name="contact"]');
    for(let contact of inputContacts) {
        contact.addEventListener("change", contactChange);
    }
});