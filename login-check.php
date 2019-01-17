<?php
session_start();
if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
    $_SESSION['success_login'] = "Login Successful";
} else {
    header('location:index.php');
}
