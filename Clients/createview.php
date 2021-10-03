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
                <a class="nav-link active" aria-current="page" href="/Sewana/Clients/home.php">Home</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Clients/selectview.php">Retrieve</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Clients/updateview.php">Update</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Clients/deleteview.php">Delete</a>
                <a class="nav-link active" aria-current="page" href="/sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Create View</h3>

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
                    ?>
                    
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
                    
                    <input placeholder="Enter View_Date" name="date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    
                    <textarea name="comment" class="form-control" placeholder="Enter Comment"></textarea>

                    <br>
                    <input type="submit" name="submit" value="Submit" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $clientnum=addslashes($_POST['clientnum']);
                    $pnum=addslashes($_POST['pnum']);
                    $date=addslashes($_POST['date']);
                    $comment=addslashes($_POST['comment']);
                    $query="INSERT INTO views (Client_number,Property_number,View_Date,Comment)
                    VALUES ('$clientnum','$pnum','$date','$comment')";
                    $result=$conn->query($query);
                    if($result==1){
                                echo '<br>Feedback Added';
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