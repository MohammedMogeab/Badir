<?php

$heading = "update test";

//require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);



// $userID = 1;



// // $note = $db->query("SELECT * from executive_partners where id = :id ", [
// //   'id' => $_POST['id'],
// // ])->findOrFail();

// authorize($note['other_id'] == $userID);




// $errors = [];

// if (!(Validator::string($_POST['anme'], 1, 255))) {
//     $errors["titel"] = "Titel  is too short or too long";
// }
// // if (!(Validator::string($_POST['body'], 1, 1000))) {
// //     $errors["titel"] = " body is too short or long";
// // }


// if (! empty($errors)) {
  
//     require "views/pages/executive_partners/edit_view.php";
//     die();
// }
 

// // $db->query("UPDATE executive_partners set name = :name  " , [
// //     'name' => $_POST['name'],

// // ]);
// $partners = $db->query("SELECT * from partners where partner_id = :partner_id",[
//     'partner_id' => $_POST['partner_id']
// ])->findOrFail();

// $partners['phones'] = $db->query(
//     "SELECT phone, type from partners_phones
//     WHERE partner_id = :partner_id",[
//         'partner_id' => $_POST['partner_id']
//     ]
// )->fetchAll();

// $partners['accounts'] = $db->query(
//     "SELECT account, account_type from partners_accounts
//     WHERE partner_id = :partner_id",[
//         'partner_id' => $_POST['partner_id']
//     ]
// )->fetchAll();


// // add validation code here ------------------------------------------------------------------------------------------

// $db->query("UPDATE partners
// SET
// (
//     name = :name,
//     logo = :logo,
//     description = :description,
//     more_information = :more_information,
//     email = :email,
//     directorate = :directorate,
//     county = :county,
//     city = :city,
//     street = :street
// ) WHERE partner_id = :partner_id",[
//     'name' => $_POST['name'],
//     'logo' => $_POST['logo'],
//     'description' => $_POST['description'],
//     'more_information' => $_POST['more_information'],
//     'email' => $_POST['email'],
//     'directorate' => $_POST['directorate'],
//     'county' => $_POST['county'],
//     'city' => $_POST['city'],
//     'street' => $_POST['street'],
//     'partner_id' => $_POST['partner_id']
// ]);
// for($i = 0; $i < count($_POST['phones']); $i++){
//     $phone = $_POST['phones'][$i];
//     $db->query(
//         "UPDATE partner_phones 
//         SET
//         (
//             phone = :phone,
//             type = :type
//         )WHERE partner_id = :partner_id and phone = :L_phone and type = :L_type",[
//             'partner_id' => $_POST['partner_id'],
//             'phone' => $phone['phone'],
//             'type' => $phone['type'],
//             'L_type' => $partners['phones'][$i]['type'],
//             'L_phone' => $partners['phones'][$i]['phone']
//         ]
//     );
// }
// for($i = 0; $i < count($_POST['accounts']); $i++){
//     $account = $_POST['accounts'][$i];
//     $db->query(
//         "UPDATE partners_accounts 
//         SET
//         (
//             account = :account,
//             account_type = :account_type
//         )WHERE partner_id = :partner_id and account = :L_account and account_type = :L_account_type",[
//             'partner_id' => $_POST['partner_id'],
//             'account' => $account['account'],
//             'account_type' => $account['account_type'],
//             'L_account' => $partners['accounts'][$i]['account'],
//             'L_account_type' => $partners['accounts'][$i]['account_type']
//         ]
//     );
// }




try {
    $db->query(
        "UPDATE partners
        SET 
            name = COALESCE(:name, name),
            description = COALESCE(:description, description),
            more_information = COALESCE(:more_information, more_information),
            email = COALESCE(:email, email),
            directorate = COALESCE(:directorate, directorate),
            country = COALESCE(:country, country),
            city = COALESCE(:city, city),
            street = COALESCE(:street, street),
            phone = COALESCE(:phone, phone),
            photo = COALESCE(:photo, photo)
        WHERE partner_id = :partner_id",
        [
            'name' => isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null,
            'description' => isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null,
            'more_information' => isset($_POST['more_information']) ? htmlspecialchars($_POST['more_information']) : null,
            'email' => isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : null,
            'directorate' => $_POST['directorate'] ?? null,
            'country' => $_POST['country'] ?? null,
            'city' => $_POST['city'] ?? null,
            'street' => $_POST['street'] ?? null,
            'phone' => $_POST['phone'] ?? null,
            'photo' => $filenamenew ?? null,
            'partner_id' => $_POST['partner_id']
        ]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء تحديث البيانات";
    header("Location: /partners_edit");
    exit();
}



header("Location:". $_SERVER["HTTP_REFERER"]);
die();



