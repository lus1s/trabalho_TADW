<?php
/**
 * @author LUIS <email@email.com>
 * @author aNA JULIA <email@email.com>
 * @author julian <email@email.com>
 * @author Maria <mariabeatriz678@icloud.com>
 */
    session_start();
    
    if (isset($_SESSION['logado']) == false) {
        header('Location: index.html');
        exit();
    }
?>