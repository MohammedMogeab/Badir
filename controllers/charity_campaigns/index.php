<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


// $charity_campaigns = $db->query("SELECT * from charity_campaigns ;")->fetchAll();


require "views/pages/charity_campaigns/index_view.php";


?>