<?php
final class DbProxy
{
  private static $instance_  = false;

  private $db_connection_;
  private $context;
  public static function getInstance(IContext $context) {
   if(self::$instance_ == false) {
    self::$instance_ = new DbProxy($dbAdress, $dbName, $dbUsername, $dbPassword);
    }
      return self::$instance_;
  }

  

 public function getDbConnection() {
    return  $this->db_connection_;
  }


  private function __construct( $dbAdress, $dbName, $dbUsername, $dbPassword ) {
  
   $this->db_connection_ = mysql_connect('hexsystem.nazwa.pl:3307','hexsystem_5','cehs!QAZ1234');
  
   mysql_select_db('hexsystem_5',$this->db_connection_);

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
