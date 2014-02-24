<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "role" is a wrapper element that may contain a value in coded or textual form.
   Subelement: <roleTerm>
   "roleTerm" contains the textual or coded form of a relator/role.
  */
class Mods_Role extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('role');
  }

  public function addRoleTerm($roleTermContent,$roleTermTypeAttribute)
  {
    if (!$roleTermContent) {
      return null;
    }

     $roleTermSubelement = new Mods_RoleTerm($roleTermContent,$roleTermTypeAttribute);
    
    if ($roleTermSubelement) {
      $this->appendChild($roleTermSubelement);
      $roleTermSubelement->setTypeAttribute($roleTermTypeAttribute);
    }
    return $roleTermSubelement;


  }
}