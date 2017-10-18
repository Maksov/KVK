<?php
/**
 * Application requirement checker script.
 *
 * In order to run this script use the following console command:
 * php requirements.php
 *
 * In order to run this script from the web, you should copy it to the web root.
 * If you are using Linux you can create a hard link instead, using the following command:
 * ln ../requirements.php requirements.php
 */

// you may need to adjust this path to the correct Yii framework path
function FormatErrors( $errors )
{
echo "Error information: 
";

foreach ( $errors as $error )
{
echo "SQLSTATE: ".$error['SQLSTATE']."
";
echo "Code: ".$error['code']."
";
echo "Message: ".$error['message']."
";
}
}$serverName = "MAXIDROM\SQLEXPRESS"; // Имя сервера задавалось при установке; его также можно увидеть при запуске Management Studio

$conn = sqlsrv_connect( $serverName);
if( $conn === false )
{ die( FormatErrors(sqlsrv_errors()) ); }

var_dump($conn);