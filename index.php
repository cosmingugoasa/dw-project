<?php
require "header.php";
?>

<!-- message handler -->
<?php
if(isset($_GET["message"])){
    if($_GET["message"] == "useradded"){
        echo "
            <div class='container' style='text-align: center'>
            <p style='color: red'> New user has been added! </p>
            </div>
        ";
    }elseif ($_GET["message"] == "userexists"){
        echo "
            <div class='container' style='text-align: center'>
            <p style='color: red'> User already exists! </p>
            </div>
        ";
    }elseif ($_GET["message"] == "pawdmatch"){
        echo "
            <div class='container' style='text-align: center'>
            <p style='color: red'> Passwords do NOT match! </p>
            </div>
        ";
    }elseif ($_GET["message"] == "invalid-login") {
        echo "
            <div class='container' style='text-align: center'>
            <p style='color: red'> Invalid Login. Retry! </p>
            </div>
        ";
    }elseif ($_GET["message"] == "account-deleted") {
        echo "
            <div class='container' style='text-align: center'>
            <p style='color: red'> Account deleted. </p>
            </div>
        ";
    }
}
?>

<div class="row">
    <div class="col" style="text-align: center;">
      <h1>Login</h1><br>
      <form action="login.php" method="POST">
          <input type="text" placeholder="e-mail" class="field" name="login_name"><br>
          <input type="password" placeholder="password" class="field" name="login_pass"><br>
          <input type="submit" value="login" class="btn" name="submit-login">
      </form>
      <div class="pass-link">
          <a href="#" >Lost your password?</a>
      </div>
    </div>

    <div class="col" style="text-align: center;">
      <h1>Sign Up</h1><br>
      <form action="register.php" method="POST">
          <input type="text" placeholder="e-mail" class="field" name="register_email"><br>
          <input type="password" placeholder="password" class="field" name="register_pass"><br>
          <input type="password" placeholder="repeat password" class="field" name="register_pass_verification"><br>
          <input type="text" placeholder="nome" class="field" name="register_name"><br>
          <input type="text" placeholder="cognome" class="field" name="register_surname"><br>
          <input type="submit" value="register" class="btn" name="submit-registration">
      </form>
    </div>

    <div class="col" style="text-align: center;">
        <h1>Cerca Veicolo</h1><br>
        <form action="#" method="POST">
            <input type="text" placeholder="targa" class="field" name="targa"><br>
            <input type="submit" value="search" class="btn" name="submit-search">
        </form>
    </div>
</div>
  
<?php
require "footer.php";
?>