<?php

// $router->get('/', 'controlers/index.php');

// $router->get('/about', 'controlers/about.php');

// $router->get('/contact', 'controlers/contact.php');

// $router->get('/notes', 'controlers/notes/index.php')->only('auth');

// $router->get('/note', 'controlers/notes/show.php')->only('auth');
// $router->delete('/note', 'controlers/notes/destroy.php');
// $router->delete('/note', 'controlers/notes/show.php');
// $router->patch('/note', 'controlers/notes/update.php');


// $router->get('/notes/Create', 'controlers/notes/create.php');
// $router->post('/notes/Create', 'controlers/notes/store.php');

// $router->get('/notes/edit', 'controlers/notes/edit.php');


// $router->get('/register','controlers/registertion/create.php')->only('guest');
// $router->post('/register','controlers/registertion/store.php');

// $router->get('/login','controlers/sessions/create.php')->only('guest');
// $router->delete('/logout','controlers/sessions/destroy.php')->only('auth');
// $router->post('/login','controlers/sessions/store.php');


$router->get('/items','controllers/items/index.php');
$router->get('/','controllers/home.php');
$router->get('/home','controllers/home.php');
$router->get('/about','controllers/about.php');
$router->get('/contact','controllers/contact.php');
$router->get('/policies_privacy','controllers/policies_privacy.php');


$router->get('/cards/create','controllers/cards/create.php');
$router->get('/cards/destroy','controllers/cards/destroy.php');
$router->get('/cards/edit','controllers/cards/edit.php');
$router->get('/cards/index','controllers/cards/index.php');
$router->get('/cards/show','controllers/cards/show.php');
$router->get('/cards/store','controllers/cards/store.php');
$router->get('/cards/update','controllers/cards/update.php');


$router->get('/charity_campaigns/create','controllers/charity_campaigns/create.php');
$router->get('/charity_campaigns/destroy','controllers/charity_campaigns/destroy.php');
$router->get('/charity_campaigns/edit','controllers/charity_campaigns/edit.php');
$router->get('/charity_campaigns/index','controllers/charity_campaigns/index.php');
$router->get('/charity_campaigns/show','controllers/charity_campaigns/show.php');
$router->get('/charity_campaigns/store','controllers/charity_campaigns/store.php');
$router->get('/charity_campaigns/update','controllers/charity_campaigns/update.php');


$router->get('/charity_projects/create','controllers/charity_projects/create.php');
$router->get('/charity_projects/destroy','controllers/charity_projects/destroy.php');
$router->get('/charity_projects/edit','controllers/charity_projects/edit.php');
$router->get('/charity_projects/index','controllers/charity_projects/index.php');
$router->get('/charity_projects/show','controllers/charity_projects/show.php');
$router->get('/charity_projects/store','controllers/charity_projects/store.php');
$router->get('/charity_projects/update','controllers/charity_projects/update.php');


$router->get('/executive_partners/create','controllers/executive_partners/create.php');
$router->get('/executive_partners/destroy','controllers/executive_partners/destroy.php');
$router->get('/executive_partners/edit','controllers/executive_partners/edit.php');
$router->get('/executive_partners/index','controllers/executive_partners/index.php');
$router->get('/executive_partners/show','controllers/executive_partners/show.php');
$router->get('/executive_partners/store','controllers/executive_partners/store.php');
$router->get('/executive_partners/update','controllers/executive_partners/update.php');


$router->get('/islamic_endowments/create','controllers/islamic_endowments/create.php');
$router->get('/islamic_endowments/destroy','controllers/islamic_endowments/destroy.php');
$router->get('/islamic_endowments/edit','controllers/islamic_endowments/edit.php');
$router->get('/islamic_endowments/index','controllers/islamic_endowments/index.php');
$router->get('/islamic_endowments/show','controllers/islamic_endowments/show.php');
$router->get('/islamic_endowments/store','controllers/islamic_endowments/store.php');
$router->get('/islamic_endowments/update','controllers/islamic_endowments/update.php');


$router->get('/islamic_payments/create','controllers/islamic_payments/create.php');
$router->get('/islamic_payments/destroy','controllers/islamic_payments/destroy.php');
$router->get('/islamic_payments/edit','controllers/islamic_payments/edit.php');
$router->get('/islamic_payments/index','controllers/islamic_payments/index.php');
$router->get('/islamic_payments/show','controllers/islamic_payments/show.php');
$router->get('/islamic_payments/store','controllers/islamic_payments/store.php');
$router->get('/islamic_payments/update','controllers/islamic_payments/update.php');


$router->get('/items/create','controllers/items/create.php');
$router->get('/items/destroy','controllers/items/destroy.php');
$router->get('/items/edit','controllers/items/edit.php');
$router->get('/items/index','controllers/items/index.php');
$router->get('/items/show','controllers/items/show.php');
$router->get('/items/store','controllers/items/store.php');
$router->get('/items/update','controllers/items/update.php');


$router->get('/statistics/create','controllers/statistics/create.php');
$router->get('/statistics/destroy','controllers/statistics/destroy.php');
$router->get('/statistics/edit','controllers/statistics/edit.php');
$router->get('/statistics/index','controllers/statistics/index.php');
$router->get('/statistics/show','controllers/statistics/show.php');
$router->get('/statistics/store','controllers/statistics/store.php');
$router->get('/statistics/update','controllers/statistics/update.php');


$router->get('/notifications/create','controllers/notifications/create.php');
$router->get('/notifications/destroy','controllers/notifications/destroy.php');
$router->get('/notifications/edit','controllers/notifications/edit.php');
$router->get('/notifications/index','controllers/notifications/index.php');
$router->get('/notifications/show','controllers/notifications/show.php');
$router->get('/notifications/store','controllers/notifications/store.php');
$router->get('/notifications/update','controllers/notifications/update.php');


$router->get('/users/create','controllers/users/create.php');
$router->get('/users/destroy','controllers/users/destroy.php');
$router->get('/users/edit','controllers/users/edit.php');
$router->get('/users/index','controllers/users/index.php');
$router->get('/users/show','controllers/users/show.php');
$router->get('/users/store','controllers/users/store.php');
$router->get('/users/update','controllers/users/update.php');





