<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);

try {
  $db->query(
    "DELETE FROM endowments WHERE endowment_id = :endowment_id",
    [
      'endowment_id' => $_POST['endowment_id']
    ]
  );
} catch (PDOException $e) {
  error_log($e->getMessage());
  $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
  header("Location: /charity_campaigns_create");
  exit();
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
