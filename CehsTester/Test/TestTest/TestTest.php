<?php
include "../../Logger/ILogger.php";
include "../../Logger/SimpleLogger.php";
include "../../Exercise/Exercise.php";
include "../../Exercise/AbcdExercise.php";
include "../Test.php";
include "../BasicTest.php";
include "../../Level/Level.php";

$logger = new SimpleLogger("TestTestlog.dat");
$test = new BasicTest("Test",$logger);
$ex1 = new AbcdExercise(1,1,"Math","Basic exercise","Do you know?","a","b","c","d","it is correct answer");
$ex2 = $v = new AbcdExercise(1,1,"Math","Basic exercise","Do you know?","a","b","c","d","it is correct answer");

$test->AddExercise($ex1);
$test->AddExercise($ex2);
$test->RemoveExercise($ex1);
$test->AddExercise($ex2);

var_dump($test->GetExercises() );


?>
