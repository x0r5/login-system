<?php
//if there is no config var do not load the page
if(!defined('__CONFIG__')){
    exit("You dont have a config file");
}
?>


<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3 mb-4">
                <form class="login-form">
                    <!--EMAIL-->
                    <div class="form-group">
                        <label for="email1">Email address</label>
                        <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email" required="required">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <!--PASSWORD-->
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control" id="password1" placeholder="Password" required="required">
                    </div>
                    <div class="alert alert-danger" role="alert" style="display: none"></div>
                    <button type="submit" class="btn btn-primary">Belépés</button>
                </form>

            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-warning btn-block" id="register">Don't have an account? Register!</button>
            </div>
        </div>
    </div>
</div>
