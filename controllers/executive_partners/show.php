<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);


$userID = 1;

try {
    $categories = $db->query(
        "SELECT * FROM categories"
    )->fetchAll(); // Fetch all rows from the query result 
    $partners = $db->query(
        "SELECT * FROM partners"
    )->fetchAll(); // Fetch all rows from the query result
    $partners = $db->query("SELECT * from partners where partner_id = :partner_id", [
        'partner_id' => $_GET['partner_id']
    ])->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


// $note = $db->query("SELECT * from executive_partners where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);



require "views/pages/executive_partners/show_view.php";
