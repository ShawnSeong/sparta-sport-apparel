<?php
session_start();
include("connection_session.php");

unset($_SESSION["id"]); //remove this data

session_destroy();

header("location:index.php");
?>