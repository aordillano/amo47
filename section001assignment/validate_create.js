const select = selector => document.querySelector(selector);

const validateCreate = () => {
    const code = select("#shoe_code");
    const name = select("#shoe_name");
    const desc = select("#description");
    const price = select("#price");

    let isValid = true;
    
    if (code.value == "") {
        code.nextElementSibling.textContent = "This field is required.";
        isValid = false;
    } else if (code.value.length < 4) {
        code.nextElementSibling.textContent = "Shoe code has to be at least 4 characters.";
        isValid = false;
    } else if (code.value.length > 10) {
        code.nextElementSibling.textContent = "Shoe code has to be at most 10 characters.";
        isValid = false;
    } else {
        code.nextElementSibling.textContent = "";
    }

    if (name.value == "") {
        name.nextElementSibling.textContent = "This field is required.";
        isValid = false;
    } else if (name.value.length < 10) {
        name.nextElementSibling.textContent = "Shoe name has to be at least 10 characters.";
        isValid = false;
    } else if (name.value.length > 100) {
        name.nextElementSibling.textContent = "Shoe name has to be at most 100 characters.";
        isValid = false;
    } else {
        name.nextElementSibling.textContent = "";
    }

    if (desc.value == "") {
        desc.nextElementSibling.textContent = "This field is required.";
        isValid = false;
    } else if (desc.value.length < 10) {
        desc.nextElementSibling.textContent = "Description has to be at least 10 characters.";
        isValid = false;
    } else if (desc.value.length > 255) {
        desc.nextElementSibling.textContent = "Description has to be at most 255 characters.";
        isValid = false;
    } else {
        desc.nextElementSibling.textContent = "";
    }

    const price_value = parseInt(price.value);
    if (price_value == "") { 
        price.nextElementSibling.textContent = "This field is required.";
        isValid = false;
    } else if (isNaN(price_value) || price_value <= 0) {
        price.nextElementSibling.textContent = "Price must be a valid, positive number greater than 0.";
        isValid = false;
    } else if (price_value > 100000) {
        price.nextElementSibling.textContent = "Price must not exceed $100,000.";
        isValid = false;
    } else {
        price.nextElementSibling.textContent = "";
    }

    if (isValid == true) {
        select("form").submit();
    }
}

const resetForm = () => {
    select("#shoe_code").value = "";
    select("#shoe_name").value = "";
    select("#description").value = "";
    select("#price").value = "";
    select("#shoe_code").nextElementSibling.textContent = "*";
    select("#shoe_name").nextElementSibling.textContent = "*";
    select("#description").nextElementSibling.textContent = "*";
    select("#price").nextElementSibling.textContent = "*";
    select("#shoe_code").focus();
};

document.addEventListener("DOMContentLoaded", () => {
    select("#add_shoe_button").addEventListener("click", validateCreate);
    select("#reset_button").addEventListener("click", resetForm);  
    select("#shoe_code").focus();   
});