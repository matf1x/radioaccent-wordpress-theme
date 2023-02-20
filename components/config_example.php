<?php
/**
 * MAIN CONFIG FILE
 * Here you can configure some variables that can be used in other parts
 * like the database connections
 */

// Setup the default time zone
date_default_timezone_set('Europe/Brussels');

// Setup the Database information
$database = array(
    'host' => 'localhost',
    'username' => '',
    'password' => '',
    'name' => ''
);

// Connect to the database
$db = new PDO('mysql:host='.$database['host'].';dbname='.$database['name'].'', $database['username'], $database['password']);