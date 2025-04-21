<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);





$projects = $db->query("
SELECT project_id,
    partner_id,
    category_id,
    level,
    name,
    short_description,
    full_description,
    type,
    cost,
    start_at,
    beneficiaries_count,
    stop_at,
    end_at,
    state,
    directorate,
    country,
    city,
    street,
    photo
FROM projects 
WHERE project_id = :project_id
", [
'project_id' => $_GET['project_id'] 
])->findOrFail();


$donation = [
    'donation_page' => 'charity_projects_donate' ,
    'cost' => $_GET['cost'] ?? 0,
    'product_id' => $projects['project_id'] ?? 0 ,
    'name' => $projects['name'] ?? 'Campaign Name',
    'description' => $projects['short_description'] ?? 'Campaign Description',
    'image' => $projects['photo'] 
];




require "views/pages/checkout_view.php";

