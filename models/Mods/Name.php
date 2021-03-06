<?php
  // attributes are set (setAttributeName), and 
  // subelements are added (addSubelementName)
class Mods_Name extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('name');
  }

  public function addNamePart($namePartText)
  {
    if (!$namePartText) {
      return null;
    }

    // fcd1, I may need to validate the text to make
    // sure it is in the right format (or do it in
    // the Mods_NamePart class itself
    $namePartSubelement = new Mods_NamePart($namePartText);
    if ($namePartSubelement) {
      $this->appendChild($namePartSubelement);
    }
    return $namePartSubelement;
  }
}