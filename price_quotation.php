
<?php
require "header.php";

echo "
<div class='container'>    
    <form action=\"includes/db_register_contract.php\" method=\"post\">
        <div class=\"form-group\">
            <label for=\"exampleInputEmail1\">Costo annuo</label>
            <input type=\"text\" class=\"form-control\" name=\"vehicle_plate\" value='".$_SESSION["annual_price"]."' readonly>
        </div>
        
        <div class=\"form-group\">
            <label for=\"exampleInputEmail1\">Data Pagamento</label>
            <input type=\"text\" class=\"form-control\" name=\"vehicle_plate\" value='".$_SESSION["payment_date"]."' readonly>
        </div>
        
        <div class=\"form-group\">
            <label for=\"exampleInputEmail1\">Data Scadenza Contratto</label>
            <input type=\"text\" class=\"form-control\" name=\"vehicle_plate\" value='".$_SESSION["expiry_date"]."' readonly>
        </div>
        
        <button type=\"submit\" class=\"btn btn-primary\" name=\"submit-contract-registration\">Conferma Contratto</button>
    </form>
</div>
";

?>