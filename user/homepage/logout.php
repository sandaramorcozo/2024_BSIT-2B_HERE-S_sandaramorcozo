<?php

session_start();
session_unset();
session_destroy();
echo "<script>window.open('clientpage.php', '_self')</script>";

?>