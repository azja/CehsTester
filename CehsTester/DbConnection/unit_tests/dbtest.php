<?php
include ("../DbProxy.php");
include ("../../Context/IContext.php");
include ("../../Context/Context.php");
include ("../../Logger/ILogger.php");
include ("../../Logger/SimpleLogger.php");

$db = DbProxy::getInstance(Context::getInstance ("config.xml"));
?>
