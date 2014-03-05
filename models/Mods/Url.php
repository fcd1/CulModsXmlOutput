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
	$this->_reportAttributeError('Access',"Invalid value: $value");
	return null;
      }

    $this->setAttribute('access',$value);
    return $value;
  }

}

