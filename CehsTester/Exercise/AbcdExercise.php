<?php
require_once 'Exercise.php';

class AbcdExercise extends Exercise
{

   /*** Attributes: ***/

  private $answerA_;

  private $answerB_;

  private $answerC_;

  private $answerD_;
  
  
  public function __construct($id, $level, $field, $subject, $question, $answerA, $answerB, $answerC, $answerD, $correctAnswer) {
    parent::__construct($id, $level, $field, $subject, $question, $correctAnswer);
    $this->answerA_ = $answerA;
    $this->answerB_ = $answerB;
    $this->answerC_ = $answerC;
    $this->answerD_ = $answerD;
  }

  /*** Public getters ***/

  public function GetAnswerA( ) {
    return $this->answerA_;
  } // end of member function GetAnswerA

  public function GetAnswerB( ) {
    return $this->answerB_;
  } // end of member function GetAnswerB

  public function GetAnswerC( ) {
    return $this->answerC_;
  } // end of member function GetAnswerC

  public function GetAnswerD( ) {
    return $this->answerD_;
  } // end of member function GetAnswerD


  /*** Public functions ***/
  
  /*
  Implements abstract class Exercise
  parameter:int
  return:bool
  */
  
  public function SetAnswer($answer){
    if($answer == $this->correctAnswer_)
      return true;
    return false;
  }
  
  public function __toString(){
    return parent::__toString() . "(a) " . $this->answerA_ . "\n(b) " . $this->answerB_ . "\n(c) " . $this->answerC_ . "\n(d) " . $this->answerD_ . "\n";
  }

} // end of AbcdExercise
?>
