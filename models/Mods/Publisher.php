<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   The name of the entity that published, printed, distributed,
   released, issued, or produced the resource.
  */
class Mods_Publisher extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('publisher',$content);
  }
}