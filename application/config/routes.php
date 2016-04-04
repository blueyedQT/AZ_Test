<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "investments/index";
$route['index'] = "investments/index";
$route['free_report_signup'] = "investments/free_report_signup";
$route['free_report'] = "investments/free_report";
$route['land'] = "investments/land";
$route['contact'] = "investments/contact";
$route['contact_form'] = "investments/contact_form";

$route['admin'] = "admins/index";
$route['admin_login'] = "admins/login";
$route['admin_dashboard'] = "admins/dashboard";
$route['logout'] = "admins/logout";
$route['add_admin'] = "admins/add_admin";
$route['register_admin'] = "admins/register_admin";
$route['edit_admin/(:num)'] = "admins/edit_admin/$1";
$route['update_admin'] = "admins/update_admin";
$route['delete_admin/(:num)'] = "admins/delete_admin/$1";
// TESTING
$route['add_property'] = "admins/add_property";
$route['add_new_property'] = "admins/add_new_property";

// $route['add_property'] = "properties/add_property";

// $route['about'] = "/investments/about";
// $route['invest'] = "/investments/invest";
// $route['featured'] = "/investments/featured";
// $route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */