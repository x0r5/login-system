$(document).on("submit", "form.register-form", function (event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".alert", _form);

    var _data = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    }
    console.log(_data);

    if(_data.email.length < 6){
        _error.text("Please enter a valid email address").show();
        return false;
    }

    else if(_data.password.length < 8){
        _error.text("Password is too weak. It should be at least 8 characters long.").show();
        return false;
    }
    _error.hide();
    console.log(_data);

    alert("form was submitted");

    ///ajax comes here
    $.ajax({
        type: 'POST', //hidden from the url
        url: 'ajax/register.php',
        data: _data,
        dataType: 'json',
        async: true
    })
        .done(function ajaxDone(data){
            console.log(data);
        })
        .fail(function ajaxFailed(e){
            console.log(e);
        })
        .always(function ajaxAlwaysDoThis(data){
            console.log("Always");
        })

    return false;
});