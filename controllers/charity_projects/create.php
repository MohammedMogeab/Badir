<?php
$heading = "Create test";




// $partner_id = $db->query("INSERT INTO projects ( category_id,  level,  name,  photo,  short_description,  full_description,  type,  cost,  start_at,  end_at,  state,  directorate)
// VALUES
//     (
//     :category_id,
//     :level,
//     :name,
//     :photo,
//     :short_description,
//     :full_description,
//     :type, :cost,
//     now(),
//     :end_at,
//     :state,
//     :directorate
//     ) RETURNING partner_id",
//     [
//         'category_id'=> $_POST['category_id'],
//         'name' => $_POST['name'],
//         'photo' => $_POST['photo'],
//         'level' => $_POST['level'],
//         'short_description' => $_POST['short_description'],
//         'full_description' => $_POST['full_description'],
//         'type' => $_POST['type'],
//         'cost' => $_POST['cost'],
//         'end_at' => $_POST['end_at'],
//         'state' => $_POST['state'],
//         'directorate' => $_POST['directorate']
//     ])->getGeneratedKey('partner_id');

require "views/pages/charity_projects/create_view.php";
