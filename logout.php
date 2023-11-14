<?php

session_start();

function logout() {
    session_destroy();
    
}

// Wywołanie funkcji logout
logout();

?>