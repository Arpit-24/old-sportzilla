<?php 

require("core/init.php");
session_destroy();
redirect(BASE_URI."login.php");

?>