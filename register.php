<?php
include "includes/db_connection_details.php";
require "header.php";

if(!isset($_POST["submit-registration"])){
    header("Location: index.php?message=invalidpath");
    exit();
}

$register_email = $_POST["register_email"];
$register_pass = $_POST["register_pass"];
$register_pass_verify = $_POST["register_pass_verification"];
$register_name = $_POST["register_name"];
$register_surname = $_POST["register_surname"];

$db_connection = mysqli_connect($db_host, $db_username, $db_pass, $db_name);

if(!$db_connection){
    die("Connection failed: " . mysqli_connect_error());
}

$checkusername_query = " select * from users where email = '".$register_email."';";
$checkusername_result = mysqli_query($db_connection, $checkusername_query);

if (mysqli_num_rows($checkusername_result) != 0) {
    header("Location:index.php?message=userexists");
} else {
    if ($register_pass != $register_pass_verify){
        header("Location: index.php?message=pawdmatch");
    }else{
        $adduser_query = "INSERT INTO users (email, password, nome, cognome) VALUES ('".$register_email."', '".password_hash($register_pass, PASSWORD_DEFAULT). "','" .$register_name."','".$register_surname."');";
        $adduser_result = mysqli_query($db_connection, $adduser_query);
        if(!$adduser_result){
            echo "<br>Add User query error";
        }else{
            header("Location: index.php?message=useradded");
        }
    }
}

mysqli_close($db_connection);

require "footer.php";

?>