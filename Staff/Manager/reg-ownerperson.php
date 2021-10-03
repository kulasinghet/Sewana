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
    <title>Sewana | STAFF</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            padding-top: 0;
            margin-top: -1rem;
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
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/reg-branch.php">Register Branch</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Owner Registration Form</h3>
<h3 class="text-2xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Category - Person</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                    <!-- <input type="text" name="NIC" class="form-control" placeholder="Enter NIC" required/>
                    
                    <input type="email" name="email" class="form-control" placeholder="Enter E-mail" required/>
                    <input placeholder="Enter Registered Date" name="regDate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    <br>
                    <?php 
                    $q1 = "SELECT `Emp_ID` from staff";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Emp_ID'].'>'.$row1['Emp_ID'].'</option>';
                    }
                    echo "<label for='Emp_ID'>Select Staff ID: </label>";
                    echo "<select name = 'empID' class='form-control' required>".$newslist."</select>";
                    ?>
                    <br> -->


                    <?php 
                    $q1 = "SELECT `Branch_ID` from branch";
                    $result1 = $conn->query($q1);
                    $newslist = "";
                    while($row1 = $result1->fetch_assoc()){
                        $newslist = $newslist . '<option value='.$row1['Branch_ID'].'>'.$row1['Branch_ID'].'</option>';
                    }
                    echo "<label for='Branch_ID'>Select Branch ID: </label>";
                    echo "<select name = 'branchID' class='form-control' required>".$newslist."</select>";
                    ?>
                    <input type="text" name="NIC" class="form-control" placeholder="Enter NIC" required/>
                    <input type="text" name="Name" class="form-control" placeholder="Enter Name" required/>
                    <input type="text" name="Address" class="form-control" placeholder="Enter Address" required/>
                    <input type="email" name="Email" class="form-control" placeholder="Enter Email" required/>
                    <input type="text" name="contact" class="form-control" placeholder="Enter Contact Number" required/>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Password" required/>
                    
                    <input type="submit" name="submit" value="Add Client" class="btn-outline-primary p-3 align-items-center" required/>
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $NIC=addslashes($_POST['NIC']);
                    $name=addslashes($_POST['Name']);
                    $email=addslashes($_POST['Email']);
                    $address=addslashes($_POST['Address']);
                    $contact=addslashes($_POST['contact']);
                    $pass=addslashes($_POST['pass']);
                    $branchID=addslashes($_POST['branchID']);
                    $query="INSERT INTO property_owner (Branch_Id)
                    VALUES ('$branchID')";
                    $result=$conn->query($query);
                    if($result){
                        echo '<br>Owner Added';
                    }
                    else{
                            echo '<br>Oops, something went wrong';
                            echo("Error description: " . mysqli_error($conn));
                    }
                    $lastid=0;
                    $query1="SELECT MAX(Owner_Id) FROM property_owner";
                    $result=$conn->query($query1);
                    if($result->num_rows<1){
                        echo "Sorry, It's Empty";
                    }
                    else{
                        while ($row=$result->fetch_assoc()){
                            $ID=$row['MAX(Owner_Id)'];
                        }
                        $query2="INSERT INTO person VALUES('$NIC','$name','$address','$email','$contact','$ID')";
                        echo $query2."<br/>";
                        $query3="INSERT INTO userlogin VALUES('$email','$pass')";
                        $result2=$conn->query($query2);
                        $result3=$conn->query($query3);
                        if($result2){
                            echo '<br>Person table updated';
                        }
                        else{
                            echo '<br>Oops, something went wrong';
                            echo("Error description: " . mysqli_error($conn));
                        } 
                        if($result3){
                            echo '<br>User table updated';
                        }
                        else{
                            echo '<br>Oops, something went wrong';
                            echo("Error description: " . mysqli_error($conn));
                        }
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