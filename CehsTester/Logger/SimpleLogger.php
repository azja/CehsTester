<?php
class SimpleLogger implements ILogger
{
  private $outputFile_;
  public function __construct($outputFile){
    $this->outputFile_ = $outputFile;
  }
  
  public function Log($info){
  date_default_timezone_set('Europe/Warsaw');
  $d = date('Y-m-d H:i:s'); 
   file_put_contents($this->outputFile_, "\n\n ------ ".$d." ------" . "\n".$info, FILE_APPEND | LOCK_EX);
  }


}
?>
