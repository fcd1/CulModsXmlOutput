<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /*
   Definition: Information about the origin of the resource, including
   place of origin or publication, publisher/originator, and dates
   associated with the resource

   Application: "originInfo" is a wrapper element that contains all
   subelements related to publication and origination information
  */

class Mods_OriginInfo extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('originInfo');
  }

  public function addPublisher($publisher)
  {
    if (!$publisher) {
      return null;
    }

    $publisherSubelement = new Mods_Publisher($publisher);
    if ($publisherSubelement) {
      $this->appendChild($publisherSubelement);
    }
    return $publisherSubelement;
  }

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

}