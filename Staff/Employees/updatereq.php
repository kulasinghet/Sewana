<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");
}//checks if the user has logged in

if($_SESSION['type']!="manager"){
    if($_SESSION['type']!="employee"){
        if($_SESSION['type']!="admin"){
            header("Location: /Sewana/index.php");
        }
    }
}

if($_SESSION['type']=="employee"){
    $conn=new mysqli("localhost","Employee","employee123","Sewana");
}
elseif($_SESSION['type']=="manager"){
    $conn=new mysqli("localhost","manager","manager123","Sewana");
}
elseif($_SESSION['type']=="admin"){
    $conn=new mysqli("localhost","root","","Sewana");
}

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="../../Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="../../Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | Update Requirements</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .grid-cols-1{
            width: 50vw;
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
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/employee.php">Home</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/createreq.php">Create</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/selectreq.php">Retreive</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/deletereq.php">Delete</a>
                    <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Update Client Property Requirement</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                    <input type="text" name="clientnum" class="form-control" placeholder="Enter Client Number"/>
                    <input type="text" name="reqnum" class="form-control" placeholder="Enter Requirement Number"/>
                    <input type="text" name="area" class="form-control" placeholder="Enter Area"/>

                    <br>Property Type
                    <select name="propertytype" id="propertytype">
                        <option value="Flat" selected>Flat</option>
                        <option value="Annex">Annex</option>
                        <option value="Bungalow">Bungalow</option>
                        <option value="Commercial">Commercial</option>
                    </select><br><br>

                    <input placeholder="Enter Rent Date" name="rdate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    <input type="text" name="maxrent" class="form-control" placeholder="Enter Maximum Rent"/>
                    <input type="submit" value="Update" class="btn-outline-primary p-3 align-items-center"/>
                </form>
            </div>
        </div>
    </div>
    <!-- Component End  -->

</div>
</body>
</html>