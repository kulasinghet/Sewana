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
    <title>Sewana | Promote Employee</title>
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
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/promoteEtoA.php">Employee to Assistant</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/promoteStoM.php">Supervisor to Manager</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Promoting an Assistant to a Supervisor</h3>

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

                    $q1 = "SELECT assistant.Emp_ID from assistant,staff where Branch_ID='".$branchID."' AND Emp_type='A'";
                    $newslist = "";
                    if($result1 = $conn->query($q1)){
                        while($row1 = $result1->fetch_assoc()){
                            $newslist = $newslist . '<option value='.$row1['Emp_ID'].'>'.$row1['Emp_ID'].'</option>';
                        }
                        echo "<label for='Emp_ID'>Choose Employee ID: </label>";
                        echo "<select name = 'empID' class='form-control' required>".$newslist."</select>";
                    }

                   echo "</select>";
                    ?>
                    <input type="submit" value="Promote Employee" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <?php
                    if (isset($_POST['submit'])){
                        
                        $empID=addslashes($_POST['empID']);
                        $mydate = date("Y-m-d");

                        
                        $query="INSERT INTO supervisor (Emp_ID,Appointed_Date)
                        VALUES ('$empID','$mydate')";
                        $result=$conn->query($query);
                        if($result){
                            $last_id = mysqli_insert_id($conn);
                                    echo '<br>Employee Promoted';
                                }
                                else{
                                    echo '<br>Oops, something went wrong';
                                    echo("Error description: " . mysqli_error($conn));
                                }
                        $query1="UPDATE staff SET Emp_type='S' WHERE Emp_ID='".$empID."'";
                        $result1=$conn->query($query1);
                        if($result){
                            echo '<br>New User Updated';
                        }
                        else{
                            echo '<br>Oops, something went wrong';
                            echo("Error description: " . mysqli_error($conn));
                        }
                        
                        $conn -> commit();
                        $query2="DELETE FROM assistent WHERE Emp_ID='".$empID."'";
                        $result2=$conn->query($query2);
                        if($result2){
                                echo '<br>Assistant table updated';
                            }
                            else{
                                echo '<br>Oops, something went wrong';
                                echo("Error description: " . mysqli_error($conn));
                            }
                        
                    }
                    $conn ->close();
                    ?>
            </div>
        </div>
    </div>
    <!-- Component End  -->

</div>
</body>
</html>