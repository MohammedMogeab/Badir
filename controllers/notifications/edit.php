<?php
$heading = "Edit test";

use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;



// $item = $db->query("SELECT * from notifications where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($item['other_id'] == $userID);






require "views/pages/notifications/edit_view.php";
