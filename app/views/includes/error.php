<?php
// Error helper function to error_log certain blocks of code..
function logger($log) {
    // check if file already exists
    if(!file_exists('log.txt', '')) {
        file_get_contents('log.txt', '');
    }

    // what to capture
    $ip = $_SERVER['REMOTE_ADDR']; // Client IP
    date_default_timezone_set('Europe/Amsterdam'); // Time zone for EU
    $time = date('d/m/Y H:i:s', time());
    $contents = file_get_contents('log.txt'); // Grab content
    $contents .= "$ip\t$time\t$log\r";

    file_put_contents('log.txt', $contents);
}
?>