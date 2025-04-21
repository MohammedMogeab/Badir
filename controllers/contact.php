<?php
$heading = "Contact";

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$contact_type = $db->query("SELECT problem_type from contact_messages ;")->fetchAll();

require "views/pages/contact_view.php";


?>