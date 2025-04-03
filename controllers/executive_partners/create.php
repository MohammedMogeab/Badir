<?php
$heading = "Create test";




// $db->query("INSERT INTO executive_partners (name) VALUES (':item')", [
//     'item' => $_POST['item'],
//   ]);
// $partner_id = $db->query("INSERT into partners(name, logo, description, more_information, email, directorate, county, city, street)
// values
// (
//     :name,
//     :logo,
//     :description,
//     :more_information,
//     :email,
//     :directorate,
//     :county,
//     :city,
//     :street
// ) RETURNING partner_id",[
//     'name' => $_POST['name'],
//     'logo' => $_POST['logo'],
//     'description' => $_POST['description'],
//     'more_information' => $_POST['more_information'],
//     'email' => $_POST['email'],
//     'directorate' => $_POST['directorate'],
//     'county' => $_POST['county'],
//     'city' => $_POST['city'],
//     'street' => $_POST['street']
// ])->getGeneratedKey('partner_id');

// foreach($_POST['phones'] as $phone){
//     $db->query(
//         "INSERT INTO partner_phones (partner_id, phone, type)
//         VALUES
//         (
//             :partner_id,
//             :phone,
//             :type
//         )",[
//             'partner_id' => $partner_id,
//             'phone' => $phone['phone'],
//             'type' => $phone['type']
//         ]
//     );
// }
// foreach($_POST['accounts'] as $account){
//     $db->query(
//         "INSERT INTO partners_accounts (partner_id, account, account_type)
//         VALUES
//         (
//             :partner_id,
//             :account,
//             :account_type
//         ) ",[
//             'partner_id' => $partner_id,
//             'account' => $account['account'],
//             'account_type' => $account['account_type']
//         ]
//     );
// }
require "views/pages/executive_partners/create_view.php";
