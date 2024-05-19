<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['users/index'] = 'users/index'; 
$route['admin/index'] = 'admin/index';
$route['pages/index'] = 'pages/index';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['pages/(:any)'] = 'pages/$1';
$route['admin/(:any)'] = 'admin/$1';
$route['users/(:any)'] = 'users/$1';
$route['admin/editUser/(:num)'] = 'admin/editUser/$1';
$route['admin/editVolume/(:num)'] = 'admin/editVolume/$1';