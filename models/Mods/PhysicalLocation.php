<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: the institution or repository that holds the resource
   or where it is available.
   Application: "physicalLocation" may be expressed as text and/or as a code .
   Use the authority attribute to designate the source of the code.
  */
class Mods_PhysicalLocation extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {

    parent::__construct('physicalLocation',$content);

  }

  public function setTypeAttribute($value)
  {
    // type attribute for the languageTerm element can only
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

  public function setAuthorityAttribute($value)
  {
    // type attribute for the languageTerm element can only
    // be set to 'text' or 'code'
    if ( ($value !== 'iso639-2b')
	 &&
	 ($value !== 'rfc3066')
	 &&
	 ($value !== 'iso639-3')
	 &&
	 ($value !== 'rfc4646') )
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('authority',$value);
    return $value;
  }
	
}