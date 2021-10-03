<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");
}//checks if the user has logged in

if($_SESSION['type']!="manager"){
        if($_SESSION['type']!="admin"){
            header("Location: /Sewana/index.php");
        }
}

if($_SESSION['type']=="manager"){
    $conn=new mysqli("localhost","Manager","manager123","Sewana");
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
    <title>Sewana | STAFF</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            padding-top: 0;
        }
        .grid-cols-1{
            width: 50vw;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">
            <button type="button" class="btn btn-secondary">Sewana</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/employee.php">Home</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/deleteclient.php">Delete</a>
        
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Client Registration Form</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                    <input type="text" name="NIC" class="form-control" placeholder="Enter NIC" required/>
                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required/>
                    <input type="email" name="email" class="form-control" placeholder="Enter E-mail" required/>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Password" required/>
                    <input placeholder="Enter Registered Date" name="regDate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    <br>
                    <?php 

                    $data=$_SESSION['Email'];
                    $query1="SELECT Emp_ID FROM staff WHERE Email='".$data."'";
                    $result1=$conn->query($query1);
                    if($result1){
                        while ($attribute=mysqli_fetch_assoc($result1)){
                            $empID=$attribute['Emp_ID'];
                        }
                    }
                    else{
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;Sorry, Not an Available Manager Number.";
                    }

                    echo "<label for='Emp_ID'>Select Staff ID: </label>";
                    echo "<select name = 'empID' class='form-control' required><option>".$empID."</option></select>";
                    ?>
                    <br>
                    <?php 
                    $data=$_SESSION['Email'];
                    $query1="SELECT Branch_ID FROM staff WHERE Email='".$data."'";
                    $result1=$conn->query($query1);
                    if($result1){
                        while ($attribute=mysqli_fetch_assoc($result1)){
                            $branchID=$attribute['Branch_ID'];
                        }
                    }
                    else{
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;Sorry, Not an Available branch Number.";
                    }

                    echo "<label for='Branch_ID'>Select Branch ID: </label>";
                    echo "<select name = 'empID' class='form-control' required><option>".$branchID."</option></select>";
                    ?>
                    <input type="submit" name="submit" value="Add Client" class="btn-outline-primary p-3 align-items-center" required/>
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $NIC=addslashes($_POST['NIC']);
                    $name=addslashes($_POST['name']);
                    $email=addslashes($_POST['email']);
                    $pass=addslashes($_POST['pass']);
                    $regDate=addslashes($_POST['regDate']);
                    $query="INSERT INTO client (NIC,Full_name,email,Registered_date,Emp_Id,Branch_Id)
                    VALUES ('$NIC','$name','$email','$regDate','$empID','$branchID')";
                    $result=$conn->query($query);
                    $query1="INSERT INTO userlogin (Email,password) VALUES ('$email','$pass')";
                    $result1=$conn->query($query1);
                    if($result==1 && $result1==1){
                                echo '<br>Client Added';
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