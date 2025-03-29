<?php

// Add required headers to bypass Ngrok warning and allow cross-origin requests
header("ngrok-skip-browser-warning: true");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: text/html");

// Start session
session_start();

// Read and decode JSON file
$key = json_decode(file_get_contents("check-c.json"), true);

// Check authentication
if (isset($_COOKIE['logindata']) && $_COOKIE['logindata'] == $key['token'] && $key['expired'] == "no") {
    header("Location: panel.php");
    exit;
} elseif (isset($_SESSION['IAm-logined'])) {
    header("Location: panel.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}

?>
