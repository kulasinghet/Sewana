<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../Assests/CSS/stylesheet.css" rel="stylesheet">
    <link href="../../Assests/CSS/bootstrap.css" rel="stylesheet" />
    <link href="../../Assests/CSS/form.css" rel="stylesheet">
    <title>Sewana | Property Register</title>
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
                    <a class="nav-link active" aria-current="page" href="../../index.php">Log out</a>
                </div>
            </div>
    </div>
</nav>
<h3 class="text-4xl font-normal leading-normal mt-0 mb-2 text-black-800 " align="middle">Property Register Form</h3>

<div class="flex items-center justify-center w-screen min-h-screen p-10">
    <!-- Resice the preview panel to check the responsiveness -->

    <!-- Component Start -->
    <div class="grid-cols-1 gap-2 max-w-6xl">
        <!-- Tile 1 -->
        <div class="flex flex-col bg-gray-200 rounded-lg p-4 m-2">
            <div class="flex flex-col items-start mt-4">
                <form method="POST" action="../../Database/regpropertyinfo.php">
                    <input required type="text" name="propertyID" class="form-control" placeholder="Enter Property ID"/>
                    <input  type="text" name="address" class="form-control" placeholder="Enter address"/>

                    <br>Property Type
                    <select name="propertytype" id="propertytype">
                        <option value="1" selected>Flat</option>
                        <option value="2">Annex</option>
                        <option value="3">Bungalow</option>
                        <option value="4">Commercial</option>
                    </select><br><br>

                    <input  type="text" name="proposedrental" class="form-control" placeholder="Enter proposed rental"/>
                    <input  type="text" name="Norooms" class="form-control" placeholder="Enter number of rooms"/>
                    <input  type="text" name="Availability" class="form-control" placeholder="Is this available (Yes 1/ No 2)"/>
                    <input  type="text" name="ownerID" class="form-control" placeholder="Enter owner ID"/>
                    <input  type="text" name="branchID" class="form-control" placeholder="Enter branch ID"/>

                    <input type="submit" value="Register Property" class="btn-outline-primary p-3 align-items-center"/>
                </form>
            </div>
        </div>
    </div>
    <!-- Component End  -->

</div>
</body>
</html>