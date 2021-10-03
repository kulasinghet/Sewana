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
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/Sewana/Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="/Sewana/Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="/Sewana/Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | AD</title>
    <style>
        .w-screen{
            padding-top: 0;
            margin-top: -5vh;
        }
        .grid-cols-1{
            width: 50vw;
        }
        .text-4xl{
            padding-top: 10vh;
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
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/createprop.php">Create</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/updateprop.php">Update</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/deleteprop.php">Delete</a>
                    <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">All Properties</h3>

<br>
<div class="container align-items-center">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8 p-3">
            <div class="search"> <i class="fa fa-search"></i>
            <?php
                $query="select * from property";
                $result=$conn->query($query);
                if($result->num_rows<1){
                    echo "Sorry, we don not have any Properties";
                }
                else{
                    echo "<br><table class=\"table\" border=\"1\" cellpadding=\"4\" style=\"text-align:center;\">
                    <tr>
                    <th>Property_number</th>
                    <th>Address</th>
                    <th>Proposed_rental</th>
                    <th>Number_of_rooms</th>
                    <th>Availability</th>
                    <th>Type</th>
                    <th>Owner_ID</th>
                    <th>Branch_ID</th>
                    </tr>";
                    while ($row=$result->fetch_assoc()){
                        $Property_number=$row['Property_number'];
                        $Address=$row['Address'];
                        $Proposed_rental=$row['Proposed_rental'];
                        $Number_of_rooms=$row['Number_of_rooms'];
                        $Availability=$row['Availability'];
                        $Type=$row['Type'];
                        $Owner_ID=$row['Owner_ID'];
                        $Branch_ID=$row['Branch_ID'];
                        echo "<tr>
                        <td>$Property_number</td>
                        <td>$Address</td>
                        <td>$Proposed_rental</td>
                        <td>$Number_of_rooms</td>
                        <td>$Availability</td>
                        <td>$Type</td>
                        <td>$Owner_ID</td>
                        <td>$Branch_ID</td>
                        </tr>";
                    }
                }
            ?>
            </div>
        </div>
    </div>
</div>

<br>
</table>


</body>
</html>