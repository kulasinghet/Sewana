<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");
}//checks if the user has logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../Assests/CSS/stylesheet.css" rel="stylesheet" />
    <link href="../../Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="../../Assests/CSS/form.css" rel="stylesheet" />
    <title>Sewana | Admin</title>
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
        <a class="navbar-brand" href="managerHomepage.php">
            <button type="button" class="btn btn-secondary">Home</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>


<br>


<div class="flex items-center justify-center w-screen min-h-screen p-3">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg r" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Branch</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="reg-branch.php" role="button">View</a>
            </div>
        </div>
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Employee</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="reg-employee.php" role="button">View</a>
            </div>
        </div>
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Promote Employees</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="promote-emp.php" role="button">View</a>
            </div>
        </div>
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Clients</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="client-reg.php" role="button">View</a>
            </div>
        </div>
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Owner</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="reg-owner.php" role="button">View</a>
            </div>
        </div>
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Register Property</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="reg-property.php" role="button">View</a>
            </div>
        </div>
        <!-- Tile 2 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Generates Lease</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="lease.php" role="button">View</a>
            </div>
        </div>
        <!-- Tile 3 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="h-40 bg-gray-400 rounded-lg">
                <img class="h-40 rounded-lg" src="..\..\Assests\Images\Sewana-logos.jpeg"/>
            </div>
            <div class="flex flex-col items-start mt-4">
                <h4 class="text-xl font-semibold">Advertisements</h4>
                <a class="btn-outline-primary p-3 align-items-center" href="ad.php" role="button">View</a>
            </div>
        </div>

    </div>
    <!-- Component End  -->

</div>


</body>
</html>