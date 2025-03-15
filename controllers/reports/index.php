<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


$reports = $db->query("SELECT * from reports ;")->fetchAll();


require "views/pages/reports/index_view.php";


?>