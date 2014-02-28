<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: a statement of the number and specific material
   of the units of the resource that express physical extent.
  */
class Mods_Extent extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('extent',$content);
  }
}