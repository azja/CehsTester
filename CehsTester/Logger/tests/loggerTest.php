<?php
include "../ILogger.php";
include "../SimpleLogger.php";

$logger = new SimpleLogger("log.dat");
$logger->Log("Some test info");

?>
