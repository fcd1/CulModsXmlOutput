<?php
  // Following is from the "MODS User Guidelines Version 3"                             
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)                         
  /*                                                                                    
   A term that specifies the characteristics and general type of content of the resource.
  */
class Mods_TypeOfResource extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('typeOfResource',$content);
  }

  // fcd1, 02/28/14:
  // Need to test the two commented out functions below.
  /*
  public function setCollectionAttribute($value)
  {
    // collection attribute for the typeOfResource element can only
    // be set to the following values
    if ($value !== 'yes')
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('collection',$value);
    return $value;
  }

  public function setManuscriptAttribute($value)
  {
    // manuscript attribute for the typeOfResource element can only
    // be set to the following values
    if ($value !== 'yes')
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('manuscript',$value);
    return $value;
  }
  */
}