<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
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
            <?php include 'navigation.html'; ?>
        </div>
        <div class="column middle">
            <?php
            //initializing the site
            include "../private/initialize.php";
            //checks for submission
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                //Getting store in the superglobal array POST
                echo "<form action=login.php method='post'>"; 
                echo "<table>";
                echo "<tr> <td> Login Name </td> <td> <input type='text' name ='loginName'> </td> </tr>";
                echo "<tr> <td> Password </td> <td> <input type='text' name ='password'> </td> </tr>";
                echo "</table>";
                echo " <br> <br> <input type='submit' value='Login' />";
                echo "</form>";
                //checks for the form whether it has been submitted with a POST request
            } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
                $ln = $_POST["loginName"];
                $pwd = $_POST["password"];
                //calling the function of database class and passing the arguments
                $result = Admin::verify_user($ln, $pwd);
                //display product.php in a succesful login
                if ($result) {
                    echo "<script> location.href='../public/product.php';;</script>";
                } else {
                    echo "Incorrect Username or Password <br>";
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