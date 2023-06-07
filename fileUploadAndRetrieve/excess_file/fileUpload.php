<!DOCTYPE html>
<html>
    <head>
        <title>Insert Images to MySQL</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="userfile[]" value="" multiple="">
            <input type="submit" name="submit" value="Upload">
        </form>
    </body>
</html>

<?php

$mysqli = new mysqli('localhost', 'root', '', 'images') or die($mysqli->connect_error);
$table = 'cats';

$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

// $_$FILES global variable
if(isset($_FILES['userfile'])){
    $file_array = reArrayFiles($_FILES['userfile']);
    //pre_r($file_array);
    for ($i=0;$i<count($file_array);$i++){
        if ($file_array[$i]['error'])
        {
            ?> <div class="alert alert-danger">
            <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
            ?> </div> <?php    
        }
        else {
            $extensions = array('jpg', 'png', 'gif', 'jpeg');

            $file_ext = explode('.', $file_array[$i]['name']);
            // $file_ext = end($file_ext);
            $name = $file_ext[0];
            $name = preg_replace("!-!"," ", $name);
            $name = ucwords($name);

            $file_ext = end($file_ext);

            if (!in_array($file_ext, $extensions))
            {
                ?> <div class="alert alert-danger">
                <?php echo "{$file_array[$i]['name']} - Invalid extension!";
                ?> </div> <?php
            }
            else {
                $img_dir =  'web/'.$file_array[$i]['name'];
                move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);

                $sql = "INSERT IGNORE INTO $table (name,dir) VALUES ('$name', '$image_dir')";
                $mysqli->query($sql) or die($mysqli->error);

                ?> <div class="alert alert-success">
                <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                ?> </div> <?php

            }
        }
    }
}

function reArrayFiles(&$file_post){
    $isMulti    = is_array($file_post['name']);
    $file_count    = $isMulti?count($file_post['name']):1;
    $file_keys    = array_keys($file_post);

    $file_ary    = [];    //Итоговый массив
    for($i=0; $i<$file_count; $i++)
        foreach($file_keys as $key)
            if($isMulti)
                $file_ary[$i][$key] = $file_post[$key][$i];
            else
                $file_ary[$i][$key]    = $file_post[$key];

    return $file_ary;
}

