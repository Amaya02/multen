<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['employer/job/edit/(:num)'] = 'employer/editjob/$1';
$route['employer/job/add'] = 'employer/addjob';
$route['applicant/aboutme/edit'] = 'applicant/editaboutme';
$route['applicant/setting/edit'] = 'applicant/editsetting';
$route['employer/setting/edit'] = 'employer/editaccount';
$route['employer/password/change'] = 'employer/editpassword';
$route['applicant/password/change'] = 'applicant/editpassword';
$route['applicant/education/add'] = 'applicant/addeduc';
$route['applicant/experience/add'] = 'applicant/addexp';
$route['applicant/skill/add'] = 'applicant/addskill';
$route['applicant/education/edit/(:num)'] = 'applicant/editeducation/$1';
$route['applicant/experience/edit/(:num)'] = 'applicant/editexperience/$1';
$route['applicant/skill/edit/(:num)'] = 'applicant/editskill/$1';
$route['applicant'] = 'applicant/dashboard';
$route['employer'] = 'employer/dashboard';
$route['default_controller'] = 'homepage_control';
$route['404_override'] = 'homepage_control/er404';
$route['translate_uri_dashes'] = FALSE;
