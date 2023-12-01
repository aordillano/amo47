$(document).ready( () => {
    // handle click on Join List button
    // jumps in between submitting form to validate entries
    $("#email_form").submit(event => {
        const email = $("#email").val();
        let isValid = true;

        // validate the email address
        if(email === "") {
            $("#email").next().text("This field is required.");
            isValid = false;
        } else {
            $("#email").next().text("");
        }

        // submit form if all entries are valid
        if(isValid) {
            $("#email_form").submit();
        } else {
            event.preventDefault();
        }
    });

    // handle click on Reset Form button
    // jumps in between clearing form to validate entries
    $("#reset_button").click( () => {
        // clear text boxes
        $("#email").val("");
        $("#email").next().text("*");
        $("#email").focus();
    });

    $("#email").focus();
});