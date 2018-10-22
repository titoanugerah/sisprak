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

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
