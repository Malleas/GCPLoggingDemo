<?php
require_once '../../../header.php';
require_once '../../../Autoloader.php';
require '../../../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/

$service = new SecurityService();
$userService = new UserBusinessService();
$username = $_POST['username'];
$password = $_POST['password'];
$log = new Logger('myLog');
$log->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));


if($service->authUser($username, $password)){
    $user = $userService->findUserByUsername($username);
    $log->info("Connection Successful for user: ".$user->getUsername());
    $_SESSION['userID'] = $user->getId();
    $_SESSION['firstName'] = $user->getFirstName();
    header("Location:/index.php");
}else{
    $log->error("No user found");
    include '../../views/login/LoginFailed.php';
}