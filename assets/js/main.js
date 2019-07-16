$(document).on("submit", "form.register-form", function (event) {
    event.preventDefault();

    var form = $(this);
    var error = $(".alert", form);

    var data = {
        email: $("input[type='email']", form).val(),
        password: $("unput[type='password']", form).val()
    }

    if(data.email.length < 6){
        error.text("Please enter a valid email address").show();
        return false;
    }

    else if(data.password.length < 8){
        error.text("Password is too weak. It should be at least 8 characters long.");
        return false;
    }
    console.log(data);

    alert("form was submitted");

});