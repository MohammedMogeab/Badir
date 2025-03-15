<?php
$heading = "Create test";




$db->query("INSERT INTO cards (name) VALUES (':item')", [
    'item' => $_POST['item'],
  ]);

require "views/pages/cards/create_view.php";
