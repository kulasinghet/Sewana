<?php session_start();
if(!isset($_SESSION['Email'])){
   header("Location: /Sewana/login.php");

}
if($_SESSION['type']!="owner"){
    header("Location: /Sewana/index.php");
}
//checks if the user has logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/Sewana/Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="/Sewana/Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="/Sewana/Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | Owner</title>
    <style>
        .text-4xl{
            padding-top: 10vh;
        }
        .w-screen{
            padding-top: 0;
            margin-top: -15vh;
        }
        .p-3{
            text-decoration: none;
            text-align:center;
            border-radius: 5px;
            margin-top: 1vh;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
            <button type="button" class="btn btn-secondary">Home</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/Sewana/Owner/home.php">Home</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Owner/detailproperty.php">Property Details</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Owner/adproperty.php">Advertisements</a>
                <a class="nav-link active" aria-current="page" href="/sewana/logout.php">Log out</a>
                    <!--<a class="nav-link active" aria-current="page" href="..\Clients\Ask Branch.php">Rent your Property</a>-->
                    <!--<a class="nav-link active" aria-current="page" href="..\Staff\staff.php">Employees</a>-->

                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Client Feedback</h3>

<br>
<div class="flex items-center justify-center w-screen  p-3">
<div class="form-outline width" style="width:70%;">
    <form action="" method="GET" style="width:100%;">
        <input type="search" name="search" id="form1" class="form-control" placeholder="Provide your Owner ID" aria-label="Search"/>
        <input type="submit" name="submit" class="btn-outline-primary p-3 align-items-center" value="Search">
    </form><br><br>
</div>
</div>
<br>


<?php
    $conn=mysqli_connect("localhost","Owner","owner123","Sewana");
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_GET['submit'])){
        $search=$_GET['search'];
        $data=$_SESSION['Email'];
        $t=$_SESSION['T'];
        if($t="person"){
            $query1="SELECT property.Owner_ID FROM property inner join person WHERE person.Email='".$data."'";
        }
        else{
            $query1="SELECT property.Owner_ID FROM property inner join company WHERE company.Email='".$data."'";
        }
        $result1=$conn->query($query1);
        if($result1){
            while ($attribute=mysqli_fetch_assoc($result1)){
                $ownerid=$attribute['Owner_ID'];
            }
        }
        else{
            echo "&nbsp;&nbsp;&nbsp;&nbsp;Sorry, Not an Available Owner ID.";
        }
        
        if($ownerid!=$search){
            echo("&nbsp;&nbsp;&nbsp;&nbsp;Cannot Access other Owner Details");
        }
        else{
        $query="SELECT views.Client_number, views.Property_Number, views.View_Date, views.Comment from views natural join property where Property_Number=(SELECT Property_number from property where Owner_ID='".$search."')";
        $result=$conn->query($query);
        if(!empty($result) && $result->num_rows > 0){
            echo "<br><table class=\"table\" border=\"1\" cellpadding=\"4\" style=\"text-align:center;\">
        <tr>
          <th>Client_number</th>
          <th>Property_Number</th>
          <th>View_Date</th>
          <th>Comment</th>
        </tr>";
        while ($row=$result->fetch_assoc()){
            $Client_number =$row['Client_number'];
            $Property_Number=$row['Property_Number'];
            $View_Date=$row['View_Date'];
            $Comment=$row['Comment'];
           
            echo "<tr>
            <td>$Client_number</td>
            <td>$Property_Number</td>
            <td>$View_Date</td>
            <td>$Comment</td>
            </tr>";
        }
    }
    else{
        echo "&nbsp;&nbsp;&nbsp;&nbsp;Sorry, No Matching properties available for your requirement";
    }
}
}
?>
</table>
</body>
</html>