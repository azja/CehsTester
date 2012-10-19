<?php
include "../../Logger/ILogger.php";
include "../../Logger/SimpleLogger.php";
include "../../Exercise/Exercise.php";
include "../../Exercise/AbcdExercise.php";
include "../../Test/Test.php";
include "../../Test/BasicTest.php";
include "../../Level/Level.php";
include "../ITestFactory.php";
include "../DbTestFactory.php";
include "../AbcdTestDbFactory.php";
include "../../DbConnection/DbProxy.php";

$logger = new SimpleLogger("log");
$dbcon = DbProxy::getInstance()->getDbConnection();

$factory =  new AbcdTestDbFactory( $dbcon, $logger );
$test    =  $factory->createTest("math","arytmetyka",4, Level::Medium);
//$test->getExercises();
foreach($test->getExercises() as $exercise) {
  echo ("-----------------------------------------------------------\n");
  echo ($exercise);
}


?>
