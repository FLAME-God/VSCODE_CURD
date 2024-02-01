<?php
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_DATA","rudra");
$mysqli=new mysqli(DB_HOST,
    DB_USER,
    DB_PASSWORD,
    DB_DATA);
if($mysqli->connect_errno>0)
{
    die("Error : ".$mysqli->connect_error."<hr/> No : ".$mysqli->connect_errno);
}
?>
