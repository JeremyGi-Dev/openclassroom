<?php

session_start();

$_SESSION = array();
session_destroy();

// si cookie
setcookie('login', '');
setcookie('pass_hache', '');