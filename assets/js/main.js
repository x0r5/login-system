$(document).on("submit", "form.register-form", function (event) {
    event.preventDefault();

    var form = $(this);

    var data = {
        email: $("input[type='email']", form).val(),
        password: $("unput[type='password']", form).val()
    }

    console.log(data);

    alert("form was submitted");

});