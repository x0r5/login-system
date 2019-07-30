
//----------- IF THE SUBMIT BUTTON IS PRESSED ON THE REGISTER PAGE -----
$(document).on("submit", "form.register-form", function (event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".alert", _form);

    var _data = {  //user input
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

    //alert("form was submitted");

    ///ajax comes here, form is OK
    $.ajax({
        type: 'POST', //hidden from the url
        url: 'ajax/register.php',
        data: _data,
        dataType: 'json',
        async: true
    })
        .done(function ajaxDone(data){
            console.log(data);
            if(data.redirect != undefined){
                //console.log(data.redirect);
                location.reload(); //refresh the page -> must for changing the navbar status!!
            }else if(data.error != undefined){
                _error.text(data.error).show();
            }
        })
        .fail(function ajaxFailed(e){
            console.log(e);
        })
        .always(function ajaxAlwaysDoThis(data){
            console.log("Always");
        })

    return false;
});

/*
*
*
*
*
 */


//----------- IF THE SUBMIT BUTTON IS PRESSED ON THE LOGIN PAGE -----
$(document).on("submit", "form.login-form", function (event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $(".alert", _form);

    var _data = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    }
    //console.log(_data);

    if(_data.email.length < 6){
        _error.text("Please enter a valid email address").show();
        return false;
    }

    else if(_data.password.length < 8){
        _error.text("Password is incorrect").show();
        return false;
    }

    //password and email check passed, hide the preveius error messages
    _error.hide();

    ///ajax comes here, form is OK
    $.ajax({
        type: 'POST', //hidden from the url
        url: 'ajax/login.php',
        data: _data,  //sent to the server
        dataType: 'json',
        async: true
    })
        .done(function ajaxDone(data){
            //console.log('ajax done');
            console.log(data);
            if(data.redirect != undefined){
                window.location = data.redirect;
            }else if(data.error != undefined){
                _error.text(data.error).show();
            }
        })
        .fail(function ajaxFailed(e){
            console.log('ajax fail');
            console.log(e);
            /*if(data.error != undefined) {
                _error.text(data.error).show();
            }

             */

        })
        .always(function ajaxAlwaysDoThis(data){
            console.log("Always");
        })

    return false;
});
/*
$(document).on('keyup', '.settings-form', function() {
    var _div = $(this);
    $(".form-control", _div).each(function () {
        console.log($(this).val());

    });

});
 */

$(document).on("submit", "form.form-settings", function(event) {
    event.preventDefault();
    var _form = $(this);
    var _error = $(".alert-danger", _form);
    var _notify = $(".alert-primary", _form);

    //get all the data, compare to the stored data

    var _data = {  //user input
        email: $("input[type='email']", _form).val().trim(),
        name: $("input[id='name-settings'", _form).val().trim(),
        street: $("input[id='street'", _form).val().trim(),
        house: $("input[id='house'", _form).val().trim(),
        country: $("input[id='country'", _form).val().trim(),
        city: $("input[id='city'", _form).val().trim(),
        zip: $("input[id='zip'", _form).val().trim()
    };
    //validation
    if(_data.email.length < 6){
        _error.text("Please enter a valid email address").show();
        return false;
    }

    //hide alerts
    _error.hide();
    _notify.hide();




    //console.log(_data);
    //compare and update if neccesery
    $.ajax({
        type: 'POST', //hidden from the url
        url: 'ajax/settings.php',
        data: _data,  //sent to the server
        dataType: 'json',
        async: true
    })
        .done(function ajaxDone(data) { //get the response as data var
            //console.log('ajax done');
            console.log(data);
            if (data.redirect != undefined) {
                window.location = data.redirect;
            } else if (data.error != undefined) {
                _error.text(data.error).show();
            }
            else if(data.reply != undefined){
                _notify.text(data.reply).show();
            }
        })
        .fail(function ajaxFailed(e) {
            console.log('ajax fail');
            console.log(e);
        });
});