<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


// $notifications = $db->query("SELECT * from notifications ;")->fetchAll();


require "views/pages/notifications/index_view.php";


?>