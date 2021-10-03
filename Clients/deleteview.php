<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");

}
if($_SESSION['type']!="client"){
    header("Location: /Sewana/index.php");
}
//checks if the user has logged in
$conn=new mysqli("localhost","Client","client123","Sewana");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/Sewana/Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="/Sewana/Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="/Sewana/Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | Client</title>
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
                <a class="nav-link active" aria-current="page" href="/Sewana/Clients/home.php">Home</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Clients/createview.php">Create</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Clients/selectview.php">Retrieve</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Clients/updateview.php">Update</a>
                <a class="nav-link active" aria-current="page" href="/sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Delete View</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                <?php 
                    $data=$_SESSION['Email'];
                    $query1="SELECT Client_number FROM client WHERE Email='".$data."'";
                    $result1=$conn->query($query1);
                    if($result1){
                        while ($attribute=mysqli_fetch_assoc($result1)){
                            $Client_number=$attribute['Client_number'];
                        }
                        echo "<label for='Client_number'>Select Client Number: </label>";
                        echo "<select name = 'clientnum' class='form-control' required><option>".$Client_number."</option></select>";
                    }
                    else{
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;Sorry, This is not your ID.";
                    }

                    
                    $q2 = "SELECT `Property_Number` from property";
                    $result2 = $conn->query($q2);
                    $newslist2 = "";
                    while($row2 = $result2->fetch_assoc()){
                        $newslist2 = $newslist2 . '<option value='.$row2['Property_Number'].'>'.$row2['Property_Number'].'</option>';
                    }
                    echo "<label for='Property_Number'>Select Property Number: </label>";
                    echo "<select name = 'Property_Number' class='form-control' required>".$newslist2."</select>";
                ?>

                    <br>
                    <br><input type="submit" name="submit" value="Delete" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $Client_number=addslashes($_POST['clientnum']);
                    $Property_Number=addslashes($_POST['Property_Number']);
                    $query="DELETE FROM views WHERE Client_number='$Client_number' AND Property_Number='$Property_Number'";
                    $result=$conn->query($query);
                    if($result==1){
                                echo '<br>View Deleted';
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

<!-- <?php include '/wamp64/www/Sewana/footer.php'; ?> -->
</body>
</html>