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

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['admin']			= "admin/home"; 
$route['signup']		= "home/sign_up"; 
$route['signin']		= "home/sign_in"; 
$route['signout']		= "home/signout"; 
$route['promote/(:any)']= "home/promote_project/$1"; 
$route['how_it_works']  = "home/how_it_works"; 
$route['about_us'] 		= "home/about_us"; 
$route['faq']  			= "home/faq";
$route['contact_us']  	= "home/contact_us";
$route['terms']  		= "home/terms";
$route['privacy_policy']= "home/privacy_policy";
$route['knowledge_bank']= "home/knowledge_bank";
$route['testimonial']	= "home/testimonial";
$route['tools_tips']	= "home/tools_tips";
$route['forgot_password']= "home/forgot_password";
$route['signup_response']= "home/signup_response";


/* End of file routes.php */
/* Location: ./application/config/routes.php */