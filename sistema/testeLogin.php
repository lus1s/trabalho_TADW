<?php
    session_start();
    
    if (isset($_SESSION['logado']) == false) {
        header('Location: index.html');
        exit();
    }
?>