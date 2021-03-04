<?php
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/
include_once '../../../header.php';
require_once '../../../Autoloader.php';
require '../../../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
error_reporting(E_ALL);
ini_set('display_errors', 1);

$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$username = $_POST['username'];
$password = $_POST['password'];

$service = new UserBusinessService();
$log = new Logger('myLog');
$log->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));
if($service->createUser($firstname, $lastname, $username, $password)){
    $log->info("User created successfully");
   header("Location:/index.php");
}else{
    $log->error("There was an error in creating this new user.");
    include '../../views/registration/RegistrationFailed.php';
}