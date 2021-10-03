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
    <title>Sewana | Create Advertisement</title>
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
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/employee.php">Home</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/createadhome.php">Back</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/createnews.php">Add Newspaper</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Add Advertisement</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="GET" action="">
                    <?php 
                    $q1 = "SELECT `Newspaper_id`,`Name` from newspaper";
                    $q2 = "SELECT Property_number from Property";
                    $result1 = $conn->query($q1);
                    $result2 = $conn->query($q2);
                    $newslist = "";
                    $propertylist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Newspaper_id'].'>'.$row1['Name'].'</option>';
                    }
                    while($row2 = $result2->fetch_assoc()){
                        $propertylist =$propertylist . '<option value='.$row2['Property_number'].'>'.$row2['Property_number'].'</option>';
                    }
                    echo "<label for='newsPID'>Select Newspaper: </label>";
                    echo "<select name = 'newspID' class='form-control' required>".$newslist."</select>";
                    echo "<br><label for='propNum'>Select Property: </label>";
                    echo "<select name = 'propNum' class='form-control' required>".$propertylist."</select>";
                    $conn -> close();
                    ?><br>
                    <!-- <input type="text" name="newspID" class="form-control" placeholder="Enter Newspaper ID" required/>
                    <input type="text" name="propNum" class="form-control" placeholder="Enter Property Number" required/> -->
                    <input placeholder="Enter Date" name="date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    <br><input type="submit" value="Generate Advertisement" name="submit" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <br>
                <?php
                if(isset($_GET['submit'])){
                    $newspID=$_GET['newspID'];
                    $propNum=$_GET['propNum'];
                    $date=$_GET['date'];
                    $query="insert into advertise (Newspaper_Id,Property_number,Date)
                    VALUES('$newspID','$propNum','$date');";
                    if ($conn -> query($query)){
                        echo "You Added an Advertisement Successfully";
                    }
                    else{
                        echo "Oops, something went wrong :(";
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