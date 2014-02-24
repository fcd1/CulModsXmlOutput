<?php
  // attributes are set (setAttributeName), and 
  // subelements are added (addSubelementName)
class Mods_TitleInfo extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('titleInfo');
  }

  public function addTitle($titleText)
  {
    if (!$titleText) {
      return null;
    }
    $titleSubelement = new Mods_Title($titleText);
    if ($titleSubelement) {
      $this->appendChild($titleSubelement);
    }
    return $titleSubelement;
  }
}