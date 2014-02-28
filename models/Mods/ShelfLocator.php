<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: Shelfmark or other shelving designation that indicates
   the location identifier for a copy.
  */
class Mods_ShelfLocator extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {

    parent::__construct('shelfLocator',$content);

  }

}

