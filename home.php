<?php
require "header.php";
include "includes/db_connection_details.php";
?>

<!-- MAIN BODY -->
<div class="container" style="width: 40%; text-align: center">
    <h1>I tuoi contratti attivi.</h1><br>
</div>
<div class="container" style="width: 20%; text-align: center">
    <form action="register_vehicle.php" method="post">
        <button type="submit" class="btn btn-success">Aggiungi Contratto</button>
    </form><br><br>
</div>

<div class="container" style="width: 40%; text-align: center";>
    <?php
    if(isset($_GET["message"])){
        if($_GET["message"] == "contract-added"){
            echo "<p style='color: red'> Nuovo contratto aggiunto. </p>";
        }elseif($_GET["message"] == "vehicle-exists"){
            echo "<p style='color: red'> Veicolo già assicurato. </p>";
        }elseif($_GET["message"] == "contract-deleted"){
            echo "<p style='color: red'> Contratto eliminato. </p>";
        }
    }
    ?>
</div>

<?php
$db_connection = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
$lookforcontract_query = "SELECT * FROM contract, users, vehicle WHERE client_id = users.id AND vehicle_id = vehicle.plate AND users.id = '".$_SESSION["userid"]."';";
$lookforcontract_result = mysqli_query($db_connection, $lookforcontract_query);

if (mysqli_num_rows($lookforcontract_result) > 0) {
    while($row = mysqli_fetch_assoc($lookforcontract_result)) {
        echo "
        <ul class=\"list-unstyled\">
            <li class=\"media\">
                <div class=\"container\">
                    <h5 class=\"mt-0 mb-1\">".$row["make"]." ".$row["model"]." "."</h5>"."
                    <form action='includes\db_delete_contract.php' method='post'>    
                        <table class= \"table\">
                            <tbody>
                                <tr>                                  
                                    <td style= \" vertical-align: middle\"><input hidden name='plate' value='".$row["plate"]."'> Targa : ".strtoupper($row["plate"])."</td>
                                    <td style= \" vertical-align: middle\">Costo annuo : ".$row["annual_price"]." €"."</td>
                                    <td style= \" vertical-align: middle\">Data pagamento : ".$row["payment_date"]."</td>
                                    <td style= \" vertical-align: middle\">Data scadenza : ".$row["expiry_date"]."</td>
                                    <td style= \" vertical-align: middle\"><button type=\"submit\" class=\"btn btn-outline-danger\">Cancella</button></td>
                                </tr>                            
                             </tbody>
                        </table>                    
                    </form>
                </div>
            </li>            
        </ul>
        ";
    }
} else {
    echo "
        <div class=\'container\' style=\"text-align: center\">
            <h5>Non sono presenti contratti attvi.</h5>
        </div>
        ";
}

?>

<?php
require "footer.php";
?>

