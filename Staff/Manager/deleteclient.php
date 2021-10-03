<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");
}//checks if the user has logged in

if($_SESSION['type']=="manager"){
    $conn=new mysqli("localhost","Manager","manager123","Sewana");
}
else if($_SESSION['type']=="admin"){
    $conn=new mysqli("localhost","root","","Sewana");
}
else{
    header("Location: /Sewana/index.php");
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
    <title>Sewana | Delete Client</title>
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
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/reg-client.php">Create</a>
    
                    <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Delete Client</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                <?php 
                    $q1 = "SELECT `Client_number` from client";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Client_number'].'>'.$row1['Client_number'].'</option>';
                    }
                    echo "<label for='Client_number'>Select Client Number: </label>";
                    echo "<select name = 'Client_number' class='form-control' required>".$newslist."</select>";
                ?><br>
                    <input type="submit" name="submit" value="Delete" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $Client_number=addslashes($_POST['Client_number']);
                    $query1="SELECT Email from client WHERE Client_number='$Client_number'";
                    $result1=$conn->query($query1);
                    while($row1=$result1->fetch_assoc()){
                        $email=$row['Email'];
                    }
                    $query="DELETE FROM client WHERE Client_number='$Client_number'";
                    $query2="DELETE FROM userlogin WHERE Email='$email'";
                    $result=$conn->query($query);
                    $result2=$conn->query($query2);
                    if($result==1 && $result2==1){
                                echo '<br>Client Deleted';
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

<?php include '/wamp64/www/Sewana/footer.php'; ?>
</body>
</html>