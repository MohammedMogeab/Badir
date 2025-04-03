<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


// $islamic_payments = $db->query("SELECT * from islamic_payments ;")->fetchAll();
$IslamicPayments = $db->query("SELECT * FROM islamic_payments")->fetchAll();

require "views/pages/islamic_payments/index_view.php";


?>