<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


// $items = $db->query("SELECT * from items ;")->fetchAll();


require "views/pages/items/index_view.php";


?>