<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /*
   Definition: "location" identifies the institution or repository
   holding the resource, or a remote location in the form of a URL
   where it is available.
  */

class Mods_Location extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('location');
  }

  public function addUrl($url)
  {

    if (!$url) {
      return null;
    }


    $urlSubelement = new Mods_Url($url);

    if ($urlSubelement) {
      $this->appendChild($urlSubelement);
    }

    return $urlSubelement;


  }

}