<?php

include "db_connection_details.php";
session_start();

$db_connection = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
if(!$db_connection){
    die("Connection failed: " . mysqli_connect_error());
}

$deleteaccount_query = "DELETE FROM users WHERE id = '".$_SESSION["userid"]."'";
$deleteaccount_result = mysqli_query($db_connection, $deleteaccount_query);

if($deleteaccount_result){
    session_destroy();
    header("Location: ../index.php?message=account-deleted");
}else{
    die("Error adding contract: ".mysqli_error($deletecontract_result));
}

?>
