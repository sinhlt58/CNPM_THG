<?php

# Start Session:
session_start();

unset($_SESSION['username']);// Xoa user key.

session_destroy(); //Xoa het session keys.

header('Location: ../home');

?>