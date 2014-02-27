<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: a designation of the language in which the content
   of a resource is expressed.
  */
  // fcd1, 02/27/14 BEGIN
  // languageTerm is (I believe) a required subelement. Do I want to
  // move its creation into the constructor of Mods_language,
  // thus making it required at construction,
  // (Tried, could not get it to work)
  // or do I want to leave it as an addLanguageTerm function.
  // END 02/27/14, fcd1
class Mods_Language extends Mods_ModsElementAbstract
{

  public function __construct($languageTermContent,
			      $languageTermTypeAttribute)
  {
    parent::__construct('language');
    // $this->addLanguageTerm($languageTermContent,$languageTermTypeAttribute);
  }

  public function addLanguageTerm($languageTermContent,$languageTermTypeAttribute)
  {
    if (!$languageTermContent) {
      return null;
    }
    

    $languageTermSubelement = new Mods_LanguageTerm($languageTermContent,$languageTermTypeAttribute);
    
    if ($languageTermSubelement) {
      $this->appendChild($languageTermSubelement);
      $languageTermSubelement->setTypeAttribute($languageTermTypeAttribute);
    }
    return $languageTermSubelement;
    
  }


}