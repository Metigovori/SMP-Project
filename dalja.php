<?php
// start the session
session_start();

// unset all session variables
session_unset();

// destroy the session
session_destroy();

// redirect to the login page
header('Location: Projekti-probit.php');
exit();
?>