<?php
abstract class Mods_ModsElementAbstract extends DOMElement
{

  /*

  protected static $_statusReport = "Status report:/n";
  // protected $_statusReport;


  protected function _reportStatus($status) {


    if (self::REPORT_STATUS) {
      return null;
    }

    $this->_statusReport .= $status . " /n";

  }

  public static function getStatusReport() {

    return self::$_statusReport;

  }

  */

  const REPORT_STATUS = true;

  protected function _reportStatus($status) {


    if (self::REPORT_STATUS) {
      $this->appendChild(new DOMComment($status));
    }
    
  }

  protected function _reportAttributeError($attributeName, $status) {

    $comment = '***** ATTRIBUTE ERROR *****' . PHP_EOL . 
      'Attribute: ' . $attributeName . PHP_EOL . "Error: " . $status;

    if (self::REPORT_STATUS) {
      $this->appendChild(new DOMComment($comment));
    }
    
  }


}