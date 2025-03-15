<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


$cards = $db->query("SELECT * from cards ;")->fetchAll();


require "views/pages/cards/index_view.php";


?>