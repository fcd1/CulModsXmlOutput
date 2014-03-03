<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   general textual information relating to a resource.
  */
class Mods_Note extends Mods_ModsElementAbstract
{

  public function __construct($content)
  {
    parent::__construct('note',$content);
  }

  public function setTypeAttribute($value)
  {

    if ($value) {
      $this->setAttribute('type',$value);
    }

    return $value;

  }

}