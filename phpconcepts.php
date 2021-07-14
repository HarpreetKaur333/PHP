<?php $title = 'first php page';
$description = 'learning php using w3 school'; ?>
<!DOCTYPE HTMl>

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?>
    </title>
    <meta name="dec" value="<?php echo $description; ?>">
    </meta>
</head>

<body>
    <h1>PHP basic Concept</h1>
    <?php

        // echo 'My first PHP script!';
        $name = 'programming language';
        $NAME = 'JavaScript';
        $x = 5;
        $y = 10.5;
        echo "php is script side $name $x $y $NAME <br></br>";
        echo 'php is script side'.$name.$x.$y.$NAME.' <br></br>';
          //here name and Name are two different variable /case-sensitive!
            //php is loosely type language becuse we con't need to cast it like int to string etc
            //variable declare as local, static, global
            $a = 123;
    function checkScopeOfVariable()
    {
        static $c = ' i am static variable';
        $b = 'hello , i am local variable';
        // echo "$a"; //here a show error because ,using varible inside function
        echo "$b <br></br>";
        global $a;
        echo "$c <br></br>";
        echo "access global variable using keyword Global $a <br></br>";
    }
    checkScopeOfVariable();
    echo "$a <br></br>"; //here use $a as global varible
    // echo "$b"; here var b show error becuase of local variable
 ?>
    <h5>echo and print ,data type</h5>
    <?php
    echo 'Hello ','how ' ,'Are ', 'You ',' !!!';

    $int = 12;
    $float = 12.5;
    $string = 'hello php';
    $TF = true;
    $array = ['hello', 'how', 'Are ', 'You', '!!!'];
    $null = null;
    var_dump($float);
    var_dump($int);
    var_dump($string);
    var_dump($TF);
    var_dump($array);
    var_dump($null);
    ?>
    <h5>String function in php</h5>
    <?php
    echo strlen('programming language ');
    echo '<br></br>';
    echo str_word_count('programming language ');
    echo '<br></br>';
    echo strrev('programming language ');
    echo '<br></br>';
    echo strpos('programming language php', 'php'); //here it consider space as one letter output 21
    echo '<br></br>';
    echo strpos('programming language php', 'html'); //here rtuen 1
    echo '<br></br>';
    echo str_replace('programming language php', 'html', 'JS');
    echo '<br></br>';

    ?>
    <h5>Operators</h5>
    <?php
    const HEIGHT = 1200; //this use as compiler time, cannot be used to conditionally define const
    echo HEIGHT;
    echo '<br>';
    define('TXT', 'Hello Php', false); // we use at run time, we define it in conditionally like if loop
    echo TXT;
    echo '<br>';
    echo rand(1, 1000);
    // unset($TXT);
    // echo TXT;
    // echo '<br>';
//  for exapmle
    // if (condition) {
    //     # code...
    //     const FOOd=1200; //here it show error
    // }
    // if (condition) {
    //     // code...
    //     define(FOOD, 1200);
    //     echo FOOD;
    // }
    $my_var = 'Hello User';
    echo ' before unset : '.$my_var;
    echo "\n";
    unset($my_var); // unsets a variable.
    // echo 'after unset : '.$my_var; //here it show error
    echo '<br>';
    $my_val = 12.0;
    if (isset($my_val)) {
        echo 'value is set';
    // code...
    } else {
        echo 'not set';
    }

    ?>
    <h4>print_r/array</h4>
    <?php
    $array = ['hello', 'how', 'are', 'u'];
    // echo $array  here it show error
    print_r($array);
    echo '<br>';
    ?>
    <h5>single quote/double</h5>
    <?php
    $fname = "firstName 'harpreet' kaur<br>";
    $lname = 'lastName " dhillon"<br>';
    echo $fname;
    echo $lname;
    ?>
    <?php
        $str = "Hello world. It's a beautiful day.";
        // echo explode(' ', $str); //here it show error because string to array conversion ,it return array
        // we use print_r
        print_r(explode(' ', $str));
        echo '<br>';
        // it takes three parameters explode(separator,string,limit) //limit is option
        print_r(explode('.', $str));
        echo '<br>';
        print_r(explode('.', $str, 0));

    ?>
</body>

</HTMl>
<!-- <?php $xyz = 123.00;
echo $xyz;

// not need to close last tag in php -->
