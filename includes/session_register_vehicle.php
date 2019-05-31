<?php

include "db_connection_details.php";
session_start();

if(!isset($_POST["submit-vehicle-registration"])){
    header("Location: home.php");
    exit();
}

$db_connection = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
$vehicle_make = $_POST["vehicle_make"];
$vehicle_model = $_POST["vehicle_model"];
$vehicle_plate = $_POST["vehicle_id"];

if(!$db_connection){
    die("Connection failed: " . mysqli_connect_error());
}

//check if vehicle already registered
$checkvehicle_query = "select * from vehicle where plate = '".$vehicle_plate."';";
$checkvehilce_result = mysqli_query($db_connection, $checkvehicle_query);

if (mysqli_num_rows($checkvehilce_result) != 0) {
    header("Location: ../home.php?message=vehicle-exists");
}else{

    $_SESSION["vehicle_make"] = $vehicle_make;
    $_SESSION["vehicle_model"] = $vehicle_model;
    $_SESSION["vehicle_plate"] = $vehicle_plate;

    $_SESSION["annual_price"] = rand(300.00, 2000.00);
    $_SESSION["payment_date"] = date("Y-m-d");
    $_SESSION["expiry_date"] = (int)date("Y"); $_SESSION["expiry_date"]++;
    $_SESSION["expiry_date"] = $_SESSION["expiry_date"]."-".date("m-d");

    header("Location: ../price_quotation.php");

    //tomove

}


?>