<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['login'] = 'home/login';
$route['dashboard'] = 'home/dashboard';
$route['regist'] = 'home/regist';
$route['verifyUser/(:any)'] = 'home/verifyUser/$1';
$route['profile'] = 'home/profile';
$route['logout'] = 'home/logout';

$route['addAccount'] = 'admin/addAccount';
$route['listAccount'] = 'admin/listAccount';
$route['detailAccount/(:any)'] = 'admin/detailAccount/$1';

$route['addPraktikum'] = 'admin/addPraktikum';
$route['listPraktikum'] ='admin/listPraktikum';
$route['detailPraktikum/(:any)'] = 'admin/detailPraktikum/$1';

$route['groupPraktikan/(:any)'] = 'user/groupPraktikan/$1';
$route['download/(:any)'] = 'home/downloadFile/$1';
$route['modulPraktikum/(:any)'] = 'user/modulPraktikum/$1';
$route['editModul/(:any)'] = 'user/editModul/$1';
$route['addPraktikan/(:any)'] = 'user/addPraktikan/$1';
$route['listPraktikan/(:any)'] = 'user/listPraktikan/$1';
$route['deleteAsist/(:any)'] = 'user/deleteAsist/$1';
$route['deletePraktikan/(:any)'] = 'user/deletePraktikan/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
