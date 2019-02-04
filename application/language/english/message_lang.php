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
$lang['error_submit'] = "Problem when inserting data to DB" ;
$lang['success_submit'] = "Posting successful, Redirecting..." ;

// Admin Login
$lang['error_adm_invalid_un'] = "Username is incorrect, Please try again." ;
$lang['success_adm_auth'] = "Posting successful, Redirecting..." ;
$lang['error_adm_invalidpw'] = "Password is incorrect, Please try again." ;

// Admin Ad Comment
$lang['error_adm_rcomment'] = "System could not accept your comment, Please try again." ;
$lang['success_adm_rcomment'] = "Comment Successful." ;

// Admin Ad Approve
$lang['error_adm_adapprove'] = "System could not approve this ad, Please try again." ;
?>