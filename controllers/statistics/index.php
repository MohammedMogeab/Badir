<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


// $statistics = $db->query("SELECT * from statistics ;")->fetchAll();


require "views/pages/statistics/index_view.php";


?>