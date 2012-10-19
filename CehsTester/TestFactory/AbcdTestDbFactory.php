<?php
require_once 'DbTestFactory.php';
require_once 'ITestFactory.php';


class AbcdTestDbFactory  extends DbTestFactory 
{

   /*** Contructor: ***/
   public function __construct( $dbProxy, ILogger $logger ) {
     parent::__construct( $dbProxy,$logger );
   }

   /*** DbTestFactory implementation: ***/
   protected function getRows( $noOfRows, $field) {
     $query = "select * from exercises  where field =" . "'" . $field . "' " . " ORDER BY RAND()" . " limit " . $noOfRows;
     return $query;
   }
 
   
   /*** ITestFactory implementation: ***/
   public function createTest($field, $subject, $noOfExercises,  $level = Level::medium ) {
     try
     {
       $query = $this->getRows($noOfExercises,$field);
       $newTest = new BasicTest("newTest", $this->logger_);
       $fetched =  mysql_query($query,$this->dbProxy_);
      
       while( $result = mysql_fetch_array( $fetched ) ) {
         $exercise = new AbcdExercise($result['id'], Level::Medium,$result['field'], $result['subject'], $result['content']
                                       ,$result['answer_a'], $result['answer_b'],$result['answer_c'], $result['answer_d'],$result['correct_answer']);
         $newTest->AddExercise($exercise);
         
         if(! $result)
           throw new Exception('Error loading exercises from db');
       }
     }
     catch(Exception $e)
     {
       $this->logger_->Log("Exception in AbcdTestDbFactoryThrown: " . $e);
     }

 return $newTest;
 }

} // end of AbcdTestDbFactory
?>
