<?php
abstract class  ExerciseHtmlView
{
  /*** Attributes: ***/
  protected $exercise_;
  
  /*** Abstract methods: ***/
  
  /* returns html string for Exercise */
  protected abstract function createHtml( );
  
  
  /*** Constructor: ***/
  
  protected function __construct(Exercise $exercise ) {
    $this->exercise_ = $exercise;
  }
  
  /*** Template method pattern ***/
  public function __toString( ) {
    return $this->createHtml( );
  }
}
?>
