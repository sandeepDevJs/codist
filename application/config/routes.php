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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

//Admin Dashboard
$route['admin'] = "admin/admin";
$route['admin/login'] = "admin/admin/login";
$route['admin/logout'] = "admin/admin/logout";
$route['admin/dashboard'] = "admin/admin";
$route['admin/users'] = "admin/admin/users";
$route['admin/feedbacks'] = "admin/admin/feedbacks";
$route['admin/profile/(:num)'] = "admin/admin/profile/$1";
$route['admin/posts'] = "admin/admin/posts";
$route['admin/replies'] = "admin/admin/replies";
$route['admin/courses'] = "admin/admin/courses";

//loads course details.
$route['admin/courses/view/(:num)/(:num)'] = "admin/admin/courses/$1/$2";

//edit course.
$route['admin/courses/edit/(:num)/(:num)/1'] = "admin/admin/courses/$1/$2/1";

//create Course
$route['admin/courses/create'] = "admin/admin/course_create";

//add Topic
$route['admin/courses/addTopic/(:num)'] = "admin/admin/topic_create/$1";



//=========================================== USER ========================================================


$route['home'] = "user/user/index";
$route['login'] = "user/user/login";
$route['logout'] = "user/user/logout";
$route['register'] = "user/user/register";
$route['explore'] = "user/user/explore";
$route['feedback'] = "user/user/feedback";
$route['courses/pending'] = "user/user/pending";
$route['courses/completed'] = "user/user/completed";

$route['courses/(:any)'] = "user/user/single_course/$1";
$route['courses/(:any)/(:any)'] = "user/user/single_course/$1/$2";


$route['forum'] = "user/forum/index/";
$route['forum/post/(:num)'] = "user/forum/post_page/$1";
