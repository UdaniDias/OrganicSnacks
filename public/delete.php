<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete</title>
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
            //passing the id to fetch records
            $v_id = $_GET['id'];
            $v_object = Employee::find_by_id($v_id);
            //execute only if the request method is not POST and not hit the delete button
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                //Display a existing data to delete
                echo " <p> Use the following form details to check before deleting existing employee records <br> ";
                echo  "<form action = delete.php?id='$v_id' method = 'post'>";
                echo "<table>";
                echo "<tr> <td> Name </td> <td> <input type='text' name ='name' value =  $v_object->name></td> </tr>";
                echo "<tr> <td> Email </td> <td> <input type='text' name ='email' value = $v_object->email> </td> </tr>";
                echo "<tr> <td> Username </td> <td> <input type='text' name ='username' value = $v_object->username> </td> </tr>";
                echo "<tr> <td> Mobile Number </td> <td> <input type='text' name ='mobileNumber' value = $v_object->mobileNumber> </td> </tr>";
                echo "</table>";
                echo " <br> <br> <input type='submit' value='Delete' />";
                echo "</form>";
            } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //Execute only if the request method is POST and only to run when delete button is clicked
                $v = new Employee(); 

                $results = $v->delete($v_id);
                if ($results) {
                    echo "Record deleted succesfully <br>";
                } else {
                    echo "Error in deleting a new Record <br>";
                }
            }
            ?>
        </div>
        <div class="footer">
            BIS Design & Development Module <br>
            A site by w1985414 Udani Dias
        </div>
    </body>
</html>