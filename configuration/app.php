<?php 

# App configuration


/**
 * 
 * Folder name where contains a core 
 * of this application.
 * 
 */ 
$core_folder = [
    "folder_name" => "./core"
];


/**
 * 
 * The base folder where run application
 * 
 */ 
$start_point = [
    "point_name" => "./public"
];


/**
 * 
 * Here we set a host name and port.
 * This we need for run our application
 * in browser
 * 
 */ 
$server_settings = [
    'host' => "localhost",
    "port" => 8000,
    "mode" => 'on'
];

/**
 * External host and port of resource
 */
$external_server_settings = [
    'host' => gethostbyname('https://example.com'),
    'port' => getservbyname('www', 'tcp'),
    'mode' => 'off'
];

/**
 * 
 * Socket server settings. By this 
 * settings we can run our socket
 * server.
 * 
 */
$socket_server_settings = [
    "host" => "localhost",
    "port" => 8001,
    "domain" => AF_INET,
    "type" => SOCK_STREAM,
    "protocol" => SOL_TCP
];