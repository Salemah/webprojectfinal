<?php
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('location: /nabil/index.php?m=Logged out');
