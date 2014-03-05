<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "roleTerm" contains the textual or coded form of a relator/role. 
  */
class Mods_RoleTerm extends Mods_ModsElementAbstract
{
  public function __construct($content,$typeAttribute)
  {
    parent::__construct('roleTerm',$content);
  }

  public function setTypeAttribute($value)
  {
    // type attribute for the roleTerm element can only
    // be set to 'text' or 'code'
    if ( ($value !== 'text')
	 &&
	 ($value !== 'code') )
      {
	$this->_reportAttributeError('type',"Invalid value: $value");
	return null;
      }

    $this->setAttribute('type',$value);
    return $value;
  }
	
}