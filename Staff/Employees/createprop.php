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
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/selectprop.php">Retrieve</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/updateprop.php">Update</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/deleteprop.php">Delete</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Add Property</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                    <input type="text" name="Address" class="form-control" placeholder="Enter Address"/>
                    <input type="text" name="Proposed_rental" class="form-control" placeholder="Enter Proposed Rental"/>
                    <input type="text" name="Number_of_rooms" class="form-control" placeholder="Enter Number of Rooms"/>

                    <br>Availability&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="Availability">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select><br><br>

                    <br>Type&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="Type">
                        <option value="annex" selected>Annex</option>
                        <option value="flat">Flat</option>
                        <option value="bangalow">Bungalow</option>
                        <option value="commercial">Commercial</option>
                    </select><br><br>

                    <?php 
                    $q1 = "SELECT `Owner_ID` from property_owner";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Owner_ID'].'>'.$row1['Owner_ID'].'</option>';
                    }
                    echo "<label for='Owner_ID'>Select Owner ID: </label>";
                    echo "<select name = 'Owner_ID' class='form-control' required>".$newslist."</select>";
                    ?>

                    <?php 
                    $q1 = "SELECT `Branch_ID` from branch";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Branch_ID'].'>'.$row1['Branch_ID'].'</option>';
                    }
                    echo "<label for='Branch_ID'>Select Branch ID: </label>";
                    echo "<select name = 'Branch_ID' class='form-control' required>".$newslist."</select>";
                    ?>

                    <input type="submit" name="submit" value="Add Property" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $Address=addslashes($_POST['Address']);
                    $Proposed_rental=addslashes($_POST['Proposed_rental']);
                    $Number_of_rooms=addslashes($_POST['Number_of_rooms']);
                    $Availability=addslashes($_POST['Availability']);
                    $Type=addslashes($_POST['Type']);
                    $Owner_ID=addslashes($_POST['Owner_ID']);
                    $Branch_ID=addslashes($_POST['Branch_ID']);
                    $query="INSERT INTO property (Address,Proposed_rental,Number_of_rooms,Availability,Type,Owner_ID,Branch_ID)
                    VALUES ('$Address','$Proposed_rental','$Number_of_rooms','$Availability','$Type','$Owner_ID','$Branch_ID')";
                    $result=$conn->query($query);
                    if($result==1){
                                echo '<br>Property Added';
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