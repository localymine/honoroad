<?php
/**
 * 
 * Template Name: Login
 * 
 */
?>

<?php
$action = !empty($_GET['action']) && ($_GET['action'] == 'register' || $_GET['action'] == 'forgot' || $_GET['action'] == 'resetpass') ? $_GET['action'] : 'login';
$success = !empty($_GET['success']);
$failed = !empty($_GET['failed']) ? $_GET['failed'] : false;
?>

<?php get_header(); ?>


<header class="entry-header">
    <h1 class="entry-title">Login</h1>
</header>

<?php wp_login_form(); ?>


<?php get_footer(); ?>