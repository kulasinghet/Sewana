<?php session_start();
if(!isset($_SESSION['Email'])){
    header("Location: /Sewana/login.php");
 }//checks if the user has logged in
 
if($_SESSION['type']!="admin"){
    header("Location: /Sewana/forbidden.php");
}
 
    $conn=new mysqli("localhost","root","","Sewana");

 
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
    <title>Sewana | Branch Register</title>
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
        <a class="navbar-brand" href="managerHomepage.php">
            <button type="button" class="btn btn-secondary">Home</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/employee.php">Home</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/reg-client.php">Register Client</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/reg-staff.php">Register Staff</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/reg-owner.php">Register Owner</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Branch Register Form</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                    <input type="text" name="city" class="form-control" placeholder="Enter city"/>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number"/>
                    <input type="text" name="mail_Address" class="form-control" placeholder="Enter address"/>
                    <input type="text" name="email" class="form-control" placeholder="Enter email address"/>
                    <input type="submit" name="submit" value="Register Branch" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <?php
                    if (isset($_POST['submit'])){
                        $city=addslashes($_POST['city']);
                        $phone=addslashes($_POST['phone']);
                        $email=addslashes($_POST['email']);
                        $mail_Address=addslashes($_POST['mail_Address']);
                        
                        $query="INSERT INTO branch (City,Phone,Mail_Address,EMail)
                        VALUES ('$city','$phone','$mail_Address','$email')";
                        $result=$conn->query($query);
                        
                        if($result){
                                    echo '<br>Branch Added';
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