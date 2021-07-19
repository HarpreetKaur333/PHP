<?php
define('IMG_PATH', 'images');

$previsions = [
    '2018-02-11' => [
        'image_file' => 'degagement.gif',
        'image_desc' => 'icone degagement',
        'temperature' => '-17ºC',
    ],
    '2018-02-12' => [
        'image_file' => 'soleil_nuage.gif',
        'image_desc' => 'icone soleil et nuage',
        'temperature' => '-11ºC',
    ],
    '2018-02-13' => [
        'image_file' => 'neige.gif',
        'image_desc' => 'icone de neige',
        'temperature' => '-12ºC',
    ],
    '2018-02-14' => [
        'image_file' => 'soleil.gif',
        'image_desc' => 'icone soleil',
        'temperature' => '-15ºC',
    ],
    '2018-02-15' => [
        'image_file' => 'neige.gif',
        'image_desc' => 'icone de neige',
        'temperature' => '-11ºC',
    ],
    '2018-02-16' => [
        'image_file' => 'soleil.gif',
        'image_desc' => 'icone soleil',
        'temperature' => '-15ºC',
    ],
];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Exercice 4-1 Weather forcast</title>
    <style>
        body {
            width: 300px;
            margin: auto;
            border: 1px solid darkgrey;
            padding: 5px;
        }
    </style>

</head>

<body>
    <div>
        <header>
            <h1>Weather forcast</h1>
        </header>
        <main>
            <?php foreach ($previsions as $key => $weatherforcast) {
    echo $key.' '; ?>
            <img src="images/<?php echo $weatherforcast['image_file']; ?>"
                alt="<?php echo $weatherforcast['image_desc']; ?>">

            <?php echo $weatherforcast['temperature'].'<br>';
}?>
        </main>
    </div>
</body>

</html>