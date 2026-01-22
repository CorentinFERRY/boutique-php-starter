<?php

session_destroy();

if (! isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
