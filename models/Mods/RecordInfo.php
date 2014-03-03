<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /*
   Definition: information about the metadata record.
   Application: "recordInfo" is a wrapper element that contains subelements
   relating to information necessary for managing metadata. Data is only input
   within each subelement.
  */

class Mods_RecordInfo extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('recordInfo');
  }

  public function addLanguageOfCataloging($language,
					  $languageTermTypeAttribute = null,
					  $languageTermAuthorityAttribute = null)
  {
    if (!$language) {
      return null;
    }

    $languageOfCatalogingSubelement = new Mods_LanguageOfCataloging();

    if ($languageOfCatalogingSubelement) {
      $this->appendChild($languageOfCatalogingSubelement);
      $languageOfCatalogingSubelement->addLanguageTerm($language,
						       $languageTermTypeAttribute,
						       $languageTermAuthorityAttribute);
    }

    return $languageOfCatalogingSubelement;
  }


  public function addRecordOrigin($recordOriginContent)
  {
    if (!$recordOriginContent) {
      return null;
    }

    $recordOrigin = new Mods_RecordOrigin($recordOriginContent);

    if ($recordOrigin) {
      $this->appendChild($recordOrigin);
    }

    return $recordOrigin;

  }

}