<?php session_start();//to start a log in session for the user 
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
    <title>Sewana | Login Admin</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            margin-top: -20vh;
        }
        .grid-cols-1{
            width: 50vw;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
            <button type="button" class="btn btn-secondary">Sewana</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </a>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Please Login</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="">
                    <input type="email" name="Email" class="form-control" placeholder="Enter E-mail" required/>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required/>
                    <input type="submit" name="submit" value="login" class="btn-outline-primary p-3 align-items-center"/>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $email=mysqli_real_escape_string($conn,$_POST['Email']);
                    $password=$_POST['password'];
                    $query="SELECT * FROM userlogin natural join staff WHERE staff.Emp_type='A' AND userlogin.Email='".addslashes($email)."' AND userlogin.password='".addslashes($password)."'";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_num_rows($result);
                    if ($row==1){
                        $_SESSION['Email']=$email;
                        $_SESSION['password']=$password;
                        $_SESSION['type']="admin";
                                echo '<script type="text/javascript">';
                                echo 'window.location.href="/Sewana/Staff/Employees/employee.php";';
                                echo '</script>';
                        exit;
                    }else{
                      echo '<br>Username or Password entered is incorrect';
                    }
                  }?>
            </div>
        </div>
    </div>
    <!-- Component End  -->

</div>

<?php include '/wamp64/www/Sewana/footer.php'; ?>
</body>
</html>

