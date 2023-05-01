<!-- Connecting -->
<?php
$databaseName = 'JCASTNER_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'jcastner_writer';
$password = 'HiGlgg7Y9R8U';

$pdo = new PDO($dsn, $username, $password);
?>
<!--Connection complete -->