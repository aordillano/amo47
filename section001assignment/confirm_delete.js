const deleteShoe = event => {
    const confirmDelete = confirm("Are you sure you want to delete this shoe item?");
    if (!confirmDelete) { 
        // notify user of error
        alert("Shoe item was not deleted.");
        // don't allow form to be submitted
        event.preventDefault();  
    } else {
        // document.querySelector(".delete_form").submit();
        const form = event.target.closest(".delete_form");
        if (form) {
            form.submit();
        }
    }
};

document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".delete_button");
    buttons.forEach(button => {
        button.addEventListener("click", deleteShoe);
    });
});