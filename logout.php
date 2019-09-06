<?php
setcookie("user_name", '', time() - 3600 ,"/dashboard");
header('location: http://localhost/dashboard/');
exit;