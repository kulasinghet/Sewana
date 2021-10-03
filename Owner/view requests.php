<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");

}
if($_SESSION['type']!="owner"){
    header("Location: /Sewana/index.php");
}
//checks if the user has logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="../Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="../Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | OWNER</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            padding-top: 0;
        }
        .grid-cols-1{
            width: 50vw;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <button type="button" class="btn btn-secondary">Sewana</button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                <a class="nav-link active" aria-current="page" href="rent.php">Rent</a>
            </div>
        </div>
    </div>
</nav>
<div class="flex items-center justify-center w-screen min-h-screen p-10">
<h1 text-align="center">
    Contact your Nearest Branch.
</h1>
</div>
</body>
</html>