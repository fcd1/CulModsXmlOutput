<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: Name of a place associated with the issuing, 
   publication, release, distribution, manufacture, production,
   or origin of a resource.
   Application: "place" is a wrapper element for placeTerm to indicate
   place of publication/origin
  */
class Mods_Place extends Mods_ModsElementAbstract
{
  public function __construct()
  {

    parent::__construct('place');

  }

  public function addPlaceTerm($placeTermContent,$placeTermTypeAttribute = 'text')
  {

    if (!$placeTermContent) {
      return null;
    }

     $placeTermSubelement = new Mods_PlaceTerm($placeTermContent,$placeTermTypeAttribute);
    
    if ($placeTermSubelement) {
      $this->appendChild($placeTermSubelement);
      $placeTermSubelement->setTypeAttribute($placeTermTypeAttribute);
    }

    return $placeTermSubelement;

  }

}