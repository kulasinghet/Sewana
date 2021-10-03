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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="../../Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="../../Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | Create Lease</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            padding-top: 8vh;
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
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/selectlease.php">Retreive</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/updatelease.php">Update</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/deletelease.php">Delete</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Lease Generating Form</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                <?php 
                    $q1 = "SELECT `Property_number` from property";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Property_number'].'>'.$row1['Property_number'].'</option>';
                    }
                    echo "<label for='Property_number'>Select Property Number: </label>";
                    echo "<select name = 'pnum' class='form-control' required>".$newslist."</select>";
                    ?>
                    <?php 
                    $q1 = "SELECT `Client_number` from client";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Client_number'].'>'.$row1['Client_number'].'</option>';
                    }
                    echo "<label for='Client_number'>Select Client Number: </label>";
                    echo "<select name = 'clientnum' class='form-control' required>".$newslist."</select>";
                    ?>
                    <input type="text" name="monthlyRent" class="form-control" placeholder="Enter Monthly rent"/>

                    <br>Payment Method
                    <select name="payMethod">
                        <option value="card" selected>Card</option>
                        <option value="cheq">Cheque</option>
                        <option value="cash">Cash</option>
                    </select><br><br>

                    <input placeholder="Enter Lease Starting Date" name="sdate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    <input placeholder="Enter Lease Ending Date" name="edate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    <input type="submit" name="submit" value="Generate Lease" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $pnum=addslashes($_POST['pnum']);
                    $clientnum=addslashes($_POST['clientnum']);
                    $monthlyRent=addslashes($_POST['monthlyRent']);
                    $payMethod=addslashes($_POST['payMethod']);
                    $sdate=addslashes($_POST['sdate']);
                    $edate=addslashes($_POST['edate']);
                    $query="INSERT INTO lease (Property_number,Client_number,Monthly_rent,Payment_method,Start_date,End_date)
                    VALUES ('$pnum','$clientnum','$monthlyRent','$payMethod','$sdate','$edate')";
                    $result=$conn->query($query);
                    if($result==1){
                                echo '<br>Lease Added';
                            }
                            else{
                                echo '<br>Oops, something went wrong';
                                echo("Error description: " . mysqli_error($conn));
                            }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Component End  -->

</div>
</body>
</html>