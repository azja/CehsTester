<?php
class BasicTestHtmlView extends TestHtmlView
{
  protected function createView( ) {
    $cntr = 0;
    $output_html = '<form action="process.php?' .SID .' " method="post">'; 
    foreach($this->test_ ->getExercises( ) as $exercise) {
      $cntr++;
      $output_html = $output_html . $cntr . "."  . $this->createExerciseView( $exercise )  . "<br><hr>";
    }
    return $output_html . '</form>';
  }
  
  public function __construct(Test $test) {
    parent::__construct( $test );
  }

} 
?>
