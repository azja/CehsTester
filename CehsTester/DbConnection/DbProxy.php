<?php
final class DbProxy
{
  private static $instance_  = false;

  private $db_connection_;
  
  public static function getInstance(IContext $context) {
    if( self::$instance_ == false ) {
      self::$instance_ = new DbProxy($context->getDbAdress(), $context->getDbName(), $context->getDbUsername(), $context->getDbPassword ());
    }
      return self::$instance_;
  }

  

 public function getDbConnection() {
    return  $this->db_connection_;
  }


  private function __construct( $dbAdress, $dbName, $dbUsername, $dbPassword ) {
  
   $this->db_connection_ = mysql_connect($dbAdress, $dbUsername, $dbPassword);
  
   mysql_select_db( $dbName,$this->db_connection_ );

   if (!$this->db_connection_) {
       die('Could not connect: ' . mysql_error());
     }
     
  }
  

  public function __destruct(){
    mysql_close($this->db_connection_);
    $this->instance_ = false;
  }  
}
?>
