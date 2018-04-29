<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['mydashbor'] = 'mydashbor';
$route['order'] = 'mydashbor/order';
$route['editprofile'] = 'mydashbor/editprofile';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
