<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['admins'] = 'admins/index';
$route['proses'] = 'admins/proses';
$route['selesai'] = 'admins/selesai';
$route['diantar'] = 'admins/diantar';
$route['member'] = 'admins/member';
$route['pegawai']= 'admins/pegawai';
$route['order'] = 'mydashbor/order';
$route['editprofile'] = 'mydashbor/editprofile';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
