<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="#">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="logo.jpg" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <?php
                if(!empty($_SESSION["username"])){
                    echo "
                    <li class=\"nav-item\">
                        
                        <!-- Button trigger modal -->
                        <button type=\"button\" class=\"btn btn-outline-danger\" data-toggle=\"modal\" data-target=\"#confirmModal\">
                          Cancella Account
                        </button>
                        
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"confirmModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                          <div class=\"modal-dialog\" role=\"document\">
                            <div class=\"modal-content\">
                              <div class=\"modal-header\">
                                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Conferma cancellazione account</h5>
                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                  <span aria-hidden=\"true\">&times;</span>
                                </button>
                              </div>
                              <div class=\"modal-body\">
                                <p>Sicuro di voler cancellare il tuo account?</p>
                                <p>L'operazione è irreversibile.</p>
                              </div>
                              <div class=\"modal-footer\">
                                  <form action='includes/db_delete_account.php' method='POST'>
                                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                                    <button type=\"submit\" class=\"btn btn-danger\">Confirm</button>
                                  </form>  
                              </div>
                            </div>
                          </div>
                        </div>
                    </li>
                    ";
                }
                ?>
            </ul>

            <?php
            if(!empty($_SESSION["username"])){
                echo "
                <span class=\"navbar-text\" style=\"padding-right: 10px\">
                    Logged in as : ".$_SESSION["username"]."    "."
                </span>
                <span class=\"navbar-text\">
                    <form action=\"logout.php\" method=\"post\">
                        <button class=\"btn btn-outline-secondary\" type=\"submit\">Logout</button>
                    </form>
                </span>
                ";
            }else{
                echo "
                <span class=\"navbar-text\" style=\"padding-right: 10px\">
                    Not Logged In.
                </span>
                <span class=\"navbar-text\">
                    <form action=\"index.php\" method=\"post\">
                        <button class=\"btn btn-outline-secondary\" type=\"submit\">Login</button>
                    </form>
                </span>
                ";
            }
            ?>
        </div>
    </nav><br>

