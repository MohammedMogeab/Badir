<?php
$heading = "Create ";

use core\App;
use core\Database;


$db = App::resolve(Database::class);


try {
    $categories = $db->query(
        "SELECT * FROM categories"
    )->fetchAll(); // Fetch all rows from the query result 
    $partners = $db->query(
        "SELECT * FROM partners"
    )->fetchAll(); // Fetch all rows from the query result
    $partner = $db->query("SELECT * from partners where partner_id = :partner_id", [
        'partner_id' => $_GET['partner_id']
    ])->findOrFail();
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}



require "views/pages/executive_partners/edit_view.php";
