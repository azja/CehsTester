<?php

//include ("../Level/Level.php");
//require_once '../Level/Level.php';
abstract class Exercise 
{

   /*** Attributes: ***/

  protected $Id_ = 0;

  protected $level_ = Level::Medium;
  
  protected $subject_;
  
  protected $field_;
  
  protected $question_;
  
  protected $correctAnswer_;

  /*** Constructors: ***/
  protected function __construct ( $id, $level, $subject, $field, $question, $correctAnswer) {
  
    $this->Id_            = $id;
    $this->level_         = $level;
    $this->subject_       = $subject;
    $this->field_         = $field;
    $this->question_      = $question;
    $this->correctAnswer_ = $correctAnswer;
    
  }
  
  public function getQuestion( ) {
    return $this->question_;
  } // end of member function Question

  abstract public function SetAnswer( $answer );

  public function getId( ) {
    return $this->Id_;
  } // end of member function GetId

  
  
  public function getSubject( ) {
  
    return $this->subject_;
  
  } // end of member function Subject

  
  public function getField( ) {
    
    return $this->field_;    
  
  } // end of member function Field


  public function getCorrectAnswer( ) {
    
    return $this->correctAnswer_;
    
  }
  
  protected function setId( $id ) {
  
    $this->Id_ = $id;
    
  } // end of member function SetId


  public function __toString(){
  return "id = " . $this->Id_ . "\nSubject:" . $this->subject_ . "\nField:" . $this->field_ . "\nLevel:" . $this->level_ . "\nQuestion:" . $this->question_ ."\n";
  }

} // end of Exercise
?>
