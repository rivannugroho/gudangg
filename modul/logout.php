<?php 

include_once('db_func.php');
session_destroy();
header('Location:index.php');