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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="../../Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="../../Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | Advertisement</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            margin-top: -100px;
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
                    <a class="nav-link active" aria-current="page" href="../../index.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Advertisement Information</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="GET" action="advertise.php">
                    <input type="text" name="newspID" class="form-control" placeholder="Enter Newspaper ID" required/>
                    <input type="text" name="propNum" class="form-control" placeholder="Enter Property Number" required/>
                    <input placeholder="Enter Date" name="date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    <input type="submit" value="Generate Advertisement" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <br>
                <?php
                if(isset($_GET['submit'])){
                    $newspID=$_GET['newspID'];
                    $propNum=$_GET['propNum'];
                    $date=$_GET['date'];

                    
                    if($_SESSION['type']=="manager"){
                        $conn=new mysqli("localhost","Manager","manager123","Sewana");
                    }
                    elseif($_SESSION['type']=="admin"){
                        $conn=new mysqli("localhost","root","","Sewana");
                    }
                    elseif($_SESSION['type']=="employee"){
                        $conn=mysqli_connect("localhost","Employee","employee123","Sewana");
                    }
                    if(!$conn){
                        die("Connection failed: " . mysqli_connect_error());
                    }


                    $query="insert into advertise (Newspaper_Id,Property_number,Date)
                    VALUES('$newspID','$propNum','$date')";
                    if (mysqli_query($conn,$query)){
                        echo "You Added an Advertisement Successfully";
                    }
                    else{
                        echo "Oops, something went wrong :(";
                    }
                    mysqli_close($conn);
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Component End  -->

</div>
</body>
</html>