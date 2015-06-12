<?php
session_start();
if(!isset($_SESSION["session_username"])) {
    header("location:login.php");
} else {
include "header.php";
include "intropage.html";

include "footer.php";
}
header('Refresh: 3; url="site.html"');
?>



