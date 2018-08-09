<?php

function getDBConnection($dbname = 'heroku_fed8fc06a1d5dae'){
    $host = 'us-cdbr-iron-east-04.cleardb.net';
    $username = 'b51a32c5f731cc';
    $passowrd = '8a7c33a6';
    
    $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $passowrd);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>
