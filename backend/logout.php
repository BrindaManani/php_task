<?php
include '../databse.php';
session_destroy();

header("Location:../frontend/login.php");
?>