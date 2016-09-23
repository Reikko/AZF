<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 08/09/2016
 * Time: 17:42
 */
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();

header("Location: index.php");
?>