<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   information about restrictions imposed on access to a resource.
  */
class Mods_AccessCondition extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('accessCondition',$content);
  }
}