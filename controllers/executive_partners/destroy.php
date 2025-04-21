<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);

try {
    $db->query(
        "DELETE FROM partners WHERE partner_id = :partner_id",
        [
            'partner_id' => $_POST['partner_id']
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
