<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


// $charity_projects = $db->query("SELECT * from charity_projects ;")->fetchAll();


require "views/pages/charity_projects/index_view.php";


?>