<?php

// if (!isset($index_loaded)) {
//     header('HTTP / 01 400 this page can not be accessed directly');
//     exit('this page cannot accessed directly');
// }
function Array_Display($array)
{
    echo '<table>';
    echo '<tr>
        <th style="border:1px solid black">index/key</th>
        <th style="border:1px solid black">value</th>
    </tr>';
    foreach ($array as $key => $value) {
        echo '<tr>
        <td style="border:1px solid black">'.$key.'</td>
        <td style="border:1px solid black">'.$value.'</td>
    </tr>';
    }
    echo '</table>';
}
function visitorCount()
{
    if (file_exists('visitors_counter.txt')) {
        $count = file_get_contents('visitors_counter.txt');
        $count = intval($count);
    } else {
        //first time called
        $count = 0;
        $dir = getcwd();

        $filename = $dir.DIRECTORY_SEPARATOR.'visitors_counter.txt';
        $file = fopen($filename, 'w');
        fwrite($file, $count);
        fclose($file);
    }
    ++$count;
    file_put_contents('visitors_counter.txt', $count);

    return $count;
}
function Table_display($table)
{
    $html_table = '<div class="table-responsive-lg col-lg-12 p-2 m-2" style="height:18.0em; overflow:auto;"><table class="table table-striped table-md table-bordered table-hover table-responsive">';
    if (count($table) === 0) {
        return 'table record is empty.';
    }
    $html_table .= '<thead class="thead-light">';
    $col_name = array_keys($table[0]);
    foreach ($col_name as $each_col_name) {
        $html_table .= '<th>'.$each_col_name.'</th>';
    }
    $html_table .= '<th>Action</th>';
    $html_table .= '</thead>';
    $html_table .= '<tbody>';
    foreach ($table as $each_table_row) {
        $html_table .= '<tr>';
        foreach ($each_table_row as $one_column) {
            $html_table .= '<td>'.$one_column.'</td>';
        }
        // $html_table .= '<td><input type="button" name="view" value="view" class="btn btn-primary"/><input type="button" name="edit" value="edit" class="btn btn-primary"/><input type="button" name="delete" value="delete" class="btn btn-primary"/></td>';
        $html_table .= '<td class="col-md-1"><span>
        <a href="index.php?op=102" class="display"><i class="fas fa-eye m-1"></i></a>
        <a href="index.php?op=103" class="edit"><i class="fas fa-edit m-1"></i></a>
        <a href="index.php?op=104" class="delete"><i class="fa fa-trash m-1" ></i></a>
        </span></td>';
        $html_table .= '</tr>';
    }
    $html_table .= '</tbody>';
    $html_table .= '</table></div>';

    return $html_table;
}

function redirect($newURL)
{
    header('location:', $newURL);
}

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function my_gmail_function($to, $subject, $msg)
{
    /* Exception class. */
    require 'src/Exception.php';

    /* The main PHPMailer class. */
    require 'src/PHPMailer.php';

    /* SMTP class, needed if you want to use SMTP. */
    require 'src/SMTP.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';

    $mail->Host = 'ssl://smtp.gmail.com'; // SMTP server example
    $mail->SMTPDebug = 0;         // enables SMTP debug information (for testing)
    $mail->SMTPAuth = true;       // enable SMTP authentication
    $mail->Port = 465;            // set the SMTP port for the GMAIL server
    $mail->Username = $to; // SMTP account username example
    $mail->Password = '';
    $mail->setFrom($to, 'JF L');

    /* Add a recipient. */
    $mail->addAddress('nishantbatra360@gmail.com', 'Error_Code');

    /* Set the subject. */
    $mail->Subject = $subject;

    /* Set the mail message body. */
    $mail->Body = 'Demo mail is working';
    try {
        $mail->send();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function Crash($code, $msg)
{
    //get current date and time
    $str_msg = 'Date: '.date('Y/m/d').' ip Address of System: '.$_SERVER['REMOTE_ADDR'].' HTTP Code: '.$code.' Error Message: '.$msg;
    $date = date('Y/m/d');
    //log error into file
    $file = fopen('log/error_log.log', 'a+');
    fwrite($file, $str_msg);
    fclose($file);
    my_gmail_function('dhillonharpreet333@gmail.com', 'Error On Sever', $str_msg);

    header('HTTP/1.0 '.$code.''.$msg);
    exit($msg);
}
function CIN($name, $maxLength)
{
    if (!isset($_REQUEST[$name])) {
        if (strlen($_REQUEST[$name] > $maxLength)) {
            Crash(400, 'Form input too long..!! :'.$name);
        }
    }
}
function check_htmlentities($str)
{
    return htmlentities($str);
}

/**
 * Check uploaded file contains a valid image
 * extension must be: .jpg , .JPG , .gif ou .png.
 *
 * @param string $file_input the file input name on the HTML form
 * @param int    $Max_Size   maximum file size, default 500kb
 *
 * @return 'OK' or error message
 */
function Picture_Uploaded_Is_Valid($file_input, $Max_Size = 500000)
{
    //Form must have <form enctype="multipart/form-data" ..
    //otherwise $_FILE is undefined
    // $file_input is the file input name on the HTML form
    if (!isset($_FILES[$file_input])) {
        return 'No image uploaded';
    }

    //check for upload error
    if ($_FILES[$file_input]['error'] != UPLOAD_ERR_OK) {
        return 'Error picture upload: code='.$_FILES[$file_input]['error'];
    }

    // Check image size
    if ($_FILES[$file_input]['size'] > $Max_Size) {
        return 'Image too big, max file size is '.$Max_Size.' Kb';
    }

    // Check that file actually contains an image
    $check = getimagesize($_FILES[$file_input]['tmp_name']);
    if ($check === false) {
        return 'This file is not an image';
    }

    // Check extension is jpg,JPG,gif,png
    $filePathArray = pathinfo($_FILES[$file_input]['name']);
    $fileExtension = $filePathArray['extension'];
    if ($fileExtension != 'jpg' && $fileExtension != 'JPG' && fileExtension != 'gif' && fileExtension != 'png') {
        return 'Invalid image file type, valid extensions are: .jpg .JPG .gif .png';
    }

    return 'OK';
}

/**
 *  Function to save uploaded image in a target directory
 *  (and display image for testing).
 *
 *  @param string $file_input the file input name on the HTML form
 *  @param string $target_dir the directory where to save picture
 *
 *  @return string OK or error message
 */
function Picture_Uploaded_Save_File($file_input, $target_dir)
{
    $message = Picture_Uploaded_Is_Valid($file_input); // voir fonction
    if ($message === 'OK') {
        // Check that no file with the same name already exists
        // in the target directory
        $target_file = $target_dir.basename($_FILES[$file_input]['name']);
        if (file_exists($target_file)) {
            return 'This file already exists';
        }

        // Create the file with move_uploaded_file()
        if (move_uploaded_file($_FILES[$file_input]['tmp_name'], $target_file)) {
            // ALL OK
            //display image for testing, comment next line when done
            //echo '<img src="'.$target_file.'">';

            return 'OK';
        } else {
            return 'Error in move_upload_file';
        }
    } else {
        // upload error, invalid image or file too big
        return $message;
    }
}

/**
 * Return the image MIME type (content-type).
 *
 * Attention: Use function Photo_Uploaded_Is_Valid() before !
 * We take for granted the photo validity was verified before.
 *
 * @param string $file_input the file name input on the form
 *
 * @return string the MIME type for example 'image/jpeg' or 'ERROR'
 */
function Picture_Uploaded_Mime_Type($file_input)
{
    $filePathArray = pathinfo($_FILES[$file_input]['name']);
    $fileExtension = $filePathArray['extension'];
    switch ($fileExtension) {
        case 'jpg':
        case 'JPG':
            return 'image/jpeg';

        case 'gif':
        case 'GIF':
            return 'image/gif';

        case 'png':
        case 'PNG':
            return 'image/png';
    }

    return 'ERROR';
}

/**
 * Converts image in base64 to put in a database.
 *
 * @param string $file_input the file name input on the form
 */
function Picture_Uploaded_base64($file_input)
{
    $message = Picture_Uploaded_Is_Valid($file_input); // see function
    if ($message !== 'OK') {
        return $message;
    }
    $image = file_get_contents($_FILES[$file_input]['tmp_name']);

    // convert image in base64
    // https://www.php.net/manual/en/function.base64-encode.php
    $image_base64 = base64_encode($image);

    return $image_base64;
}

/**
 * Exemple function to save image
 * in a DB, in a column of type BLOB.
 */
function Picture_Save_BLOB($file_input)
{
    $message = Picture_Uploaded_Is_Valid($file_input); // voir fonction
    if ($message === 'OK') {
        $mime_type = Picture_Uploaded_Mime_Type($file_input); // voir function
        if ($mime_type != 'ERROR') {
            $image = file_get_contents($_FILES[$file_input]['tmp_name']);

            // converts image in base64
            // https://www.php.net/manual/en/function.base64-encode.php
            $image_base64 = base64_encode($image);

            //display image in binary format
            echo '<h2>image received</h2>';
            echo '<img src="data:'.$mime_type.';base64,'.$image_base64.'" alt="an image" />';

            // insert in database classicmodels, see db_pdo.php
            // table productlines, image field mediumblob
            // BLOB = binary long object to save images in DB mysql
            $DB = new db_pdo();
            $DB->query('UPDATE productlines SET image="'.$image_base64.'" WHERE productLine="planes"');

            //extract and display to test
            $records = $DB->querySelect('SELECT * from productlines WHERE productLine="planes"');
            $image_base64 = $records[0]['image'];
            echo '<h2>image in database</h2>';
            echo '<img src="data:image;base64,'.$image_base64.'" alt="an image" />';
        } else {
            echo 'Error file type not supported';
        }
    } else {
        echo $message;
    }
}
