<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: the Uniform Resource Location of the resource
  */
class Mods_Url extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('url',$content);
  }

  // fcd1, 02/27/14:
  // Not tested, so comment out
  /*
  public function setAccessAttribute($value)
  {
    // access attribute for the url element can only
    // be set to the following values
    if ( ($value !== 'preview')
	 &&
	 ($value !== 'raw object') 
	 &&
	 ($value !== 'object in context') )
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('access',$value);
    return $value;
  }
  */
}

