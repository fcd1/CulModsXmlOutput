<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "identifier" contains a unique standard number or code that
   distinctively identifies a resource. It includes manifestation,
   expression and work level identifiers. <identifier> should be
   repeated for each applicable identifier recorded, including 
   invalid and canceled identifiers
  */
class Mods_Identifier extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('identifier',$content);
  }

  public function setTypeAttribute($value)
  {
    if ($value) {
      $this->setAttribute('type',$value);
    }
    return $value;
  }
	
  public function setDisplayLabelAttribute($value)
  {
    if ($value) {
      $this->setAttribute('displayLabel',$value);
    }
    return $value;
  }
	
}