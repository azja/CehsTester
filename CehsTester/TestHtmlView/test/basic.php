<?php
include "../../Logger/ILogger.php";
include "../../Logger/SimpleLogger.php";
include "../../Exercise/Exercise.php";
include "../../Exercise/AbcdExercise.php";
include "../../Test/Test.php";
include "../../Test/BasicTest.php";
include "../../Level/Level.php";
include "../../TestFactory/ITestFactory.php";
include "../../TestFactory/DbTestFactory.php";
include "../../TestFactory/AbcdTestDbFactory.php";
include "../../DbConnection/DbProxy.php";
include "../../ExerciseHtmlView/ExerciseHtmlView.php";
include "../../ExerciseHtmlView/AbcdExerciseHtmlView.php";
include "../TestHtmlView.php";
include "../BasicTestHtmlView.php";


$logger = new SimpleLogger("log");
$dbcon = DbProxy::getInstance()->getDbConnection();

$factory =  new AbcdTestDbFactory( $dbcon, $logger );
$test    =  $factory->createTest("math","arytmetyka",4, Level::Medium);
$htmlBuilder = new BasicTestHtmlView ($test);
echo ( $htmlBuilder );
//$test->getExercises();
/*
foreach($test->getExercises() as $exercise) {
//  echo ("-----------------------------------------------------------\n");
  echo ( new AbcdExerciseHtmlView($exercise) );
 
}
*/

?>
