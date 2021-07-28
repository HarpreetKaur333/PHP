<?php
$name = 'Harpreet kaur';
$age = 25;
$city = 'Montreal';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>e</title>
</head>

<body>
    <h1>Presentation</h1>
    <?php
$age = ['Peter' => '35', 'Ben' => '37', 'Joe' => '43'];

foreach ($age as $x => $val) {
    echo "$x = $val<br>";
}
?>
    <?php $people = [
    [
    'name' => 'Jennifer Kimbers',
    'email' => 'abc@gmail.com',
    'city' => 'Seattle',
    'state' => 'Washington', ],

    [
    'name' => 'Rodney Hutchers',
    'email' => 'def@gmail.com',
    'city' => 'Los Angeles',
    'state' => 'California', ],

    [
    'name' => 'Robert Smith',
    'email' => 'ghi@gmail.com',
    'city' => 'Michigan',
    'state' => 'Missouri', ],
    ];

    $num = 0;

    foreach ($people as $person) {
        ++$num;
        echo "<br><b># $num</b><br>";
        foreach ($person as $key => $value) {
            echo "$key: $value <br>";
        }
    }

    ?>
    <?php
            $keys = array_keys($Candidats);
            for ($i = 0; $i < count($Candidats); ++$i) {
                ?>
    <td>
        <?php echo $key[i]; ?>
    </td>

    <?php
                // echo $keys[$i];
                // foreach ($Candidats[$keys[$i]] as $key => $value) {
                // }
            }
            ?>
</body>

</html>