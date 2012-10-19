<?php
//require_once 'Exercise.php';
//require_once '.php';

abstract class Test
{

  /** Aggregations: */

  var $m_Vector = array();


   /*** Attributes: ***/

  protected $logger_;
  protected $title_;

  protected $level_ = Level::Medium;


  public function AddExercise( Exercise $exercise ) {
    if ( !array_key_exists( $exercise->getId(), $this->m_Vector ) )
      $this->m_Vector[ $exercise->getId() ] = $exercise;
      elseif($this->logger_)
      $this->logger_->Log("Test:" . $this->title_ ." tried to add exercise with exisiting id");
  } // end of member function AddExercise


  public function RemoveExercise( Exercise $exercise ) {
    if (array_key_exists( $exercise->getId(), $this->m_Vector ))
      unset( $this->m_Vector[ $exercise->getId() ]);
    elseif($this->logger_)
      $this->logger_->Log("Test:" . $this->title_ ." tried to remove exercise which doesn't exist");
  } // end of member function RemoveExercise


  /*** Getters: ***/
  public function GetTitle( ) {
    return $this->title_;
  } // end of member function GetTitle
  
  public function GetExercises ( ) {
    return array_values( $this->m_Vector );
  }

  /*** Solvers: ***/
  public function Solve( $answer_array ) {
//    echo ("Counting");
   $selfArrayOfAnswers = array ();
  
   foreach($this->m_Vector as $value) {
     $selfArrayOfAnswers[ $value->getId() ] = $value->getCorrectAnswer( );
//     echo ( $value->getId( ) . " " .$value->getCorrectAnswer( ) ."<br>");
   }
   
   $intersectedArray = array_intersect_key($selfArrayOfAnswers, $answer_array);

//   echo("--------------------------------------------------------");
   $cntr = 0;
   foreach(array_keys($intersectedArray) as $key) {
     if($selfArrayOfAnswers[ $key ] == $answer_array [ $key ])
     $cntr++;
//     echo ("key:" . $key .   " answer:".$answer_array[ $key ] . "<br>");
   }
   

    return 100 * ($cntr / count( $this->m_Vector)) . "%";
  }
 /*** Constructors: ***///
 protected function __construct($title, ILogger $logger){
   $this->title_ = $title;
   $this->logger_ = $logger;
 }

} // end of Test
?>
