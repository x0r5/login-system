<?php

session_start();
session_destroy();
session_write_close();
setcookie(session_name(), '',0,'/');
session_regenerate_id(true);

//redirect to homepage
header('Location: /index.php');
?>