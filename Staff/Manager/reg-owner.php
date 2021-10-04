<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");
}//checks if the user has logged in

if($_SESSION['type']=="manager"){
    $conn=new mysqli("localhost","Manager","manager123","Sewana");
}
else if($_SESSION['type']=="admin"){
    $conn=new mysqli("localhost","root","","Sewana");
}
else{
    header("Location: /Sewana/index.php");
}

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../Assests/CSS/stylesheet.css" rel="stylesheet" />
    <link href="../../Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="../../Assests/CSS/form.css" rel="stylesheet" />
    <title>Sewana | Manager</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .max-w-6xl{
            margin-top: -30%;
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

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>


<br>
<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Do you belong to</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-3">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid xl:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-2 max-w-6xl">
        <a class="p-3 align-items-center" href="reg-ownerperson.php" role="button"><h4 class="text-xl font-semibold">Person Category</h4></a>
        <a class="p-3 align-items-center" href="reg-ownercompany.php" role="button"><h4 class="text-xl font-semibold">Company Category</h4></a>
    </div>

</div>


</body>
</html>