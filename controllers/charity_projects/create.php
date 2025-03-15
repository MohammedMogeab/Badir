<?php
$heading = "Create test";




$db->query("INSERT INTO charity_projects (name) VALUES (':item')", [
    'item' => $_POST['item'],
  ]);

require "views/pages/charity_projects/create_view.php";
