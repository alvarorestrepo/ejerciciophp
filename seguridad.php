<?php 


session_start();


if ($_SESSION["logiado"] != "si") {
    
    echo "<script>location.href = 'login.php';</script>";
    
}	
