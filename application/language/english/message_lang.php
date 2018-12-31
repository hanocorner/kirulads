<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Application error messages
 */

// User Authentication
$lang['error_invalid_email'] = "Email is incorrect, Please try again";
$lang['error_invalid_pass'] = "Password is incorrect, Please try again";
$lang['error_email_exists'] = 'Email already exists, Please try a new one';

/**
 * Application success messages
 */

// User Authentication
$lang['success_auth'] = "Login successful, Redirecting...";

// User Registration
$lang['success_register'] = "Registeration successful, Redirecting...";


// Submit Ad
$lang['error_db_submit'] = "Problem when inserting data to DB" ;
$lang['success_submit_ad'] = "Problem when inserting data to DB" ;
?>