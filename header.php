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
                        <a class=\"nav-link\" href=\"includes/db_delete_account.php \">Cancella Account</a>
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

