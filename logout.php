<?php
include("connect.php");
session_destroy();
header("Location: login.php");
?>