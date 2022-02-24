<?php

session_start();

echo"Loggin your logOut. Please wait...... ";

session_destroy();
header("Location: /forums")
?>