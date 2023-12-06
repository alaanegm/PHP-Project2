<?php
setcookie("username", "", time() - 3600);
setcookie("img", "", time() - 3600);
header("Location:login.php");
?>