<?php

require "header.php";
include "includes/db_connection_details.php";

$db_connection = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
if(!$db_connection){
    die("Connection failed: " . mysqli_connect_error());
}

$targa = $_POST["targa"];

$searchvehicle_query = "SELECT * FROM contract, vehicle WHERE  vehicle_id = vehicle.plate AND vehicle_id = '".$targa."'";
$searchvehicle_result = mysqli_query($db_connection, $searchvehicle_query);

if(mysqli_num_rows($searchvehicle_result)>0){
    echo "
    <div class='container' style=\"text-align:center;\">
        <h2 style=\"color:darkblue;\">Il veicolo risulta assicurato.</h2> <br><br>
    </div>
    
    ";

    while($row = mysqli_fetch_assoc($searchvehicle_result)) {
        echo "
        <ul class=\"list-unstyled\">
            <li class=\"media\">
                <div class=\"container\">
                    <h5 class=\"mt-0 mb-1\">".$row["make"]." ".$row["model"]."</h5>"."    
                    <table class= \"table\">
                        <tbody>
                            <tr>
                                <td style= \" vertical-align: middle\">Targa : ".$row["plate"]."</td>
                                <td style= \" vertical-align: middle\">Dal : ".$row["payment_date"]."</td>
                                <td style= \" vertical-align: middle\">Al : ".$row["expiry_date"]."</td>
                            </tr>                            
                         </tbody>
                    </table>
                </div>
            </li>            
        </ul> 
        ";
    }

    echo "  
    <div class='container' style=\"text-align:center;\">
        <h4>Maggiori informazione NON verrano mostrate per motivi di privacy.</h4><br><br>
    </div>  
    ";
}else{
    echo "
    <div class='container' style=\"text-align:center;\">
        <h2 style=\"color:darkred;\">Il veicolo NON risulta assicurato.</h2> <br><br>
    </div>
    ";

}

echo "
<div class='container' style=\"text-align:center;\">
    <form action='index.php' method='POST'>
        <button type=\"submit\" class=\"btn btn-dark\">Back</button>
    </form>
</div>
";




?>
