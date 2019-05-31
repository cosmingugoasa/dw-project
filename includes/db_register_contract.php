<?php

include "db_connection_details.php";
session_start();

$db_connection = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
if(!$db_connection){
    die("Connection failed: " . mysqli_connect_error());
}
/*
$addvehicle_query = "INSERT INTO vehicle (make, model, plate) VALUES ('".$_SESSION["vehicle_make"]."', '".$_SESSION["vehicle_model"]. "','" .$_SESSION["vehicle_plate"]."');";
$addvehicle_result = mysqli_query($db_connection, $addvehicle_query);

if($addvehicle_result){
    $addcontract_query = " INSERT INTO contract (client_id, vehicle_id, annual_price, payment_date, expiry_date) VALUES ('".$_SESSION["userid"]."', '".$_SESSION["vehicle_plate"]."', '".$_SESSION["annual_price"]."', '".$_SESSION["payment_date"]."', '".$_SESSION["expiry_date"]."');";
    $addcontract_result = mysqli_query($db_connection, $addcontract_query);
    if($addcontract_result){
        header("Location: ../home.php?message=contract-added");
    }else{
        die("Error adding contract: ".mysqli_error($addcontract_result));
    }
}else{
    die("Error adding contract: ".mysqli_error($addvehicle_result));
}
*/

$addcontract_query = " INSERT INTO contract (client_id, vehicle_id, annual_price, payment_date, expiry_date) VALUES ('".$_SESSION["userid"]."', '".$_SESSION["vehicle_plate"]."', '".$_SESSION["annual_price"]."', '".$_SESSION["payment_date"]."', '".$_SESSION["expiry_date"]."');";
$addcontract_result = mysqli_query($db_connection, $addcontract_query);
if($addcontract_result){

    $addvehicle_query = "INSERT INTO vehicle (make, model, plate) VALUES ('".$_SESSION["vehicle_make"]."', '".$_SESSION["vehicle_model"]. "','" .$_SESSION["vehicle_plate"]."');";
    $addvehicle_result = mysqli_query($db_connection, $addvehicle_query);
    if($addvehicle_result){
        header("Location: ../home.php?message=contract-added");
    }else{
        die("Error adding contract: ".mysqli_error($addvehicle_result));
    }
}else{
    die("Error adding contract: ".mysqli_error($addcontract_result));
}


?>