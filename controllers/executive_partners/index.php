<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


// $executive_partners = $db->query("SELECT * from executive_partners ;")->fetchAll();


require "views/pages/executive_partners/index_view.php";


?>