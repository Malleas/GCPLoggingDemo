<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
/*
The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.
*/

class Database
{
    private $dbservername = "td5l74lo6615qq42.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
    private $dbusername = "v35tmsidd956vqd2";
    private $dbpassword = "nlga6ao3uvtxigeo";
    private $dbname = "aow3jmlb045etrok";

    function getConnection(){
        $conn = new mysqli($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
        if($conn->connect_error){
            echo "Connection Failed".$conn->connect_error."<br>";
        }else{
            return $conn;
        }
    }

}