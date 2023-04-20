<?php
session_start();
setcookie("PHPSESSID", "", time() - 3600, "/"); /* DELETES THE COOKIE BY SETTING BACK ONE HOUR */
session_destroy(); /* DELETE THE SESSION VALUES*/
header('Location: index.php?page=login'); /* REDIRECT TO THE INDEX.PHP PAGE*/ 