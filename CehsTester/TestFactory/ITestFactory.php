<?php
//require_once 'TestBase.php';

interface ITestFactory
{

  public function createTest($field, $subject, $noOfExercises,  $level = Level::Medium );

} // end of ITestFactory
?>
