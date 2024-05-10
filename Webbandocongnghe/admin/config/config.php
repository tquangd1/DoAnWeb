<?php
    $mysqli = new mysqli("localhost","root","","webdoan");

    if($mysqli->connect_errno) {
        echo "Kết Nối MSQLI Lỗi" . $mysqli->connect_errno;
        exit();
    }
?>