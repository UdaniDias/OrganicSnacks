<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Employees</title>
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
            include "../private/initialize.php";
            $records = Employee::find_all();

            echo "<table border = 1 width=100%>";
            echo "<tr bgcolor=#ADD8E6>";
            echo "<th> id </th>";
            echo "<th> Name </th>";
            echo "<th> Email</th>";
            echo "<th> Username </th>";
            echo "<th> Mobile Number </th>";
            echo "<th> View </th>";
            echo "<th> Update </th>";
            echo "<th> Delete </th>";
            echo "</tr>";

            foreach ($records as $v_object) {
                echo "<tr>";
                echo "<td>" . $v_object->id . "</td>";
                echo "<td>" . $v_object->name . "</td>";
                echo "<td>" . $v_object->email . "</td>";
                echo "<td>" . $v_object->username . "</td>";
                echo "<td>" . $v_object->mobileNumber . "</td>";

                echo "<td> <a href = viewEmployee.php?id=" . $v_object->id . "> View </td>";
                echo "<td> <a href = update.php?id=" . $v_object->id . "> Update</td>";
                echo "<td> <a href = delete.php?id=" . $v_object->id . "> Delete</td>";
            }
            echo "</tr>";
            ?>

        </div>


        <div class="footer">
            BIS Design & Development Module <br>
            A site by w1985414 Udani Dias
        </div>
    </body>
</html>