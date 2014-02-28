<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "languageOfCataloging" applies to the language of cataloging in a record.
   Language may also be recorded at each top element level to indicate the
   language of the metadata in a particular element.
  */
class Mods_LanguageOfCataloging extends Mods_ModsElementAbstract
{

  public function __construct()
  {

    parent::__construct('languageOfCataloging');

  }

  public function addLanguageTerm($languageTermContent,
				  $languageTermTypeAttribute = null,
				  $languageTermAuthorityAttribute = null)
  {
    if (!$languageTermContent) {
      return null;
    }
    
    $languageTermSubelement = new Mods_LanguageTerm($languageTermContent,$languageTermTypeAttribute);
    
    if ($languageTermSubelement) {
      $this->appendChild($languageTermSubelement);
      $languageTermSubelement->setTypeAttribute($languageTermTypeAttribute);
      $languageTermSubelement->setAuthorityAttribute($languageTermAuthorityAttribute);
    }
    return $languageTermSubelement;
    
  }

}