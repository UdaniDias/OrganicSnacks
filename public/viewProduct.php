<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Products</title>
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
            //passing the id to fetch records
            $v_id = $_GET['id'];
            $v_records = Product::find_by_id($v_id);

            echo "id = " . $v_records->id . "<br>";
            echo "name = " . $v_records->name . "<br>";
            echo "description = " . $v_records->description . "<br>";
            echo "price = " . $v_records->price . "<br>";
            ?>
        </div>
        <div class="footer">
            BIS Design & Development Module <br>
            A site by w1985414 Udani Dias
        </div>
    </body>
</html>