<?php session_start();
if(!isset($_SESSION['Email'])){
    header("Location: /Sewana/login.php");
 }//checks if the user has logged in
 
if($_SESSION['type']!="admin"){
    header("Location: /Sewana/index.php");
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
    <link href="/Sewana/Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="/Sewana/Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="/Sewana/Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | Admin</title>
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
        <a class="navbar-brand" href="managerHomepage.php">
            <button type="button" class="btn btn-secondary">Home</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Employees/employee.php">Home</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/promote-emp.php">Promote</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Staff/Manager/reg-owner.php">Delete</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/logout.php">Log out</a>
                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Employee Register Form</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                    Choose Employee Type<br>
                    <input type="radio" id="employeeposition" name="employeeposition" value="A" > Admin <br>
                    <input type="radio" id="employeeposition" name="employeeposition" value="M" > Manager <br>
                    <input type="radio" id="employeeposition" name="employeeposition" value="S" > Supervisor <br>
                    <input type="radio" id="employeeposition" name="employeeposition" value="AS" > Assistant <br>
                    <input type="radio" id="employeeposition" name="employeeposition" value="E" > Other Employee <br><br>

                    
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

                    $q1 = "SELECT supervisor.Supervisor_No from supervisor, staff where supervisor.Emp_ID=staff.emp_ID and staff.Branch_ID='".$branchID."'";
                    $newslist = "";
                    if($result1 = $conn->query($q1)){
                        while($row1 = $result1->fetch_assoc()){
                            $newslist = $newslist . '<option value='.$row1['Supervisor_No'].'>'.$row1['Supervisor_No'].'</option>';
                        }
                        echo "<label for='Supervisor_No'>If Assistant, Provide Supervisor ID: </label>";
                        echo "<select name = 'ID' class='form-control'>".$newslist."<option selected></option></select>";
                    }
                    ?>


                    <input required type="text" name="name" class="form-control" placeholder="Enter Name"/>
                    <input required type="text" name="phone" class="form-control" placeholder="Enter Phone Number"/>
                    <input required type="text" name="salary" class="form-control" placeholder="Enter Salary"/>

                    Gender: &nbsp;&nbsp;<input type="radio" name="gender" value="M" checked/> Male &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="F"/> Female<br><br>

                    <input placeholder="Enter Date of Birth" name="dob" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    
                    <input required type="email" name="email" class="form-control" placeholder="Enter Email" required/>
                    <input required type="password" name="pass" class="form-control" placeholder="Enter password" required/>

                    <input placeholder="Enter Start Date" name="startdate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required/>
                    
                    <?php 
                    $data=$_SESSION['Email'];
                    $query1="SELECT Branch_ID FROM staff WHERE Email='".$data."'";
                    $result1=$conn->query($query1);
                    echo "<label for='Branch_ID'>Select Branch ID: </label>";
                    echo "<select name='Branch_ID' class='form-control' required>";
                    if($result1){
                        while ($attribute=mysqli_fetch_assoc($result1)){
                            $branchID=$attribute['Branch_ID'];
                            echo "<option>".$branchID."</option>";
                        }
                    }
                    else{
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;Sorry, Not an Available branch Number.";
                    }

                   echo "</select>";
                    
                    
                    echo "<br><input type='submit' name='submit' value='Register Employee' class='btn-outline-primary p-3 align-items-center'/>
                </form>";

                if (isset($_POST['submit'])){
                    $employeeposition=addslashes($_POST['employeeposition']);

                    $name=addslashes($_POST['name']);
                    $ID=addslashes($_POST['ID']);
                    $phone=addslashes($_POST['phone']);
                    $salary=addslashes($_POST['salary']);
                    $gender=addslashes($_POST['gender']);
                    $dob=addslashes($_POST['dob']);
                    $salary=addslashes($_POST['salary']);

                    $email=addslashes($_POST['email']);
                    $pass=addslashes($_POST['pass']);

                    $startdate=addslashes($_POST['startdate']);
                    $mydate = date("Y-m-d");
                    $query="INSERT INTO staff (Name,Phone,Salary,Gender,DOB,Email,Start_Date,Emp_type,Branch_ID)
                    VALUES ('$name','$phone','$salary','$gender','$dob','$email','$startdate','$employeeposition','$branchID')";
                    $result=$conn->query($query);
                    if($result==1){
                        $last_id = mysqli_insert_id($conn);
                                echo '<br>Employee Added';
                            }
                            else{
                                echo '<br>Oops, something went wrong';
                                echo("Error description: " . mysqli_error($conn));
                            }
                    $query1="INSERT INTO userlogin (Email,password)
                    VALUES ('$email','$pass')";
                    $result1=$conn->query($query1);
                    if($result==1){
                        echo '<br>New User Added';
                    }
                    else{
                        echo '<br>Oops, something went wrong';
                        echo("Error description: " . mysqli_error($conn));
                    }
                    
                    $conn -> commit();
                    if($employeeposition=="M"){
                        $query="SELECT Emp_ID FROM staff WHERE Email='".$email."'"; 
                        $user=$conn -> query($query);
                        while ($attribute=$user -> fetch_assoc()){
                                $empid=$attribute['Emp_ID'];
                            }

                        $query1="INSERT INTO manager(EMP_ID,Appointed_Date,Branch_Id)
                        VALUES('$empid','$mydate','$branchID')";
                        $result1=$conn->query($query1);
                        if(!$result1){
                            echo '<br>Oops, something went wrong';
                            echo("Error description: " . mysqli_error($conn));
                        }
                    }
                    elseif($employeeposition="AS"){
                        $query="SELECT Emp_ID FROM staff WHERE Email='".$email."'";
                        $result=$conn->query($query);
                        if($result){
                            while ($attribute=mysqli_fetch_assoc($result)){
                                $empid=$attribute['Emp_ID'];
                            }
                        }
                        else{
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;Sorry, Not an Available Employee ID.";
                        }
                        $query1="INSERT INTO assistant (Emp_ID,Supervisor_No)
                        VALUES('$empid','$ID')";
                        $result1=$conn->query($query1);
                        if(!$result){
                            echo '<br>Oops, something went wrong';
                            echo("Error description: " . mysqli_error($conn));
                        }
                    }
                    elseif($employeeposition="S"){
                        $query="SELECT Emp_ID FROM staff WHERE Email='".$email."'";
                        $result=$conn->query($query);
                        if($result){
                            while ($attribute=mysqli_fetch_assoc($result)){
                                $empid=$attribute['Emp_ID'];
                            }
                        }
                        else{
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;Sorry, Not an Available Employee ID.";
                        }
                        $query1="INSERT INTO supervisor (Emp_ID,Appointed_Date)
                        VALUES('$empid','$mydate')";
                        $result1=$conn->query($query1);
                        if(!$result){
                            echo '<br>Oops, something went wrong';
                            echo("Error description: " . mysqli_error($conn));
                        }
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