<?php
abstract class TestHtmlView
{
  /*** Attributes: ***/
  protected $test_;
  
  protected abstract function createView( );
  
  protected function createExerciseView( AbcdExercise $exercise ) {
    $exer = new AbcdExerciseHtmlView( $exercise );
    return (string)$exer;
  }
  /*** Constructor: ***/

  protected function __construct( Test $test ) {
    $this->test_ = $test;
  }
  
  /*** Template method:  ***/

  public function __toString( ) {
    return $this->createView();
  }
  
}

?>
