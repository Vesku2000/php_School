<?php
session_start();

unset($_SESSION['authenticated_user']);

header('location: login.php');
exit;
?>