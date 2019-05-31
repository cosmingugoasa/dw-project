<?php

include "includes/db_connection_details.php";
require "includes/session_handler.php";

$db_connection = mysqli_connect($db_host, $db_username, $db_pass, $db_name);

$login_name = $_POST["login_name"];
$login_pass = $_POST["login_pass"];

if (!$db_connection){
    die("Connection failed: " . mysqli_connect_error());
}

$username_check_query = " select * from users where email = '".$login_name."'; ";
$check_username_result = mysqli_query($db_connection, $username_check_query);

if ($check_username_result && mysqli_num_rows($check_username_result) > 0) {
    while($row = mysqli_fetch_assoc($check_username_result)) {
        if(password_verify($login_pass, $row["password"])){
            $_SESSION["username"] = $row["nome"];
            $_SESSION["userid"] = $row["id"];

            header("Location: home.php");
        }else{
            header("Location: index.php?message=invalid-login");
        }
    }
} else {
    header("Location: index.php?message=invalid-login");
}

mysqli_close($db_connection);

?>