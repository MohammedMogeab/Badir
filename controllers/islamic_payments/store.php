<?php
$heading = "Create test";



use core\App;
use core\Database;

$db = App::resolve(Database::class);

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
        echo "you are not allow to uplaod file";
    }
} else {
    echo "error";
}

$errors = [];

// if (!(Validator::string($_POST['name'], 1, 255))) {
//     $errors["name"] = "Titel  is too short or too long";
// }
// if (!(Validator::string($_POST['body'], 1, 1000))) {
//     $errors["titel"] = " body is too short or long";
// }


try {
    $db->query(
        "INSERT INTO islamic_payments (
            type,
            cost,
            paid_cost,
            payment_date,
            user_id,
            photo,
            name,
            short_description
        ) VALUES (
            :type,
            :cost,
            :paid_cost,
            :payment_date,
            :user_id,
            :photo,
            :name,
            :short_description
        )",
        [
            'type' => htmlspecialchars($_POST['type']),
            'cost' => filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'paid_cost' => filter_var($_POST['paid_cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'payment_date' => $_POST['payment_date'] ?? date('Y-m-d H:i:s'), // Default to current timestamp
            'user_id' => $_POST['user_id'] ?? 1,
            'photo' => $filenamenew,
            'name' => $_POST['name'],
            'short_description' => $_POST['short_description']

        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_projects_create");
    exit();
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
die();
