<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /*
   "physicalDescription" is a wrapper element that contains all subelements
   relating to physical description information of the resource described.
   Data is input only within each subelement.
  */

class Mods_PhysicalDescription extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('physicalDescription');
  }

  public function addForm($form)
  {
    if (!$form) {
      return null;
    }

    $formSubelement = new Mods_Form($form);
    if ($formSubelement) {
      $this->appendChild($formSubelement);
    }
    return $formSubelement;
  }

}