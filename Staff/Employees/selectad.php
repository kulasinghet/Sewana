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
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/createadhome.php">Create</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/deletead.php">Delete</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Search Advertisements</h3>

<br>
<div class="container align-items-center">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8 p-3">
            <div class="search"> <i class="fa fa-search"></i>
                <form action="" method="get" style="width:100%;">
                <?php 
                    $q1 = "SELECT `Name` from newspaper";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Name'].'>'.$row1['Name'].'</option>';
                    }
                    echo "<label for='Name'>Select Newspaper: </label>";
                    echo "<select name = 'Name' class='form-control' required>".$newslist."</select>";
                    ?><br>
                    <!-- <input type="search" name="search" class="form-control" placeholder="Enter Advertisement ID"><br> -->
                    <input type="submit" name="submit" class="btn-outline-primary p-3 align-items-center" value="Search">
                </form><br><br>
            </div>
        </div>
    </div>
</div>

<br>

<?php
    $query="select * from advertise";
    if(isset($_GET['submit'])){
        $search=$_GET['Name'];
        $query="select * from advertise inner join newspaper on advertise.Newspaper_Id=newspaper.Newspaper_Id WHERE Name LIKE '%$search%'";
    $result=$conn->query($query);
    if($result->num_rows<1){
        echo "Sorry, we don not have an Advertisement in that Newspaper";
    }
    else{
        echo "<br><table class=\"table\" border=\"1\" cellpadding=\"4\" style=\"text-align:center;\">
        <tr>
          <th>Advertisement_Id</th>
          <th>Newspaper_Id</th>
          <th>Property_number</th>
          <th>Date</th>
        </tr>";
        while ($row=$result->fetch_assoc()){
            $adId=$row['Advertisement_Id'];
            $newspID=$row['Newspaper_Id'];
            $propNum=$row['Property_number'];
            $date=$row['Date'];
            echo "<tr>
            <td>$adId</td>
            <td>$newspID</td>
            <td>$propNum</td>
            <td>$date</td>
            </tr>";
        }
    }
}
    $conn->close();
?>
</table>


</body>
</html>