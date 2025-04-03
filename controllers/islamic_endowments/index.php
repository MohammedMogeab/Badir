<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


$islamic_endowments = $db->query("SELECT * from endowments;")->fetchAll();


require "views/pages/islamic_endowments/index_view.php";


?>