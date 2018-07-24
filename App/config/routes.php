<?php

ob_start();
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
  | http://codeigniter.com/user_guide/general/routing.html
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
//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'Home';

//$route[ADMIN . '/([a-z_]+)/(:any)'] = ADMIN . "/$1/$2";

$route[ADMIN . '/(:any)/(:any)'] = "$1/" . ADMIN . "/$1/$2";
$route[ADMIN . '/(:any)'] = "$1/" . ADMIN . "/$1";
$route[ADMIN . '/(:any)/(:any)/(:any)'] = "$1/" . ADMIN . "/$1/$2/$3";

//$route[ADMIN] = 'blog/'.ADMIN . '/blog';
//$route['products'] = "products/list_all";
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
$route['signin'] = 'users/signin';
$route['signup'] = 'users/signup';
$route['contact-us+(.html)'] = "cms/contact_us";
$route['[a-z-A-Z0-9-_]+(.html)'] = "cms/page/$1";

$modules_path = APPPATH . 'modules/';
$modules = scandir($modules_path);
//require($modules_path . 'Users' . '/config/routes.php');
//require($modules_path . 'Store' . '/config/routes.php');
//require($modules_path . 'Tax' . '/config/routes.php');
//require($modules_path . 'Menu' . '/config/routes.php');
//require($modules_path . 'Vendor' . '/config/routes.php');
//require('/var/www/html/91retail/App/modules/Cms/config/routes.php');
//require('/var/www/html/91retail/App/modules/Products/config/routes.php');
//require('/var/www/html/91retail/App/modules/Store/config/routes.php');
//require('/var/www/html/91retail/App/modules/Tax/config/routes.php');
//require('/var/www/html/91retail/App/modules/Users/config/routes.php');
//require('/var/www/html/91retail/App/modules/Vendor/config/routes.php');
//require('/var/www/html/91retail/App/modules/api/config/routes.php');
foreach ($modules as $module) {
    if ($module === '.' || $module === '..' || $module === 'api')
        continue;
    if (is_dir($modules_path) . '/' . $module) {
        $routes_path = $modules_path . $module . '/config/routes.php';
        if (file_exists($routes_path)) {
            //echo $routes_path.'<br/>';
            require($routes_path);
        } else {
            continue;
        }
    }
}
//die;
/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
//$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
//$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8