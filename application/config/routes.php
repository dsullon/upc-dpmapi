<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// Routing for brands
$route['brands']['get'] = 'brand/index';
$route['brands/(:num)']['get'] = 'brand/find/$1';
$route['brands']['post'] = 'brand/index';
$route['brands/(:num)']['put'] = 'brand/index/$1';
$route['brands/(:num)']['delete'] = 'brand/index/$1';

// Routing for drivers
$route['drivers']['get'] = 'driver/index';
$route['drivers/(:num)']['get'] = 'driver/find/$1';
$route['drivers']['post'] = 'driver/index';
$route['drivers/(:num)']['put'] = 'driver/index/$1';
$route['drivers/(:num)']['delete'] = 'driver/index/$1';
$route['drivers/(:num)/deliveries']['get'] = 'driver/index/$1';

// Routing for vehicles
$route['vehicles']['get'] = 'vehicle/index';
$route['vehicles/(:num)']['get'] = 'vehicle/find/$1';
$route['vehicles']['post'] = 'vehicle/index';
$route['vehicles/(:num)']['put'] = 'vehicle/index/$1';
$route['vehicles/(:num)']['delete'] = 'vehicle/index/$1';

// Routing for users
$route['users']['get'] = 'user/index';
$route['users/(:num)']['get'] = 'user/find/$1';
$route['users/login']['post'] = 'user/login';
$route['users']['post'] = 'user/index';
$route['users/(:num)']['put'] = 'user/index/$1';
$route['users/(:num)']['delete'] = 'user/index/$1';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
//$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
//$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
