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
    <link href="/Sewana/Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="/Sewana/Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="/Sewana/Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | STAFF</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            padding-top: 0;
            margin-top: -15vh;
        }
        .p-3{
            text-decoration: none;
            text-align:center;
            border-radius: 5px;
            margin-top: 1vh;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <a class="navbar-brand" href="..\\index.php">
            <button type="button" class="btn btn-secondary">Sewana</button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/sewana/logout.php">Log out</a>
            </div>
        </div>
    </div>
</nav>
<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Select Option</h3>
<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->
    <!-- Component Start -->
    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="/Sewana/Assests/Images/Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Property Views</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="propertyview.php" role="button">View</a>
            </div>
        </div>
        <!-- Tile 2 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="/Sewana/Assests/Images/Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Property Details</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="detailproperty.php" role="button">View</a>
            </div>
        </div>
        <!-- Tile 4 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="/Sewana/Assests/Images/Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Advertisements</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="adproperty.php" role="button">View</a>
            </div>
        </div>
    </div>
    <!-- Component End  -->
</div>
</body>
</html>
