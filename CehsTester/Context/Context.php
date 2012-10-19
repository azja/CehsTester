<?php
final class Context implements IContext
{
 
 private $dbAdress_;
 private $dbName_;
 private $dbUsername_;
 private $dbPassword_;
 private $tableNames_ = array();
 private $logger_;
 
 /*** Singleton pattern ***/
 private static $instance_s = false;
 
 private static function MissingVariableDeciser(ILogger $logger, $varName) {
   $logger->Log("Cannot find: " . $varname . " in configuration file");
   switch( $varName ) {
     case 'dbAdress'   : exit ('dbAdress not given');
     case 'dbName'     : exit ('dbName not given');
     case 'dbUsername' : exit ('dbUsername not given');
     case 'dbPassword' : exit ('dbPassword not given');
     case 'tableName' : exit ('tableNames not given');
    }
 }
 
 private static function getFirstElementFromDom(DOMDocument $doc, $tag) {
   return $doc->getElementsByTagName( $tag )->item(0)->nodeValue;
 }  
 
 public static function  getInstance( $configFileName ) {
    if( !self::$instance_s ) {
    $logger;
    $xmlDoc = DOMDocument::load( $configFileName );
    if( $xmlDoc ) {
      $temp = $xmlDoc->getElementsByTagName( "logger" )->item(0)->nodeValue;

      if( $temp ) {
        $logger = new SimpleLogger( $temp );
        }
      else {
        $logger = new SimpleLogger ( 'log' );
        $logger->Log("Could not find file name for logging in " . $configFileName . " Decision: using default 'log' ");        
        }
      }
    else {
      $logger = new SimpleLogger ( 'log' );
      $logger->Log("Could not find file name for logging in " . $configFileName . " Decision: using default 'log' ");        
      exit("Cannot find configuration file");
      }  
    
    $dbAdress = self::getFirstElementFromDom($xmlDoc,"dbAdress");
    if (!$dbAdress )
      MissingVariableDeciser($logger, "dbAdress");

    $dbName = self::getFirstElementFromDom($xmlDoc,"dbName");
    if (!$dbName )
      MissingVariableDeciser($logger, "dbName");

    $dbUsername = self::getFirstElementFromDom($xmlDoc,"dbUsername");
    if (!$dbUsername )
      MissingVariableDeciser($logger, "dbUsername");


    $dbPassword = self::getFirstElementFromDom($xmlDoc,"dbPassword");
    if (!$dbPassword )
      MissingVariableDeciser($logger, "dbPassword");



    $tables = $xmlDoc->getElementsByTagName("tableName");
    if (!$tables )
      MissingVariableDeciser($logger, "tableName");

    $cntr = 0;
    $tableNames = array();
    foreach($tables as $table) {
      $tableNames[$table->getAttribute("id")] =  $table->nodeValue;
    
    }

    $instance_s = new Context($dbAdress, $dbName, $dbUsername, $dbPassword, $tableNames, $logger);
    }
   return $instance_s;
 }
 
 /**
 * Function Description
 * @no parameter
 * @returns data base adress for current context as string value
 */
 public function getDbAdress ( ) {
   return $this->dbAdress_;
 }

 /**
 * Function Description
 * @no parameter
 * @returns data base name for current context as string value
 */
 public function getDbName ( ) {
   return $this->dbName_;
 }
 
  /**
 * Function Description
 * @no parameter
 * @returns data base user name for current context as string value
 */

 public function getDbUsername ( ) {
   return $this->dbUsername_;
 }
  /**
 * Function Description
 * @no parameter
 * @returns data base password for current context as string value
 */

 public function getDbPassword ( ) {
   return $this->dbPassword_;
 }

 /**
 * Function Description
 * @no parameter
 * @returns array of db names used in particular context
 */

 public function getDbTableNames ( ) {
   return $this->tableNames_;
 }
 
  /**
 * Function Description
 * @no parameter
 * @returns ILogger object for logging purposes
 */

 public  function Logger ( ) {
   return $logger_;
 }
 
 private function __construct ($dbAdress, $dbName, $dbUsername, $dbPassword, $tableNames, $logger)  {
   $this->dbAdress_ = $dbAdress;
   $this->dbName_ = $dbName;
   $this->dbUsername_ = $dbUsername;
   $this->dbPassword_ = $dbPassword;
   $this->tableNames_ = $tableNames;   
   $this->logger = $logger;
 }
}

?>
