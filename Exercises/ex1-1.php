<?php
$name = 'Harpreet kaur';
$age = 25;
$city = 'Montreal';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Exercise - First Page</title>
</head>

<body>
    <h1>Presentation</h1>

    <p>
        Hello my name is <b><?php echo $name; ?></b> and I <b><?php echo $age; ?></b>
        years
        old. <br>
        I live in the city of <b><?php echo $city; ?></b>.
    </p>


</body>

</html>