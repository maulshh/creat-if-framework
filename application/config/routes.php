<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
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
|	$route["default_controller"] = "welcome";
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route["404_override"] = "errors/page_missing";
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route["comments"] = "comments";
$route["complaints"] = "complaints";
$route["dashboard"] = "dashboard";
$route["home"] = "home";
$route["login"] = "login";
$route["logout"] = "logout";
$route["menus"] = "menus";
$route["no_permission"] = "pages/view/no-permission";
$route["not_found"] = "pages/view/not-found";
$route["pages"] = "pages";
$route["permissions"] = "permissions";
$route["post_types"] = "post_types";
$route["posts"] = "posts";
$route["sites"] = "sites";
$route["users"] = "users";
$route["datatable"] = "datatable";
$route["starter"] = "starter";
//$route["emif_framework.sql"] = "emif_framework.sql";

$route["comments/(:any)"] = "comments/$1";
$route["complaints/(:any)"] = "complaints/$1";
$route["dashboard/(:any)"] = "dashboard/$1";
$route["home/(:any)"] = "home/$1";
$route["login/(:any)"] = "login/$1";
$route["logout/(:any)"] = "logout/$1";
$route["menus/(:any)"] = "menus/$1";
$route["no_permission/(:any)"] = "pages/view/no-permission";
$route["not_found/(:any)"] = "pages/view/not-found";
$route["pages/(:any)"] = "pages/$1";
$route["permissions/(:any)"] = "permissions/$1";
$route["post_types/(:any)"] = "post_types/$1";
$route["posts/(:any)"] = "posts/$1";
$route["sites/(:any)"] = "sites/$1";
$route["users/(:any)"] = "users/$1";
$route["datatable/(:any)"] = "datatable/$1";

$route["permalink/(:any)"] = "posts/permalink/$1";
$route["(:any)"] = "pages/view/$1";
$route["default_controller"] = "home";
$route["404_override"] = "";


/* End of file routes.php */
/* Location: ./application/config/routes.php */