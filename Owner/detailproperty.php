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
                <a class="nav-link active" aria-current="page" href="/Sewana/Owner/propertyview.php">Property Views</a>
                <a class="nav-link active" aria-current="page" href="/Sewana/Owner/adproperty.php">Advertisements</a>
                <a class="nav-link active" aria-current="page" href="/sewana/logout.php">Log out</a>
                    <!--<a class="nav-link active" aria-current="page" href="..\Clients\Ask Branch.php">Rent your Property</a>-->
                    <!--<a class="nav-link active" aria-current="page" href="..\Staff\staff.php">Employees</a>-->

                </div>
            </div>
    </div>
</nav>

<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Your Properties</h3>

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
        $query="SELECT * from property where Owner_ID='".$search."'";
        $result=$conn->query($query);
        if(!empty($result) && $result->num_rows > 0){
            echo "<br><table class=\"table\" border=\"1\" cellpadding=\"4\" style=\"text-align:center;\">
        <tr>
          <th>Property_number</th>
          <th>Address</th>
          <th>Proposed_rental</th>
          <th>Number_of_rooms</th>
          <th>Availability</th>
          <th>Type</th>
          <th>Owner_ID</th>
          <th>Branch_ID</th>
          <th></th>
        </tr>";
        while ($row=$result->fetch_assoc()){
            $Property_number=$row['Property_number'];
            $Address=$row['Address'];
            $Proposed_rental=$row['Proposed_rental'];
            $Number_of_rooms=$row['Number_of_rooms'];
            $Availability=$row['Availability'];
            $Type=$row['Type'];
            $Owner_ID=$row['Owner_ID'];
            $Branch_ID=$row['Branch_ID'];
           
            echo "<tr>
            <td>$Property_number</td>
            <td>$Address</td>
            <td>$Proposed_rental</td>
            <td>$Number_of_rooms</td>
            <td>$Availability</td>
            <td>$Type</td>
            <td>$Owner_ID</td>
            <td>$Branch_ID</td>
            <td><a href=\"/Sewana/Owner/view requests.php\" style=\"text-decoration: none;width:100%;\">Change</a></td>
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