<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);

try {
    $db->query(
        "DELETE FROM campaigns WHERE campaign_id = :campaign_id",
        [
            'campaign_id' => $_POST['campaign_id']
        ]
    );
    http_response_code(204);
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
