<?php

if(empty($_POST["name"])) {
    die("name is required");
}
if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if(strlen($_POST["password"]) < 6) {
    die("password must be at least 8 characters long");
}

if($_POST["password"] !== $_POST["confirmpassword"]) {
    die("password does not match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);



?>