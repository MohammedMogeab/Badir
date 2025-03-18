<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 

// $note = $db->query("SELECT * from charity_projects where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();
$projects = $db->query("SELECT 
    (
    partner_id,
    category_id,
    level,
    name,
    photo,
    short_description,
    full_description,
    type,
    cost,
    start_at,
    end_at,
    state,
    directorate
    )FROM PROJECTS WHERE project_id = :project_id
",[
    'project_id' => $_POST['project_id']
])->findOrFail();

//authorize($note['other_id'] == $userID);

// $db->query("DELETE FROM charity_projects where id = :id", [
//   'id' => $_POST['id'],
// ]);
$db->query("delete from projects where project_id = :project_id",[
    'project_id' => $_POST['project_id']
]);
header("Location: /pages/charity_projects");
exit();



