<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "languageTerm" contains the language(s) of the content of the resource.
   It may be expressed in textual or coded form. If in coded form,
   the source of the code is contained in the value of the authority
   attribute. If no authority is given, it is assumed that the content is textual
  */
class Mods_LanguageTerm extends Mods_ModsElementAbstract
{
  public function __construct($content,$typeAttribute)
  {

    parent::__construct('languageTerm',$content);

  }

  public function setTypeAttribute($value)
  {
    // type attribute for the languageTerm element can only
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
	$this->_reportAttributeError('authority',"Invalid value: $value");
	return null;
      }

    $this->setAttribute('authority',$value);
    return $value;
  }
	
}