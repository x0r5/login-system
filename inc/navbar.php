<?php
//if there is no config var do not load the page
if(!defined('__CONFIG__')){
    exit("You dont have a config file");
}
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?php setActiveNav("/dashboard.php"); ?>">
                <a class="nav-link <?php setDisabledNav(); ?>" href="/dashboard.php">Home  </a>
            </li>
            <li class="nav-item <?php setActiveNav("/login.php"); ?>">
                <a class="nav-link" href="/login.php">Login </a>
            </li>
            <li class="nav-item <?php setActiveNav("/logout.php"); ?>">
                <a class="nav-link <?php setDisabledNav(); ?>" href="/logout.php">Logout </a>
            </li>
            <li class="nav-item <?php setActiveNav("/register.php"); ?>">
                <a class="nav-link" href="/register.php">Register </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
</nav>