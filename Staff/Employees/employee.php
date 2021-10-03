<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");

}
//checks if the user has logged in
if($_SESSION['type']!="manager"){
    if($_SESSION['type']!="employee"){
        if($_SESSION['type']!="admin"){
            header("Location: /Sewana/index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/Sewana/Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="/Sewana/Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="/Sewana/Assests/CSS/form.css" rel="stylesheet">
    <title>Properties</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            margin-top: 5%;
        }
        .p-3{
            text-decoration: none;
            text-align:center;
            border-radius: 5px;
            margin-top: 1vh;
        }
        .h-40{
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="employee.php">
            <button type="button" class="btn btn-secondary">Sewana</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button></a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Select Option</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Property Requirements</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="propreq.php" role="button">View</a>
        </div>
        <!-- Tile 2 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Lease</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="lease.php" role="button">View</a>
        </div>
        <!-- Tile 3 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Advertisements</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="ad.php" role="button">View</a>
        </div>
        <!-- Tile 4 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Properties</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="prop.php" role="button">View</a>
        </div>
        <!-- Tile 5 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos_black.png"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Client</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="/Sewana/Staff/Manager/reg-client.php" role="button">View</a>
        </div>
        <!-- Tile 6 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos_black.png"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Owner</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="/Sewana/Staff/Manager/reg-owner.php" role="button">View</a>
        </div>
        <!-- Tile 7 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos_black.png"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Staff</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="/Sewana/Staff/Manager/reg-employee.php" role="button">View</a>
        </div>
        <!-- Tile 8 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos_black.png"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Branch</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="/Sewana/Staff/Manager/reg-branch.php" role="button">View</a>
        </div>
        <!-- Tile 9 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2" style="place-items:center;">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos_transparent.jpg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Property Views</h4>
            </div>
            <a class="btn-outline-primary p-3 align-items-center" href="/Sewana/Staff/Manager/reg-branch.php" role="button">View</a>
        </div>
    </div>
    <!-- Component End  -->

</div>

<!-- <?php include '/wamp64/www/Sewana/footer.php'; ?> -->
</body>
</html>