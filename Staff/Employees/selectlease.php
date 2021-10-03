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
    <title>Sewana | Select Lease</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            margin-top: -8vh;
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
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/createlease.php">Create</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/updatelease.php">Update</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/deletelease.php">Delete</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Lease Information</h3>

<br>
<div class="container align-items-center">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8 p-3">
            <div class="search"> <i class="fa fa-search"></i>
                <form action="selectlease.php" method="get" style="width:100%;">
                <?php 
                    $q1 = "SELECT `Lease_ID` from lease";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Lease_ID'].'>'.$row1['Lease_ID'].'</option>';
                    }
                    echo "<label for='Lease_ID'>Select Lease ID: </label>";
                    echo "<select name = 'Lease_ID' class='form-control' required>".$newslist."</select>";
                    ?>
                    <input type="submit" name="submit" class="btn-outline-primary p-3 align-items-center" value="Search">
                </form><br><br>
            </div>
        </div>
    </div>
</div>

<br>

<?php
    $query="select * from lease";
    if(isset($_GET['submit'])){
        $search=$_GET['Lease_ID'];
        $query="select * from lease where Lease_ID LIKE '$search'";
    $result=$conn->query($query);
    if(!$result){
        echo "Sorry, we don not have an Requirement with that Number";
    }
    else{
        echo "<br><table class=\"table\" border=\"1\" cellpadding=\"4\" style=\"text-align:center;\">
        <tr>
          <th>Lease_ID</th>
          <th>Property_number</th>
          <th>Client_number</th>
          <th>Monthly_rent</th>
          <th>Availability</th>
          <th>Payment_method</th>
          <th>Start_date</th>
          <th>End_date</th>
        </tr>";
        while ($row=$result->fetch_assoc()){
            $Lease_ID=$row['Lease_ID'];
            $Property_number=$row['Property_number'];
            $Client_number=$row['Client_number'];
            $Monthly_rent=$row['Monthly_rent'];
            $Availability=$row['Availability'];
            $Payment_method=$row['Payment_method'];
            $Start_date=$row['Start_date'];
            $End_date=$row['End_date'];
            echo "<tr>
            <td>$Lease_ID</td>
            <td>$Property_number</td>
            <td>$Client_number</td>
            <td>$Monthly_rent</td>
            <td>$Availability</td>
            <td>$Payment_method</td>
            <td>$Start_date</td>
            <td>$End_date</td>
            </tr>";
        }
    }
}
?>
</table>

<?php include '/wamp64/www/Sewana/footer.php'; ?>
</body>
</html>