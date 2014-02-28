<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "placeTerm" is used to express place in a textual or coded form
  */
class Mods_PlaceTerm extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('placeTerm',$content);
  }

  public function setTypeAttribute($value)
  {
    // type attribute for the roleTerm element can only
    // be set to 'text' or 'code'
    if ( ($value !== 'text')
	 &&
	 ($value !== 'code') )
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('type',$value);
    return $value;
  }
	
}