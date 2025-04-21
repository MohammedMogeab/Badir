<?php 
if (isset($_POST["submit"])) {

$file = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$size = $_FILES['photo']['size'];
$type = $_FILES['photo']['type'];
$error = $_FILES['photo']['error'];
$fileExt = explode('.', $file);
$fileActual = strtolower(end($fileExt));
$allow = array('jpg', 'jpeg', 'png', 'pdf');
if (in_array($fileActual, $allow)) {
    if ($error === 0) {
        if ($size < 10000000) {
            $filenamenew = uniqid('', true) . "." . $fileActual;
            $fileDestination = __DIR__ . '/../../views/media/images/' . $filenamenew;

            echo $fileDestination;
            move_uploaded_file($tmp, $fileDestination);
        } else {
            echo "your file is too big";
        }
    } else {
        echo "there was an error uploading your file";
    }
} else {
    abort(400);
}
} else {
echo "error";
}
