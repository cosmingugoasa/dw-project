<?php

include "db_connection_details.php";
session_start();

$db_connection = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
if(!$db_connection){
    die("Connection failed: " . mysqli_connect_error());
}

//$test = $_POST["plate"];

$deletecontract_query = "DELETE FROM contract WHERE vehicle_id = '".$_POST["plate"]."'";
$deletecontract_result = mysqli_query($db_connection, $deletecontract_query);

if($deletecontract_result){
    header("Location: ../home.php?message=contract-deleted");
}else{
    die("Error adding contract: ".mysqli_error($deletecontract_result));
}

?>
