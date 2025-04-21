<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);

// if(!isset($_SESSION['user_id'])) $_SESSION['user_id'] = 1;

if (!isset($_GET['user_id'])) $_GET['user_id'] = $_SESSION['user']['id'] ?? 1;




// $note = $db->query("SELECT * from users where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

try {
  $categories = $db->query(
    "SELECT * FROM categories"
  )->fetchAll(); // Fetch all rows from the query result 
  $partners = $db->query(
    "SELECT * FROM partners"
  )->fetchAll(); // Fetch all rows from the query result
  $users = $db->query("SELECT * from users where user_id = :user_id ", [
    'user_id' => $_GET['user_id'] ?? $_SESSION['user_id'] ?? -1
  ])->findOrFail();
} catch (PDOException $e) {
  error_log($e->getMessage());
  abort(500);
}
// echo "<br><br><br><br><br><br><br><br>" . $_SESSION['user_id'] ."<pre>";
// print_r($users);
// print_r($_SESSION);
// echo "</pre>" ;
//authorize($note['other_id'] == $userID);



require "views/pages/users/show_view.php";
