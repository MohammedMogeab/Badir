<?php
$heading = "Create test";




$db->query("INSERT INTO reports (name) VALUES (':item')", [
    'item' => $_POST['item'],
  ]);

require "views/pages/reports/create_view.php";
