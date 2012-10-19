<?php
require_once 'ITestFactory.php';
//require_once 'DbProxy.php';


/**
 * class DbTestFactory
 * Query from db - returns a row with data
 */
abstract class DbTestFactory  implements ITestFactory
{

   /*** Attributes: ***/

  protected $dbProxy_;
  protected $logger_;

  /***Constructors: ***/

  protected function __construct($dbProxy, ILogger $logger ) {
    $this->dbProxy_ = $dbProxy;
    $this->logger_   = $logger;
  }

  protected abstract function getRows( $noOfRows, $field);

  public abstract function createTest($field, $subject, $noOfExercises, $level = Level::Medium );

} // end of DbTestFactory
?>
