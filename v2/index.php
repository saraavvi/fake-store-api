
<?php
include_once('App.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");
header("Content-Type: application/json; charset=UTF-8");

App::main();
