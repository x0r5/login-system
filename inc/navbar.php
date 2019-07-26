<?php
//if there is no config var do not load the page
if(!defined('__CONFIG__')){
    exit("You dont have a config file");
}

include_once $_SERVER['DOCUMENT_ROOT']."/login.php";
include_once $_SERVER['DOCUMENT_ROOT']."/user_modal.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">biosütemény.hu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item <?php echo setActiveNav('/index.php'); ?>">
                <a class="nav-link" href="index.php">Webshop <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo setActiveNav('/dashboard.php'); ?>">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 ml-lg-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="collapse navbar-collapse navbarToggler">
            <ul class="navbar-nav ml-auto">

                <div class="dropdown">
                    <?php if(isLoggedIn()): ?>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hello <?=$__user->name?>
                    </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    <?php else: ?>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form class="login-form px-4 px-lg-2 py-3">
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                        Remember me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">New around here? Sign up</a>
                            <a class="dropdown-item" href="#">Forgot password?</a>
                        </div>
                    <?php endif; ?>
                </div>

                <!--
                <li class="nav-item">
                    <?php
                    if(isLoggedIn()):
                        ?>
                        <a class="nav-link" data-toggle="modal" data-target="#modalUser" href="">Hello <?=$__user->name?></a>
                    <?php else: ?>
                        <a class="nav-link" data-toggle="modal" data-target="#modalLoginForm" href="">Login</a>
                    <?php endif; ?>
                </li>
                -->
            </ul>
        </div>

    </div>
</nav>