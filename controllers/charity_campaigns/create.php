<?php
$heading = "Create test";




$db->query("INSERT INTO charity_campaigns (name) VALUES (':item')", [
    'item' => $_POST['item'],
  ]);

require "views/pages/charity_campaigns/create_view.php";
