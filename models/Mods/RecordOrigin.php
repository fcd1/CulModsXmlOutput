<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "recordOrigin" is intended to show the origin, or provenance of the MODS record.
  */
class Mods_RecordOrigin extends Mods_ModsElementAbstract
{

  public function __construct($content)
  {
    parent::__construct('recordOrigin',$content);
  }

}