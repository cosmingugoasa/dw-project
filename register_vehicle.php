<?php
require "header.php";
?>

<div class="container" style="width: 70%">
    <form action="includes/session_register_vehicle.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Marca</label>
          <input type="text" class="form-control" placeholder="Marca..." name="vehicle_make">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Modello</label>
            <input type="text" class="form-control" placeholder="Modello..." name="vehicle_model">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Targa</label>
            <input type="text" class="form-control" placeholder="Targa" name="vehicle_id">
        </div>

        <button type="submit" class="btn btn-primary" name="submit-vehicle-registration">Calcola</button>
    </form>
</div>

<?php
require "footer.php";
?>