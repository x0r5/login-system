<?php
//if there is no config var do not load the page
if(!defined('__CONFIG__')){
    exit("You dont have a config file");
}
?>


<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">What do yoy want to do today?</h4>

            </div>
            <div class="modal-body mx-3 mb-4">
                <button type="submit" class="btn btn-primary">Primary</button>
            </div>
            <div class="modal-footer justify-content-center">

            </div>
        </div>
    </div>
</div>