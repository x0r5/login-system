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
                <div class="list-group">
                    <button type="button" id="logout-btn" class="list-group-item list-group-item-action">
                        Logout
                    </button>
                    <button type="button" id="settings-btn" class="list-group-item list-group-item-action">
                        Settings
                    </button>
                    <button type="button" class="list-group-item list-group-item-secondary">User ID: <?php echo $__user->user_id ?></button>
                    <button type="button" class="list-group-item list-group-item-secondary"><?php echo $__user->email ?></button>
                    <button type="button" class="list-group-item list-group-item-secondary">Porta ac consectetur ac</button>
                </div>



                <a href="/logout.php" class="button btn btn-primary">Logout</a>

            </div>
            <div class="modal-footer justify-content-center">

            </div>
        </div>
    </div>
</div>

