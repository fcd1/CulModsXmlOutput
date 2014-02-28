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

  /*

  public function addDateOther($dateOther)
  {
    if (!$dateOther) {
      return null;
    }

    $dateOtherSubelement = new Mods_DateOther($dateOther);
    if ($dateOtherSubelement) {
      $this->appendChild($dateOtherSubelement);
    }
    return $dateOtherSubelement;
  }

  public function addDateCreated($dateCreated,
				 $encodingAttributeValue = null,
				 $pointAttributeValue = null,
				 $keyDateAttributeValue = null,
				 $qualifierAttributeValue = null)
  {
    if (!$dateCreated) {
      return null;
    }

    $dateCreatedSubelement = new Mods_DateCreated($dateCreated);

    if (!$dateCreatedSubelement) {
      return null;
    }

    $this->appendChild($dateCreatedSubelement);

    if ($encodingAttributeValue) {
      $dateCreatedSubelement->setEncodingAttribute($encodingAttributeValue);
    }

    if ($pointAttributeValue) {
      $dateCreatedSubelement->setPointAttribute($pointAttributeValue);
    }

    if ($keyDateAttributeValue) {
      $dateCreatedSubelement->setKeyDateAttribute($keyDateAttributeValue);
    }

    if ($qualifierAttributeValue) {
      $dateCreatedSubelement->setQualifierAttribute($qualifierAttributeValue);
    }

    return $dateCreatedSubelement;
  }

  */

}