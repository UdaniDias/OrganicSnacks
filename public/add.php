<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=stylesheet type=text/css href=style.css>
</head>

<body>
    <div class="header">
        OrganicSnacks
    </div>

    <div class="row">
        <div class="column side">
            <?php include 'navigation_all.html'; ?>
        </div>
        <div class="column middle">

            <?php
            //initializing the site
            include("../private/initialize.php");
            //execute only if the request method is not POST and not hit the submit button
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                //Display a form to input data to add a new employee
                echo " <p> Use the following form to add a new employee <br> ";

                echo "<form action=add.php method='post'>";
                echo "<table>";
                echo "<tr> <td> Name </td> <td> <input type='text' name ='name'> </td> </tr>";
                echo "<tr> <td> Email </td> <td> <input type='text' name ='email'> </td> </tr>";
                echo "<tr> <td> Username </td> <td> <input type='text' name ='username'> </td> </tr>";
                echo "<tr> <td> Mobile Number </td> <td> <input type='text' name ='mobileNumber'> </td> </tr>";
                echo "</table>";
                echo " <br> <br> <input type='submit' value='Add' />";
                echo "</form>";
            } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //Execute only if the request method is POST and only to run when submit button is clicked
                $v = new Employee(); //create an instance

                //Assigning form inputs to the object details
                $v->name = $_POST["name"];
                $v->email = $_POST["email"];
                $v->username = $_POST["username"];
                $v->mobileNumber = $_POST["mobileNumber"];

                $results = $v->create();
                if ($results) {
                    echo "Record added succesfully <br>";
                } else {
                    echo "Error in adding a new Record <br>";
                }
            }
            ?>
        </div>
        <div class="footer">
            BIS Design & Development Module<br>
            A site by w1985414 Udani Dias
        </div>
    </body>
</html>