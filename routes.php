<?php


// add deract access to views

$router->get('/items_view', 'views/pages/items/index_view.php');
$router->get('/view', 'views/pages/home_view.php');
$router->get('/home_view', 'views/pages/home_view.php');
$router->get('/about_view', 'views/pages/about_view.php');
$router->get('/contact_view', 'views/pages/contact_view.php');
$router->post('/services/phpmailer/send-email_view', 'services/phpmailer/send-email_view.php');

$router->get('/policies_privacy_view', 'views/pages/policies_privacy_view.php');
$router->get('/cart_view', 'views/pages/cart_view.php');



$router->get('/cards_create_view', 'views/pages/cards/create_view.php');
$router->get('/cards_destroy_view', 'views/pages/cards/destroy_view.php');
$router->get('/cards_edit_view', 'views/pages/cards/edit_view.php');
$router->get('/cards_index_view', 'views/pages/cards/index_view.php');
$router->get('/cards_show_view', 'views/pages/cards/show_view.php');
$router->get('/cards_store_view', 'views/pages/cards/store_view.php');
$router->get('/cards_update_view', 'views/pages/cards/update_view.php');


$router->get('/charity_campaigns_create_view', 'views/pages/charity_campaigns/create_view.php');
$router->get('/charity_campaigns_destroy_view', 'views/pages/charity_campaigns/destroy_view.php');
$router->get('/charity_campaigns_edit_view', 'views/pages/charity_campaigns/edit_view.php');
$router->get('/charity_campaigns_manage_view', 'views/pages/charity_campaigns/manage_view.php');
$router->get('/charity_campaigns_index_view', 'views/pages/charity_campaigns/index_view.php');
$router->get('/charity_campaigns_show_view', 'views/pages/charity_campaigns/show_view.php');
$router->get('/charity_campaigns_list_view', 'views/pages/charity_campaigns/list_view.php');
$router->get('/charity_campaigns_store_view', 'views/pages/charity_campaigns/store_view.php');
$router->get('/charity_campaigns_update_view', 'views/pages/charity_campaigns/update_view.php');


$router->get('/charity_projects_create_view', 'views/pages/charity_projects/create_view.php');
$router->get('/charity_projects_destroy_view', 'views/pages/charity_projects/destroy_view.php');
$router->get('/charity_projects_edit_view', 'views/pages/charity_projects/edit_view.php');
$router->get('/charity_projects_manage_view', 'views/pages/charity_projects/manage_view.php');
$router->get('/charity_projects_index_view', 'views/pages/charity_projects/index_view.php');
$router->get('/charity_projects_show_view', 'views/pages/charity_projects/show_view.php');
$router->get('/charity_projects_list_view', 'views/pages/charity_projects/list_view.php');
$router->get('/charity_projects_store_view', 'views/pages/charity_projects/store_view.php');
$router->get('/charity_projects_update_view', 'views/pages/charity_projects/update_view.php');


$router->get('/executive_partners_create_view', 'views/pages/executive_partners/create_view.php');
$router->get('/executive_partners_destroy_view', 'views/pages/executive_partners/destroy_view.php');
$router->get('/executive_partners_edit_view', 'views/pages/executive_partners/edit_view.php');
$router->get('/executive_partners_index_view', 'views/pages/executive_partners/index_view.php');
$router->get('/executive_partners_show_view', 'views/pages/executive_partners/show_view.php');
$router->get('/executive_partners_store_view', 'views/pages/executive_partners/store_view.php');
$router->get('/executive_partners_update_view', 'views/pages/executive_partners/update_view.php');


$router->get('/islamic_endowments_create_view', 'views/pages/islamic_endowments/create_view.php');
$router->get('/islamic_endowments_destroy_view', 'views/pages/islamic_endowments/destroy_view.php');
$router->get('/islamic_endowments_edit_view', 'views/pages/islamic_endowments/edit_view.php');
$router->get('/islamic_endowments_index_view', 'views/pages/islamic_endowments/index_view.php');
$router->get('/islamic_endowments_show_view', 'views/pages/islamic_endowments/show_view.php');
$router->get('/islamic_endowments_list_view', 'views/pages/islamic_endowments/list_view.php');
$router->get('/islamic_endowments_store_view', 'views/pages/islamic_endowments/store_view.php');
$router->get('/islamic_endowments_update_view', 'views/pages/islamic_endowments/update_view.php');


$router->get('/islamic_payments_create_view', 'views/pages/islamic_payments/create_view.php');
$router->get('/islamic_payments_destroy_view', 'views/pages/islamic_payments/destroy_view.php');
$router->get('/islamic_payments_edit_view', 'views/pages/islamic_payments/edit_view.php');
$router->get('/islamic_payments_index_view', 'views/pages/islamic_payments/index_view.php');
$router->get('/islamic_payments_show_view', 'views/pages/islamic_payments/show_view.php');
$router->get('/islamic_payments_zakat_view', 'views/pages/islamic_payments/zakat_view.php');
$router->get('/islamic_payments_list_view', 'views/pages/islamic_payments/list_view.php');
$router->get('/islamic_payments_store_view', 'views/pages/islamic_payments/store_view.php');
$router->get('/islamic_payments_update_view', 'views/pages/islamic_payments/update_view.php');


$router->get('/items_create_view', 'views/pages/items/create_view.php');
$router->get('/items_destroy_view', 'views/pages/items/destroy_view.php');
$router->get('/items_edit_view', 'views/pages/items/edit_view.php');
$router->get('/items_index_view', 'views/pages/items/index_view.php');
$router->get('/items_show_view', 'views/pages/items/show_view.php');
$router->get('/items_store_view', 'views/pages/items/store_view.php');
$router->get('/items_update_view', 'views/pages/items/update_view.php');


$router->get('/statistics_create_view', 'views/pages/statistics/create_view.php');
$router->get('/statistics_destroy_view', 'views/pages/statistics/destroy_view.php');
$router->get('/statistics_edit_view', 'views/pages/statistics/edit_view.php');
$router->get('/statistics_index_view', 'views/pages/statistics/index_view.php');
$router->get('/statistics_show_view', 'views/pages/statistics/show_view.php');
$router->get('/statistics_store_view', 'views/pages/statistics/store_view.php');
$router->get('/statistics_update_view', 'views/pages/statistics/update_view.php');


$router->get('/notifications_create_view', 'views/pages/notifications/create_view.php');
$router->get('/notifications_destroy_view', 'views/pages/notifications/destroy_view.php');
$router->get('/notifications_edit_view', 'views/pages/notifications/edit_view.php');
$router->get('/notifications_index_view', 'views/pages/notifications/index_view.php');
$router->get('/notifications_show_view', 'views/pages/notifications/show_view.php');
$router->get('/notifications_list_view', 'views/pages/notifications/list_view.php');
$router->get('/notifications_store_view', 'views/pages/notifications/store_view.php');
$router->get('/notifications_update_view', 'views/pages/notifications/update_view.php');


$router->get('/users_create_view', 'views/pages/users/create_view.php');
$router->get('/users_destroy_view', 'views/pages/users/destroy_view.php');
$router->get('/users_edit_view', 'views/pages/users/edit_view.php');
$router->get('/users_index_view', 'views/pages/users/index_view.php');
$router->get('/users_show_view', 'views/pages/users/show_view.php');
$router->get('/users_store_view', 'views/pages/users/store_view.php');
$router->get('/users_update_view', 'views/pages/users/update_view.php');





// ------------------------------


$router->get('/items', 'controllers/items/index.php');
$router->get('/', 'controllers/home.php');
$router->get('/home/hi', 'controllers/home.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->post('/services/phpmailer/send-email', 'services/phpmailer/send-email.php');

$router->get('/policies_privacy', 'controllers/policies_privacy.php');
$router->get('/cart', 'controllers/cart.php');




$router->get('/charity_campaigns_index', 'controllers/charity_campaigns/index.php');
$router->delete('/charity_campaigns_destroy', 'controllers/charity_campaigns/destroy.php');
$router->get('/charity_campaigns_show', 'controllers/charity_campaigns/show.php');
$router->get('/charity_campaigns_list', 'controllers/charity_campaigns/list.php');
$router->get('/charity_campaigns_manage', 'controllers/charity_campaigns/manage.php');
$router->get('/charity_campaigns_create', 'controllers/charity_campaigns/create.php');
$router->get('/charity_campaigns_edit', 'controllers/charity_campaigns/edit.php');
$router->post('/charity_campaigns_store', 'controllers/charity_campaigns/store.php');
$router->put('/charity_campaigns_update', 'controllers/charity_campaigns/update.php');
$router->patch('/charity_campaigns_donate', 'controllers/charity_campaigns/donate.php');
$router->patch('/charity_campaigns_addcart', 'controllers/charity_campaigns/addcrat.php');
$router->patch('/charity_campaigns_removcart', 'controllers/charity_campaigns/removcart.php');

 
$router->get('/charity_projects_create', 'controllers/charity_projects/create.php');
$router->delete('/charity_projects_destroy', 'controllers/charity_projects/destroy.php');
$router->get('/charity_projects_edit', 'controllers/charity_projects/edit.php');
$router->get('/charity_projects_manage', 'controllers/charity_projects/manage.php');
$router->get('/charity_projects_index', 'controllers/charity_projects/index.php');
$router->get('/charity_projects_show', 'controllers/charity_projects/show.php');
$router->get('/charity_projects_list', 'controllers/charity_projects/list.php');
$router->post('/charity_projects_store', 'controllers/charity_projects/store.php');
$router->put('/charity_projects_update', 'controllers/charity_projects/update.php');
$router->patch('/charity_projects_donate', 'controllers/charity_projects/donate.php');
$router->patch('/charity_projects_addcart', 'controllers/charity_projects/addcrat.php');
$router->patch('/charity_projects_removcart', 'controllers/charity_projects/removcart.php');




$router->get('/islamic_endowments_create', 'controllers/islamic_endowments/create.php');
$router->delete('/islamic_endowments_destroy', 'controllers/islamic_endowments/destroy.php');
$router->get('/islamic_endowments_edit', 'controllers/islamic_endowments/edit.php');
$router->get('/islamic_endowments_index', 'controllers/islamic_endowments/index.php');
$router->get('/islamic_endowments_show', 'controllers/islamic_endowments/show.php');
$router->get('/islamic_endowments_list', 'controllers/islamic_endowments/list.php');
$router->get('/islamic_endowments_manage', 'controllers/islamic_endowments/manage.php');
$router->post('/islamic_endowments_store', 'controllers/islamic_endowments/store.php');
$router->put('/islamic_endowments_update', 'controllers/islamic_endowments/update.php');
$router->patch('/islamic_endowments_donate', 'controllers/islamic_endowments/donate.php');
$router->patch('/islamic_endowments_addcart', 'controllers/islamic_endowments/addcrat.php');
$router->patch('/islamic_endowments_removcart', 'controllers/islamic_endowments/removcart.php');



$router->get('/islamic_payments_create', 'controllers/islamic_payments/create.php');
$router->delete('/islamic_payments_destroy', 'controllers/islamic_payments/destroy.php');
$router->get('/islamic_payments_edit', 'controllers/islamic_payments/edit.php');
$router->get('/islamic_payments_index', 'controllers/islamic_payments/index.php');
$router->get('/islamic_payments_manage', 'controllers/islamic_payments/manage.php');
$router->get('/islamic_payments_show', 'controllers/islamic_payments/show.php');
$router->get('/islamic_payments_zakat', 'controllers/islamic_payments/zakat.php');
$router->get('/islamic_payments_list', 'controllers/islamic_payments/list.php');
$router->post('/islamic_payments_store', 'controllers/islamic_payments/store.php');
$router->put('/islamic_payments_update', 'controllers/islamic_payments/update.php');
$router->patch('/islamic_payments_donate', 'controllers/islamic_payments/donate.php');
$router->patch('/islamic_payments_addcart', 'controllers/islamic_payments/addcrat.php');
$router->patch('/islamic_payments_removcart', 'controllers/islamic_payments/removcart.php');




$router->get('/executive_partners_create', 'controllers/executive_partners/create.php');
$router->delete('/executive_partners_destroy', 'controllers/executive_partners/destroy.php');
$router->get('/executive_partners_edit', 'controllers/executive_partners/edit.php');
$router->get('/executive_partners_index', 'controllers/executive_partners/index.php');
$router->get('/executive_partners_manage', 'controllers/executive_partners/manage.php');
$router->get('/executive_partners_show', 'controllers/executive_partners/show.php');
$router->post('/executive_partners_store', 'controllers/executive_partners/store.php');
$router->put('/executive_partners_update', 'controllers/executive_partners/update.php');



$router->get('/statistics_create', 'controllers/statistics/create.php');
$router->delete('/statistics_destroy', 'controllers/statistics/destroy.php');
$router->get('/statistics_edit', 'controllers/statistics/edit.php');
$router->get('/statistics_index', 'controllers/statistics/index.php');
$router->get('/statistics_show', 'controllers/statistics/show.php');
$router->post('/statistics_store', 'controllers/statistics/store.php');
$router->put('/statistics_update', 'controllers/statistics/update.php');



$router->get('/notifications_create', 'controllers/notifications/create.php');
$router->delete('/notifications_destroy', 'controllers/notifications/destroy.php');
$router->get('/notifications_edit', 'controllers/notifications/edit.php');
$router->get('/notifications_index', 'controllers/notifications/index.php');
$router->get('/notifications_show', 'controllers/notifications/show.php');
$router->get('/notifications_list', 'controllers/notifications/list.php');
$router->get('/notifications_manage', 'controllers/notifications/manage.php');
$router->post('/notifications_store', 'controllers/notifications/store.php');
$router->put('/notifications_update', 'controllers/notifications/update.php');


$router->get('/users_create', 'controllers/users/create.php');
$router->delete('/users_destroy', 'controllers/users/destroy.php');
$router->get('/users_edit', 'controllers/users/edit.php');
$router->get('/users_index', 'controllers/users/index.php');
$router->get('/users_show', 'controllers/users/show.php');
$router->get('/users_manage', 'controllers/users/manage.php');
$router->post('/users_store', 'controllers/users/store.php');
$router->put('/users_update', 'controllers/users/update.php');