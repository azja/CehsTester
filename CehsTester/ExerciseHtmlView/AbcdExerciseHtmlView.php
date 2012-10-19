<?php
class AbcdExerciseHtmlView extends ExerciseHtmlView
{
  /*** ExerciseHtmlView implementation ***/
  protected function createHtml( ) {
    $question    =  $this->exercise_->getQuestion() . '<br>';
    $common_part = '<input type="radio" name="' . $this->exercise_->getId() .'"';
    $a           = $common_part . ' value=' . '"1">' . $this->exercise_->getAnswerA() . '<br>';
    $b           = $common_part . ' value=' . '"2">' . $this->exercise_->getAnswerB() . '<br>';
    $c           = $common_part . ' value=' . '"3">' . $this->exercise_->getAnswerC() . '<br>';
    $d           = $common_part . ' value=' . '"4">' . $this->exercise_->getAnswerD() . '<br>';
 
    return $question . $a . $b . $c . $d;
  }
  

  /*** Constructor: ***/
  public function __construct( Exercise $exercise ) {
    parent::__construct( $exercise );
  }
  
  
}
?>
